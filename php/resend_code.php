<?php
session_start();
include('../admin/config/dbconn.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function resend_email_verify($rs_name,$rs_email,$verify_token)
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
    $mail->setFrom('hinakhatoonsk@gmail.com','HINA KHATOON');
    $mail->addAddress($rs_email);//Add a recipient
    
    $mail->isHTML(true);
    $mail->Subject = 'Email variication from Catalogue';
    $mail_template = "
    <h1>Email verification Link
    <h5>Click the given link</h5></br>
    <a href='http://127.0.0.1:8080/Myproject/service/php/email_verify.php?token=$verify_token'>Click here</a>
    ";
    
    $mail->Body    = $mail_template;
    $mail->send();
   // echo 'Message has been sent';
  
}

if(isset($_POST['resend_btn'])){
  if(isset($_POST['g-recaptcha-response'])){
    $secretkey = '6LdiQKspAAAAAOIIfONiR5bgqFdHzSoDbm8w1ItL';
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$_POST['g-recaptcha-response']);
  $response = json_decode($verifyResponse);
  if($response->success){
      
    if(!empty(trim($_POST['resend_email']))){
   $rs_email = mysqli_real_escape_string($conn, $_POST['resend_email']);
   $sql = "SELECT * FROM register_user WHERE db_email='$rs_email' LIMIT 1";
   $sql_query = mysqli_query($conn, $sql);
   
    if(mysqli_num_rows($sql_query) > 0){
     
     $row = mysqli_fetch_array($sql_query);
     if($row['db_role_as'] == '0'){
       $rs_name = $row['db_name'];
       $rs_email = $row['db_email'];
       $verify_token = $row['db_verify_token'];
       
       resend_email_verify($rs_name,$rs_email,$verify_token);
       $_SESSION['status'] = "<h6 class='text-success'>Link send successfully ! <br>Plese verify your <b class='text-primary'>$rs_email</b></h6>";
    header('Location: ../login.php');
    exit(0);
     }else{
       $_SESSION['status'] = "<h6 class='text-warning'>Email Alredy verified Plese login . </h6>";
    header('Location: ../login.php');
    exit(0);
     }
     
   }else{
     $_SESSION['status'] = "<h6 class='text-danger'>Email is not Registered. Plese Register now </h6>";
    header('Location: ../register.php');
    exit(0);
   }
   
 }else{
   $_SESSION['status'] = "<h6 class='text-danger'>firld are requerd . </h6>";
    header('Location: ../resend_email.php');
    exit(0);
 } 
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>plese check I am not robot !</h6>";
    header('Location: ../resend_email.php');
    exit(0);
  }
  
    }else{
  $_SESSION['status'] = "<h6 class='text-danger'>Somthing went wrong !</h6>";
    header('Location: ../resend_email.php');
    exit(0);
}
  
}
?>