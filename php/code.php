<?php
session_start();
include('../admin/config/dbconn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendemail_verify($r_name,$r_email,$verify_token)
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
    $mail->addAddress($r_email);//Add a recipient
    
    $mail->isHTML(true);
    $mail->Subject = 'Email variication from Catalogue';
    $mail_template = "
    <h1>Email verification Link
    <h5>Click the given link</h5></br>
    <a href='http://127.0.0.1:8080/Myproject/service/php/email_verify.php?token=$verify_token'>Click here</a>
    ";
    
    $mail->Body    = $mail_template;
    $mail->send();
    //echo 'Message has been sent';
  
}
//Confirm password code
if(isset($_POST['register_btn'])){
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  if($pass==$cpass){
    
    if(isset($_POST['g-recaptcha-response'])){
  $secretkey = '6LdiQKspAAAAAOIIfONiR5bgqFdHzSoDbm8w1ItL';
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$_POST['g-recaptcha-response']);
  $response = json_decode($verifyResponse);
    if($response->success){
     $r_name = $_POST['singup_name'];
     $r_email = $_POST['singup_email'];
     $r_mobile = $_POST['singup_mobile'];
     $r_cpassword = $_POST['cpassword'];
     $verify_token = md5(rand());
     
    //email check query
     $check_email = "SELECT db_email FROM register_user WHERE db_email='$r_email' LIMIT 1";
     $email_query_run = mysqli_query($conn, $check_email);
     
      if(mysqli_num_rows($email_query_run) > 0){
      $_SESSION['status'] = "<h6 class='text-danger'>E-mail is alrady exist</h6>";
      header("Location: ../register.php");
      exit(0);
      }else{
        // Inser user / registeration data
        $query_insert = "INSERT INTO register_user (db_name, db_email, db_mobile, db_pass, db_verify_token) VALUES ('$r_name','$r_email','$r_mobile','$r_cpassword','$verify_token')";
        $query_run = mysqli_query($conn, $query_insert);
       if($query_run){
        sendemail_verify($r_name,$r_email,$verify_token);
         $_SESSION['status'] = "<h6 class='text-success'>Registeration successfull. !  Plese verify your  <b class='text-primary'>$r_email</b> given Link </h6>";
          header("Location: ../register.php");
          exit(0);
       }else{
         $_SESSION['status'] = "<h6 class='text-danger'>Registeration Failed.</h6>";
          header('Location: ../register.php');
          exit(0);
       }
       
      }
      
    }else{
    $_SESSION['status'] = "<h6 class='text-danger'>plese check I am not robot !</h6>";
    header('Location: ../register.php');
    exit(0);
  }
  
    }else{
  $_SESSION['status'] = "<h6 class='text-danger'>Somthing went wrong !</h6>";
    header('Location: ../register.php');
    exit(0);
}
    
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>Confirm Password Not Match</h6>";
    header("Location: ../register.php");
    exit(0);
  }
  
}
?>