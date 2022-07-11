
<?php
include('authentication.php');
include('config/dbconn.php');

date_default_timezone_set("Asia/Manila");

    if(isset($_POST['checking_editbtn']))
    {
        $s_id = $_POST['treatment_id'];
        $result_array = [];

        $sql = "SELECT * FROM treatment WHERE id='$s_id' ";
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

    if(isset($_POST['update_treatment']))
    {
        $id = $_POST['edit_id'];

        $patient_id = $_POST['selectpatient'];
        $doctor_id = $_POST['select_dentist'];
        $visit = $_POST['showvisit'];
        $teeth = $_POST['teeth'];
        $description = $_POST['description'];
        $treatment = $_POST['treatment'];
        $fees = $_POST['fees'];
        $remarks = $_POST['remarks'];

        $sql = "UPDATE treatment set patient_id='$patient_id',doc_id='$doctor_id',visit='$visit',teeth='$teeth',complaint='$description', treatment='$treatment',fees='$fees',remarks='$remarks' WHERE id='$id' ";
        $query_run = mysqli_query($conn,$sql);

        if($query_run)
        {           
            $_SESSION['success'] = "Treatment Updated Successfully";
            header('Location:treatment.php');
        }
        else
        {
            $_SESSION['error'] = "Treatment Failed to Update";
            header('Location:treatment.php');
        }
                
    }

    if(isset($_POST['deletedata']))
    {  
        $id = $_POST['delete_id'];
        
        $sql = "DELETE FROM treatment WHERE id='$id' ";
        $query_run = mysqli_query($conn,$sql);
        
        if ($query_run)
        {
            $_SESSION['success'] = "treatment Deleted Successfully";
            header('Location:treatment.php');
        }
        else
        {
            $_SESSION['error'] = "Treatment Failed to Delete";
            header('Location:treatment.php');
        }
    }

    if(isset($_POST['user_id']))
    {
        $sql = "SELECT * FROM tblappointment WHERE patient_id='".$_POST["user_id"]."' ORDER BY id DESC";
        $query_run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_array($query_run))
            {
                $data["doc_id"] = $row["doc_id"];
                $data["visit"] = $row["schedule"];
                $data["treatment"] = $row["reason"];
            }
            echo json_encode($data);

        }
        else
        {
            echo 'No Record Found';
        }
    }

?>
