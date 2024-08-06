<?php
session_start();
include ('../admin/config/dbconn.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function send_pass_reset($get_name,$get_email,$token)
{
  $mail = new PHPMailer(true);
  
 // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hinakhatoonsk@gmail.com'; 
    $mail->Password   = 'mvhlaniyizeohsce';//SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hinakhatoonsk@gmail.com');
    $mail->addAddress($get_email);//Add a recipient
    
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset link';
    $mail_template = "
    <h1>Password reset</h1>
    <h5>Click the given link</h5></br>
    <a href='http://127.0.0.1:8080/Myproject/service/pass_change.php?email=$get_email&token=$token'>Click here</a>
    ";
    
    $mail->Body = $mail_template;
    $mail->send();
    //echo 'Message has been sent';
  
  
}
if(isset($_POST['pass_reset_btn'])){
  $p_email = mysqli_real_escape_string($conn, $_POST['email']);
  $token = md5(rand());
  
  $check_email = "SELECT * FROM register_user WHERE db_email='$p_email' LIMIT 1";
 $email_query = mysqli_query($conn, $check_email);
 if(mysqli_num_rows($email_query) > 0){
   $row = mysqli_fetch_array($email_query);
    $get_name = $row['db_name'];
    $get_email = $row['db_email'];
    //die();
   $update_token = "UPDATE register_user SET db_verify_token='$token' WHERE db_email='$get_email'";
   $update_query = mysqli_query($conn, $update_token);
   if($update_query){
     send_pass_reset($get_name,$get_email,$token);
     $_SESSION['status'] = "<h6 class='text-success'>Password reset link has been send your <b class='text-primary'>$get_email</b> </h6>";
    header("Location: ../login.php");
     exit(0);
     
   }else{
     $_SESSION['status'] = "<h6 class='text-danger'>Sumthing went rong</h6>";
   header("Location: ../forgot_pass.php");
   exit(0);
   }
   
 }else{
   $_SESSION['status'] = "<h6 class='text-danger'>E-mail are not Match</h6>";
   header("Location: ../forgot_pass.php");
   exit(0);
 }
  
}else{
  $_SESSION['status'] = "<h6 class='text-danger'>Not Allow</h6>";
   header("Location: ../login.php");
   exit(0);
}

?>