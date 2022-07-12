<?php
    include('authentication.php');
    include('../admin/config/dbconn.php');

    date_default_timezone_set("Asia/Manila");

    if(isset($_POST['insert_supply']))
    {
        $supply_name = $_POST['supply_name'];
        $unit = $_POST['unit'];
        $danger_lvl = $_POST['danger_lvl'];
        $received = $_POST['received'];
        $created_at = date('Y-m-d H:i:s');

        $files = $_FILES['files']['name'];

        $check_name = mysqli_query($conn, "SELECT supply_name FROM supplies where supply_name = '$supply_name' ");
        if(mysqli_num_rows($check_name) > 0)
        {
            $_SESSION['error'] = "Supply Name already exist.";
            header('Location:all-supply.php');
        }
        else
        {
            if($files!= NULL)
            {
                $allowed_file_format = array('jpg', 'png','jpeg');
                $image_extension = pathinfo($files, PATHINFO_EXTENSION);
    
                if(!in_array($image_extension, $allowed_file_format))
                {
                    $_SESSION['error'] = "Upload valid file. jpg, png";
                    header('Location:all-supply.php');
                }
                else if (($_FILES['files']['size'] > 5000000))
                {
                    $_SESSION['error'] = "File size exceeds 5MB";
                    header('Location:all-supply.php');
                }
                else
                {
                    $filename = time().'.'.$image_extension;
                    move_uploaded_file($_FILES['files']['tmp_name'], '../upload/supply/'.$filename);  
                }
            }
    
            $sql = "INSERT INTO supplies (supply_name,image,unit,danger_level,received) VALUES ('$supply_name','$filename','$unit','$danger_lvl','$received')";
            $query_run = mysqli_query($conn,$sql);
    
            $id = mysqli_insert_id($conn);
    
            if($query_run)
            {        
                $_SESSION['success'] = "Supply Added Successfully";
                header('Location:all-supply.php');
    
                $sql = "INSERT INTO supply_stocks (supply_id,created_at) VALUES ('$id','$created_at')";
                $query_run = mysqli_query($conn,$sql);
            }
            else
            {
                $_SESSION['error'] = "Supply Failed to Add";
                header('Location:all-supply.php');
            }
        }
    }

    if(isset($_POST['checking_editbtn']))
    {
        $id = $_POST['supply_id'];
        $result_array = [];

        $sql = "SELECT * FROM supplies WHERE id='$id' ";
        $query_run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
               array_push($result_array, $row);              
            }
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
        else{
            echo $return = "<h5> No Record Found</h5>";
        }
    }

    if(isset($_POST['update_supply']))
    {
        $id = $_POST['edit_id'];
        $supply_name = $_POST['supply_name'];
        $unit = $_POST['unit'];
        $danger_lvl = $_POST['danger_lvl'];
        $received = $_POST['received'];
        $old_image = $_POST['old_image'];
        $image = $_FILES['files']['name'];

        $check_name = mysqli_query($conn, "SELECT supply_name FROM supplies where supply_name = '$supply_name' AND id != '$id' ");
        if(mysqli_num_rows($check_name) > 0)
        {
            $_SESSION['error'] = "Supply Name already exist.";
            header('Location:all-supply.php');
        }
        else
        {
            $update_filename ="";
            if($image!=null)
            {
                $image_extension = pathinfo($image, PATHINFO_EXTENSION);
                $allowed_file_format = array('jpg', 'png','jpeg');
                if(!in_array($image_extension, $allowed_file_format))
                {
                    $_SESSION['error'] = "Upload valid file. jpg, png";
                    header('Location:all-supply.php');
                }
                else if (($_FILES['files']['size'] > 10000000))
                {
                    $_SESSION['error'] = "File size exceeds 10MB";
                    header('Location:all-supply.php');
                }
                else 
                {
                    $filename = time().'.'.$image_extension;
                    $update_filename = $filename;
                }                      
            }
            else
            {
                $update_filename = $old_image;
            }
    
            $sql = "UPDATE supplies set supply_name='$supply_name',image='$update_filename',unit='$unit',danger_level='$danger_lvl',received='$received' WHERE id='$id' ";
            $query_run = mysqli_query($conn,$sql);
    
            if($query_run)
            {
                if($image != NULL)
                {
                    if(file_exists('../upload/supply/'.$old_image))
                    {
                        unlink("../upload/supply/".$old_image);
                    }
                    move_uploaded_file($_FILES['files']['tmp_name'], '../upload/supply/'.$update_filename);
                }        
                $_SESSION['success'] = "Supply Updated Successfully";
                header('Location:all-supply.php');
            }
            else
            {
                $_SESSION['error'] = "Supply Failed to Update";
                header('Location:all-supply.php');
            }
        }
    }

    if(isset($_POST['deletedata']))
    {  
        $id = $_POST['delete_id'];
        $del_image = $_POST['del_image'];
        
        $check_img_query = " SELECT * FROM supplies WHERE id='$id' ";
        $img_res = mysqli_query($conn,$check_img_query);
        $res_data = mysqli_fetch_array($img_res);
        $image = $res_data['image'];
        
        $sql = "DELETE FROM supplies WHERE id='$id'";
        $query_run = mysqli_query($conn,$sql);
       
        if($query_run)
        {                   
            if($image != NULL)
            {
                if(file_exists('../upload/supply/'.$image))
                {
                    unlink("../upload/supply/".$image);
                }
            }     
            $_SESSION['success'] = "Supply Deleted Successfully";
            header('Location:all-supply.php');
        }
        else
        {
            $_SESSION['error'] = "Supply Failed to Delete";
            header('Location:all-supply.php');
        }        
    }

    if(isset($_POST['addstock']))
    {
        $id = $_POST['supply_id'];
        $addstock = $_POST['stock'];
        $created_at = date('Y-m-d H:i:s');
        $session_mail = $_SESSION['auth_user']['user_email'];
        $session_name = $_SESSION['auth_user']['user_fname'];
        $user = "$session_name ($session_mail)";


        $sql = "UPDATE supply_stocks SET current_stock = current_stock + '$addstock',total = total + '$addstock' WHERE supply_id='$id' ";
        $query_run = mysqli_query($conn,$sql);

        if ($query_run)
        {
            $_SESSION['success'] = "$addstock item(-s) was added to stock.";
            header('Location:supply-stock.php');

            $sql = "INSERT INTO supply_transactions (supply_id,user,stock,created_at,updated_at) VALUES ('$id','$user','+$addstock','$created_at','$created_at')";
            $query_run = mysqli_query($conn,$sql);
        }
        else
        {
            $_SESSION['error'] = "items Failed to Update";
            header('Location:supply-stock.php');
        }

    }

    if(isset($_POST['substock']))
    {
        $id = $_POST['supply_id'];
        $substock = $_POST['stock'];
        $created_at = date('Y-m-d H:i:s');
        $session_mail = $_SESSION['auth_user']['user_email'];
        $session_name = $_SESSION['auth_user']['user_fname'];
        $user = "$session_name ($session_mail)";

        $sql= "SELECT * FROM supply_stocks WHERe supply_id='$id'";       
        $results = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($results))
        {
            $total = $row['total'];
        }

        if($substock > $total)
        {
            $_SESSION['error'] = "Not enough stocks.";
            header('Location:supply-stock.php');
        }
        else
        {
            
            $sql = "UPDATE supply_stocks SET consumed = consumed + '$substock',total = total - '$substock' WHERE supply_id='$id' ";
            $query_run = mysqli_query($conn,$sql);

            if ($query_run)
            {
                $_SESSION['success'] = "$substock item(-s) was removed from stock.";
                header('Location:supply-stock.php');

                $sql = "INSERT INTO supply_transactions (supply_id,user,stock,created_at,updated_at) VALUES ('$id','$user','-$substock','$created_at','$created_at')";
                $query_run = mysqli_query($conn,$sql);
            }
            else
            {
                $_SESSION['error'] = "Stocks Failed to Update";
                header('Location:supply-stock.php');
            }

        }

    }

?>