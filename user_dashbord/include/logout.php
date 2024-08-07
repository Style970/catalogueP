<?php
require_once "../../google_api/config.php";
//session_start();
if(isset($_POST['logout_btn'])){
  
  unset($_SESSION['auth']);
  unset($_SESSION['auth_user']);
  unset($_SESSION['access_token']);
  unset($_SESSION['mobile_session']);
  unset($_SESSION['acount_type']);
	$gClient->revokeToken();
  
  $_SESSION['status'] = "<h6 class='text-danger'>You are logout</h6>";
  session_destroy();
  header("Location: ../../login.php");
  exit(0);
  
}//logout end
?>