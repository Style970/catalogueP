<?php
session_start();
include('../admin/config/dbconn.php');

if(isset($_POST['otp_verify_btn'])){
  $otp_verify = $_POST['otp_mobile'];
  $mobile = trim($_POST['mobile']);
  
    $otp_sql = "SELECT * FROM google_users WHERE db_mobile='$mobile' AND db_otp='$otp_verify' LIMIT 1";
    $query_run = mysqli_query($conn, $otp_sql);
    
    if(mysqli_num_rows($query_run)>0){
      
      $update_otp_sql = "UPDATE google_users SET db_role_as='2' WHERE db_mobile='$mobile' AND db_otp='$otp_verify' LIMIT 1";
      $update_otp_query = mysqli_query($conn, $update_otp_sql);
      if($update_otp_query){
        $_SESSION['status'] = "<h6 class='text-success'>Otp verify successfull. !</h6>";
       header('Location: ../login.php');
      }else{
        $_SESSION['status'] = "<h6 class='text-danger'>Sumthing went rong !</h6>";
       header('Location: ../otp.php');
      }
      
       
    }else{
      $_SESSION['status'] = "<h6 class='text-danger'>Otp not match !</h6>";
       header('Location: ../otp.php');
    }
}
?>