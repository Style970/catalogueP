<?php
	session_start();
	require_once "API/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("937947225824-r0bnifm06qfoh7gln6huhh0fdehdk04p.apps.googleusercontent.com");
	$gClient->setClientSecret("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");
	$gClient->setApplicationName("admin_project");
	$gClient->setRedirectUri("http://localhost:8080/Myproject/service/google_api/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('127.0.0.1', 'root','' ,'admin_project');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?>
