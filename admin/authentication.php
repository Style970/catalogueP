<?php
session_start();
if(!isset($_SESSION['auth'])){
  $_SESSION['status'] = "<h6 class='text-danger'>Access Denied</h6>";
  header('Location: ../login.php');
    exit(0);
}else{
  
  if($_SESSION['auth'] == "1"){
    
  }else{
   header('Location: ../user_dashbord/index.php');
  }
  
}

?>