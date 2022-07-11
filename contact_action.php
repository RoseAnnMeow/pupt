<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

	if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["message"])) {

        $mail = new PHPMailer(true);
        $mail->isSMTP();                                         
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;                 
        $mail->Username   = 'puptdental@gmail.com';                  
        $mail->Password   = 'alhxegkzskfvgicm';  
    
        $mail->SMTPSecure = 'tls';                                
        $mail->Port       = 587;                      

        $mail->setFrom('puptdental@gmail.com',$_POST["name"]);
        $mail->addAddress($_POST["email"]); 
        $mail->addReplyTo($_POST["email"],$_POST["name"]); 
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form | ' .$_POST["subject"];
        $mail->Body = '<p>Name: '.$_POST["name"].'<br> 
                            Email: '.$_POST["email"].'<br>
                            Message: '.$_POST["message"].'</h3>';
        // $mail->SMTPDebug = 2;
        try
        {
            $mail->send();
            print "Thanks for contacting us. We'll get back soon to you";
        }
        catch(Exception $e)
        {
            print "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

	}
$success="";

if(isset($_POST['submit']))
{
    $results = '';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    sendEmail($name,$email,$subject,$message); 
    if($success == '')
    {
        $data =  'Thanks';
        header('Location: contact-us.php');
    }

}
?>