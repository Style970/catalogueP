<?php
session_start();
include('../admin/config/dbconn.php');

if(isset($_GET['token'])){
 $token = $_GET['token'];
 $sql = "SELECT db_verify_token,db_role_as FROM register_user WHERE db_verify_token='$token' LIMIT 1";
  $sql_query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($sql_query) > 0){
    $row = mysqli_fetch_array($sql_query);
    
    if($row['db_role_as'] == "0"){
      $click_token = $row['db_verify_token'];
      $update_sql = "UPDATE register_user SET db_role_as='2' WHERE db_verify_token='$click_token' LIMIT 1";
      $update_query = mysqli_query($conn, $update_sql);
      if($update_query){
        $_SESSION['status'] = "<h6 class='text-success'> your email verified successfully </h6>";
      header("Location: ../login.php");
      exit(0);
      
      }else{
        $_SESSION['status'] = "<h6 class='text-danger'>Verification Failed </h6>";
      header("Location: ../login.php");
      exit(0);
      }
      
    }else{
      $_SESSION['status'] = "<h6 class='text-danger'>Email alredy verified </h6>";
      header("Location: ../login.php");
      exit(0);
    }
    
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>this token not exist</h6>";
    header("Location: ../login.php");
    exit(0);
  }
  
}else{
  $_SESSION['status'] = "<h6 class='text-danger'>Not Allowed</h6>";
  header('Location: ../login.php');
}
?>