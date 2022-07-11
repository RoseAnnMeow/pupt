<?php
    include('authentication.php');
    include('config/dbconn.php');

    date_default_timezone_set("Asia/Manila");

    if(isset($_POST['insert_medicine']))
    {
        $med_name = $_POST['med_name'];
        $unit = $_POST['unit'];
        $danger_lvl = $_POST['danger_lvl'];
        $received = $_POST['received'];
        $expiration = $_POST['expiration'];
        $created_at = date('Y-m-d H:i:s');

        $check_name = mysqli_query($conn, "SELECT med_name FROM medicines where med_name = '$med_name' ");
        if(mysqli_num_rows($check_name) > 0)
        {
            $_SESSION['error'] = "Medicine Name already exist.";
            header('Location:all-medicine.php');
        }
        else
        {
            $sql = "INSERT INTO medicines (med_name,unit,danger_level,received,expiration,created_at) VALUES ('$med_name','$unit','$danger_lvl','$received','$expiration','$created_at')";
            $query_run = mysqli_query($conn,$sql);
    
            $id = mysqli_insert_id($conn);
    
            if($query_run)
            {        
                $_SESSION['success'] = "Medicine Added Successfully";
                header('Location:all-medicine.php');
    
                $sql = "INSERT INTO medicine_stocks (medicines_id,created_at) VALUES ('$id','$created_at')";
                $query_run = mysqli_query($conn,$sql);
            }
            else
            {
                $_SESSION['error'] = "Medicine Failed to Add";
                header('Location:all-medicine.php');
            }
        }

    }

    if(isset($_POST['checking_editbtn']))
    {
        $id = $_POST['medicine_id'];
        $result_array = [];

        $sql = "SELECT * FROM medicines WHERE id='$id' ";
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

    if(isset($_POST['update_medicine']))
    {
        $id = $_POST['edit_id'];
        $med_name = $_POST['med_name'];
        $unit = $_POST['unit'];
        $danger_lvl = $_POST['danger_lvl'];
        $received = $_POST['received'];
        $expiration = $_POST['expiration'];

        $check_name = mysqli_query($conn, "SELECT med_name FROM medicines where med_name = '$med_name' AND id !='$id' ");
        if(mysqli_num_rows($check_name) > 0)
        {
            $_SESSION['error'] = "Medicine Name already exist.";
            header('Location:all-medicine.php');
        }
        else
        {
            $sql = "UPDATE medicines set med_name='$med_name',unit='$unit',danger_level='$danger_lvl',received='$received',expiration='$expiration' WHERE id='$id' ";
            $query_run = mysqli_query($conn,$sql);
    
            if($query_run)
            {        
                $_SESSION['success'] = "Medicine Updated Successfully";
                header('Location:all-medicine.php');
            }
            else
            {
                $_SESSION['error'] = "Medicine Failed to Update";
                header('Location:all-medicine.php');
            }
        }

    }

    if(isset($_POST['deletedata']))
    {  
        $id = $_POST['delete_id'];
        
        $sql = "DELETE FROM medicines WHERE id='$id' ";
        $query_run = mysqli_query($conn,$sql);
        
        if ($query_run)
        {
            $_SESSION['success'] = "Medicine Deleted Successfully";
            header('Location:all-medicine.php');
        }
        else
        {
            $_SESSION['error'] = "Medicine Failed to Delete";
            header('Location:all-medicine.php');
        }
    }

    if(isset($_POST['addstock']))
    {
        $id = $_POST['med_id'];
        $addstock = $_POST['stock'];
        $created_at = date('Y-m-d H:i:s');
        $session_mail = $_SESSION['auth_user']['user_email'];
        $session_name = $_SESSION['auth_user']['user_fname'];
        $user = "$session_name ($session_mail)";


        $sql = "UPDATE medicine_stocks SET current_stock = current_stock + '$addstock',total = total + '$addstock' WHERE medicines_id='$id' ";
        $query_run = mysqli_query($conn,$sql);

        if ($query_run)
        {
            $_SESSION['success'] = "$addstock item(-s) was added to stock.";
            header('Location:medicine-stock.php');

            $sql = "INSERT INTO medicines_transactions (medicines_id,user,stock,created_at,updated_at) VALUES ('$id','$user','+$addstock','$created_at','$created_at')";
            $query_run = mysqli_query($conn,$sql);
        }
        else
        {
            $_SESSION['error'] = "items Failed to Update";
            header('Location:medicine-stock.php');
        }

    }
    if(isset($_POST['substock']))
    {
        $id = $_POST['med_id'];
        $substock = $_POST['stock'];
        $created_at = date('Y-m-d H:i:s');
        $session_mail = $_SESSION['auth_user']['user_email'];
        $session_name = $_SESSION['auth_user']['user_fname'];
        $user = "$session_name ($session_mail)";

        $sql= "SELECT * FROM medicine_stocks WHERe medicines_id='$id'";       
        $results = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($results))
        {
            $total = $row['total'];
        }

        if($substock > $total)
        {
            $_SESSION['error'] = "Not enough stocks.";
            header('Location:medicine-stock.php');
        }
        else
        {
            
            $sql = "UPDATE medicine_stocks SET consumed = consumed + '$substock',total = total - '$substock' WHERE medicines_id='$id' ";
            $query_run = mysqli_query($conn,$sql);

            if ($query_run)
            {
                $_SESSION['success'] = "$substock item(-s) was removed from stock.";
                header('Location:medicine-stock.php');

                $sql = "INSERT INTO medicines_transactions (medicines_id,user,stock,created_at,updated_at) VALUES ('$id','$user','-$substock','$created_at','$created_at')";
                $query_run = mysqli_query($conn,$sql);
            }
            else
            {
                $_SESSION['error'] = "Stocks Failed to Update";
                header('Location:medicine-stock.php');
            }

        }

    }

?>