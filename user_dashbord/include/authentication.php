<?php
session_start();
if(!isset($_SESSION['auth'])){
  $_SESSION['status'] = "<h6 class='text-danger'>Access Denied</h6>";
  header('Location: ../login.php');
    exit(0);
}else{
  
  if($_SESSION['auth'] == "2"){
    
   
  }else{
   if (isset($_SESSION['acount_type'])){
     header('Location: ../mobile_otp.php');
    exit(0);
     
    }else{
      header('Location: ../resend_email.php');
    exit(0);
    }
     
  
  }
  
}
?>