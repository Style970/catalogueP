<?php
session_start();
include('../admin/config/dbconn.php');
require '../vendor/autoload.php';

use Twilio\Rest\Client;

function otp_verify($mobile_num,$otp)
{
  //trial key 
  $sid = "AC3c02da4c898a916ac3b4dfb4d5c57230";
$token = "b431e45872752be9271eb9ccfe86e8db";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+91$mobile_num", //To mobile
                  
                [//FROM MOBILE
                "from" => "+12063398978",
                "body" => "Apna Catalogue otp verification is : $otp"
                ]
                 );
/*
if($message){
  echo 'Message Send..';
}else{
  echo 'Not send..';
}
*/
}// otp_verify end



// php code
if(isset($_POST['otp_send_btn'])){
  if(isset($_POST['g-recaptcha-response'])){
    $secretkey = '6LdiQKspAAAAAOIIfONiR5bgqFdHzSoDbm8w1ItL';
   $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$_POST['g-recaptcha-response']);
   $response = json_decode($verifyResponse);
  
    if($response->success){
      $mobile_n = trim($_POST['otp_mobile']);
      $user_id = $_POST['user_id'];
      
          //mobile check query
     $check_mobile = "SELECT db_mobile FROM google_users WHERE db_mobile='$mobile_n' LIMIT 1";
     $mobile_query_run = mysqli_query($conn, $check_mobile);
     
    if(mysqli_num_rows($mobile_query_run) > 0){
      $_SESSION['status'] = "<h6 class='text-danger'>Mobile is alrady exist</h6>";
      header("Location: ../mobile_otp.php");
      exit(0);
     }else{
       $_SESSION['mobile_session'] = $mobile_n;
      $otp = rand(1000 , 9999);
     $mobile_num = $_SESSION['mobile_session'];
      
      $query_insert = "UPDATE google_users SET db_mobile='{$mobile_num}', db_otp='{$otp}' WHERE clint_id={$user_id}";
      $query_run = mysqli_query($conn, $query_insert);
      if($query_run){
        otp_verify($mobile_num,$otp);
        
        $_SESSION['status'] = "<h6 class='text-success'>Otp send successfull. !  Plese verify your  <b>$mobile_num</b> </h6>";
       header('Location: ../otp.php');
        exit(0);
      }else{
        $_SESSION['status'] = "<h6 class='text-danger'>otp not send !</h6>";
    header('Location: ../mobile_otp.php');
    exit(0);
      }
      
     }
      
   }else{
    $_SESSION['status'] = "<h6 class='text-danger'>plese check I am not robot !</h6>";
    header('Location: ../mobile_otp.php');
    exit(0);
    }
  
   }else{
  $_SESSION['status'] = "<h6 class='text-danger'>Somthing went wrong !</h6>";
    header('Location: ../mobile_otp.php');
    exit(0);
}
}else{
  header('Location: ../login.php');
    exit(0);
}

?>
