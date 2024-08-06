<?php
session_start();
include('../admin/config/dbconn.php');
if(isset($_POST['update_pass_btn'])){
  
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  if($pass==$cpass){
    $up_token = $_POST['pass_token'];
    $up_email = mysqli_real_escape_string($conn, $_POST["pass_email"]);
    $up_password = mysqli_real_escape_string($conn, $_POST['cpassword']);
 
 if(!empty($up_token)){
   if(!empty($up_email) && !empty($up_password)){
     //check token valid or Not
     $check_token = "SELECT db_verify_token FROM register_user WHERE db_verify_token='$up_token' LIMIT 1";
     $check_token_run = mysqli_query($conn, $check_token);
     if(mysqli_num_rows($check_token_run) > 0){
       $update_pass = "UPDATE register_user SET db_pass='$up_password' WHERE db_verify_token='$up_token' LIMIT 1";
       $pass_query = mysqli_query($conn, $update_pass);
       if($pass_query){
         $new_token = md5(rand());
         $new_token_sql = "UPDATE register_user SET db_verify_token='$new_token' WHERE db_verify_token='$up_token' LIMIT 1";
       $new_query = mysqli_query($conn, $new_token_sql);
         
         $_SESSION['status'] = "<h6 class='text-danger'>Password change Successfully Updated !</h6>";
   header("Location: ../login.php");
         
       }else{
         $_SESSION['status'] = "<h6 class='text-danger'>Password not updated. Somthing went rong</h6>";
   header("Location: ../pass_change.php");
       }
       
     }else{
       $_SESSION['status'] = "<h6 class='text-danger'>Link is Expire</h6>";
   header("Location: ../pass_change.php");
     }
     
   }else{
       $_SESSION['status'] = "<h6 class='text-danger'>All filds are mandattory</h6>";
   header("Location: ../pass_change.php");
   }
   
 }else{
   $_SESSION['status'] = "<h6 class='text-danger'>No token Available</h6>";
   header("Location: ../pass_change.php");
 }
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>Confirm Password Not Match</h6>";
    header("Location: ../pass_change.php");
    exit(0);
  }
  
}else{
  $_SESSION['status'] = "<h6 class='text-danger'Not Allow</h6>";
   header("Location: ../login.php");
}
 
?>