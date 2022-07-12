<?php
session_start();
include('../admin/config/dbconn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

date_default_timezone_set("Asia/Manila");

function sendmail_verify($fname,$email,$verify_token)
{
    // $mail->SMTPDebug = 2;
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                      
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;                 
    $mail->Username   = 'puptdental@gmail.com';                  
    $mail->Password   = 'alhxegkzskfvgicm';  

    $mail->SMTPSecure = 'tls';          
    $mail->Port       = 587;    
    
    $mail->setFrom('puptdental@gmail.com', $fname);
    $mail->addAddress($email);  

    $mail->isHTML(true); 
    $mail->Subject = 'Email verification from PUPT Dental Clinic';  
    
    $email_template = "
            <h2> You have registered with PUPT Dental Clinic </h2> 
            <p> Please click the link below to verify your email address and complete the registration process.</p>
            <p> You will be automatically redirected to sign in page.</p>
            <p>Please click below to activate your account:</p>
            <a href='http://localhost/PUP/patient/verify-email.php?token=$verify_token'> Click Here </a>
            ";

    $mail->Body = $email_template;
    try
    {
        $mail->send();
        echo "Message has been sent";
    }
    catch(Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
    if(isset($_POST['logout_btn']))
    {
        session_destroy();
        unset($_SESSION['auth']);
        unset($_SESSION['auth_role']);
        unset($_SESSION['auth_user']);

        $_SESSION['status'] = "Logged out successfully";
        header('Location: login.php');
        exit(0);
    }
        
    if(isset($_POST['register_btn']))
    {  
        $fname  = $_POST['fname'];
        $lname  = $_POST['lname'];
        $address = $_POST['address'];
        $dob = $_POST['birthday'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password =$_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $regdate = date('Y-m-d H:i:s');
        $verify_token = md5(rand());

        $image = $_FILES['patient_image']['name'];
        
        if($password == $confirmPassword)
        {
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $checkemail = "SELECT email FROM tblpatient WHERE email='$email' LIMIT 1";
            $checkemail_run = mysqli_query($conn, $checkemail);

            if(mysqli_num_rows($checkemail_run) > 0)
            {           
                $_SESSION['error'] = "Email Already Exist";
                header('Location:register.php');
            }
            else
            {
                if($image!= NULL)
                {
                    $allowed_file_format = array('jpg', 'png','jpeg');

                    $image_extension = pathinfo($image, PATHINFO_EXTENSION);


                    if(!in_array($image_extension, $allowed_file_format))
                    {
                        $_SESSION['error'] = "Upload valid file. jpg, png";
                        header('Location:register.php');
                    }
                    else if (($_FILES['patient_image']['size'] > 5000000))
                    {
                        $_SESSION['error'] = "File size exceeds 5MB";
                        header('Location:register.php');
                    }
                    else
                    {
                        $filename = time().'.'.$image_extension;
                        move_uploaded_file($_FILES['patient_image']['tmp_name'], '../upload/patients/'.$filename);  
                    }
                }
                else
                {
                    $character = $_POST["fname"][0];
                    $path = time() . ".png";
                    $imagecreate = imagecreate(200, 200);
                    $red = rand(0, 255);
                    $green = rand(0, 255);
                    $blue = rand(0, 255);
                    imagecolorallocate($imagecreate, 230, 230, 230);  
                    $textcolor = imagecolorallocate($imagecreate, $red, $green, $blue);
                    imagettftext($imagecreate, 100, 0, 55, 150, $textcolor, '../admin/font/arial.ttf', $character);
                    imagepng($imagecreate, '../upload/patients/'.$path);
                    imagedestroy($imagecreate);
                    $filename = $path;
                }

                if($_SESSION['error'] == '')
                {
                    $sql = "INSERT INTO tblpatient (fname,lname,address,dob,gender,phone,email,image,password,role,verify_token,created_at)
                    VALUES ('$fname','$lname','$address','$dob','$gender','$phone','$email','$filename','$hash','patient','$verify_token','$regdate')";
                    $patient_query_run = mysqli_query($conn,$sql);
                    if ($patient_query_run)
                    {
                        sendmail_verify("$name","$email","$verify_token");      
                        $_SESSION['info'] = "We've sent an email to <b>$email</b> please check your email and click the link to verify.";
                        header('Location:login.php');
                    }
                    else
                    {
                        $_SESSION['warning'] = "Registration Failed";
                        header('Location:register.php');
                    }
                }
                
            }           
            
        }
        else
        {
            $_SESSION['error'] = "Password does not match";
            header('Location:register.php');
        }
         
    }

    if(isset($_POST['userid']))
    {
        $s_id = $_POST['userid'];
        //echo $return = $s_id;

        $sql = "SELECT * FROM tblpatient WHERE id='$s_id' ";
        $query_run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <p class="data-label"><?php echo $row['fname']; ?></p>
                            <label>Address</label>
                            <p class="data-label"><?php echo $row['address']; ?></p>
                            <label>Phone</label>
                            <p class="data-label"><?php echo $row['phone']; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6 auto">
                        <div class="form-group">
                            <label>Birthdate</label>
                            <p class="data-label"><?php echo $row['dob']; ?></p>
                            <label>Gender</label>
                            <p class="data-label"><?php echo $row['gender']; ?></p>
                            <label>Email</label>
                            <p class="data-label"><?php echo $row['email']; ?></p>
                        </div>
                    </div>
                </div>                               
                   <?php
            }
        }
        else{
            echo $return = "<h5> No Record Found</h5>";
        }
    }
    
        
    if(isset($_POST['checking_editbtn']))
    {
        $s_id = $_POST['user_id'];
        $result_array = [];

        $sql = "SELECT * FROM tblpatient WHERE id='$s_id' ";
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

    if(isset($_POST['updatedata']))
    {
        $id = $_POST['edit_id'];
        $fname  = $_POST['fname'];
        $address = $_POST['address'];
        $dob = $_POST['birthday'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $checkemail = "SELECT email FROM tblpatient WHERE email='$email' ";
        $checkemail_run = mysqli_query($conn, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {           
            $_SESSION['error'] = "Email Already Exist";
            header('Location:patients.php');
        }
        else
        {
            $sql = "UPDATE tblpatient set fname='$fname',address='$address',dob='$dob', gender='$gender', phone='$phone', email='$email', password='$password' WHERE id='$id' ";
            $query_run = mysqli_query($conn,$sql);

            if ($query_run)
            {
                $_SESSION['success'] = "Patient Updated Successfully";
                header('Location:patients.php');
            }
            else
            {
                $_SESSION['error'] = "Patient Updated Unsuccessfully";
            }
        }

        
    }

    if(isset($_POST['deletedata']))
    {  
        $id = $_POST['delete_id'];
        
        $sql = "DELETE FROM tblpatient WHERE id='$id' ";
        $query_run = mysqli_query($conn,$sql);
        
        if ($query_run)
        {
            $_SESSION['success'] = "Patient Deleted Successfully";
            header('Location:patients.php');
        }
        else
        {
            $_SESSION['error'] = "Patient Deleted Unsuccessfully";
        }
    }
?>