<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "admin_project";

$conn = mysqli_connect("$host","$username","$password","$database");
//chec mysqli_connection
if(!$conn){
 // header("Location: ../errors/db.php");
  die(mysqli_connect_error($conn));
}
?>