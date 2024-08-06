<?php
	require_once "config.php";
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: ../login.php');
		exit();
	}
	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();
	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
	$_SESSION['name'] = $userData['name'];
	
	        // Check whether the user data already exist in the database 
        $query = "SELECT * FROM google_users WHERE clint_id = '".$userData['id']."' AND google_email = '".$userData['email']."'"; 
        $result = mysqli_query($con,$query); 
        if(mysqli_num_rows($result) > 0){
          
          $up_query = "UPDATE google_users SET name = '".$userData['givenName']."', last_name = '".$userData['familyName']."', google_email = '".$userData['email']."', gender = '".$userData['gender']."', picture_link = '".$userData['picture']."' WHERE clint_id = '".$userData['id']."' AND google_email = '".$userData['email']."'"; 
            $update = mysqli_query($con,$up_query);
      foreach ($result as $row){
            $role_as = $row['db_role_as'];
            $acount_type = $row['db_acount_type'];
          }
      $_SESSION['auth'] = "$role_as";
      $_SESSION['acount_type'] = "$acount_type";
     $_SESSION['auth_user'] = [
       'user_id'=>$userData['id'],
       'user_name'=>$userData['name'],
       'user_email'=>$userData['email'],
       'image-url'=>$userData['picture']
       ];
        header('Location: ../user_dashbord/index.php');
        exit(0);
        }else{
          $sql="insert into google_users (clint_id,name,last_name,google_email,gender,picture_link) values
 ('".$userData['id']."','".$userData['givenName']."','".$userData['familyName']."','".$userData['email']."',
 '".$userData['gender']."','".$userData['picture']."')";
	mysqli_query($con,$sql);
	
     $_SESSION['auth_user'] = [
       'user_id'=>$userData['id'],
       'user_name'=>$userData['name'],
       'user_email'=>$userData['email'],
       'image-url'=>$userData['picture']
       ];
       $_SESSION['status'] = "<h6 class='text-success'>Registeration successfull. !  Plese verify your mobile no.</h6>";
	header('Location: ../mobile_otp.php');
	exit(0);
        
      }
        
?>