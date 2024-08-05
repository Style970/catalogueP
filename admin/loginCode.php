<?php
session_start();
include("config/dbconn.php");

if(isset($_POST['login_btn'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
  $login_sql = "SELECT * FROM register_user WHERE db_email='$email' AND db_pass='$password' LIMIT 1";
  $query_run = mysqli_query($conn, $login_sql);
   if(mysqli_num_rows($query_run)>0){
     foreach ($query_run as $row){
       $user_id = $row['db_id'];
       $user_name = $row['db_name'];
       $user_email = $row['db_email'];
       $user_mobile = $row['db_mobile'];
       $role_as = $row['db_role_as'];
     }
     $_SESSION['auth'] = "$role_as";
     $_SESSION['auth_user'] = [
       'user_id'=>$user_id,
       'user_name'=>$user_name,
       'user_email'=>$user_email,
       'user_mobile'=>$user_mobile
       ];
       
       $_SESSION['status'] = "<h6 class='text-success'>Login successfully</h6>";
       header("Location: index.php");
       
   }else{
     $_SESSION['status'] = "<h6 class='text-danger'>Invalid email or password</h6>";
     
      header("Location: ../login.php");
   }
  
}else{
  $_SESSION['status'] = "<h6 class='text-danger'>Access Denied</h6>";
     
         header("Location: ../login.php");
}

?>