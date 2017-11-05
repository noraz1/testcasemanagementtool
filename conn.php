<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "tcmt";
$con = mysqli_connect($host,$user,$password,$database);
// check connection
if (mysqli_connect_errno()){
	echo "fail to connect to mysql:".mysqli_connect_errno;
}
?>