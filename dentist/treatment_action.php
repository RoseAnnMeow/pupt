
<?php
include('authentication.php');
include('../admin/config/dbconn.php');

date_default_timezone_set("Asia/Manila");

    if(isset($_POST['update_treatment']))
    {
        $id = $_POST['edit_id'];
 
        $teeth = $_POST['teeth'];
        $description = $_POST['description'];
        $treatment = $_POST['treatment'];
        $fees = $_POST['fees'];
        $remarks = $_POST['remarks'];

        $sql = "UPDATE treatment set teeth='$teeth',complaint='$description',fees='$fees',remarks='$remarks' WHERE id='$id' ";
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
            $_SESSION['success'] = "Treatment Deleted Successfully";
            header('Location:treatment.php');
        }
        else
        {
            $_SESSION['error'] = "Treatment Failed to Delete";
            header('Location:treatment.php');
        }
    }

    if(isset($_POST['checking_editbtn']))
    {
        $id = $_POST['userid'];

        $sql = "SELECT CONCAT(fname,' ',lname) as fullname,t.id,sc.day,t.treatment,t.fees,t.teeth,t.complaint,t.remarks
        FROM treatment t 
        INNER JOIN tblpatient p ON p.id = t.patient_id 
        INNER JOIN schedule sc ON sc.id = t.visit 
        WHERE t.id='$id' ";
        $query_run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_array($query_run))
            {    
                $data["id"] = $row["id"];
                $data["fullname"] = $row["fullname"];
                $data["day"] = date('d-M-Y',strtotime($row["day"]));
                $data["treatment"] = $row["treatment"];
                $data["teeth"] = $row["teeth"];
                $data["complaint"] = $row["complaint"];
                $data["fees"] = $row["fees"];
                $data["remarks"] = $row["remarks"];
            }
            echo json_encode($data);

        }
        else
        {
            echo 'No Record Found';
        }
    }

?>
