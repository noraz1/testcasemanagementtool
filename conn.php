<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "tcmt";

if(!mysql_connect($host,$user,$password)){
	die('connection problem!' .mysql_error());
} else {
//echo "success connect";
}

if(!mysql_select_db($database)){
	die('database selection problem!'.mysql_error());
} else {
	//echo "database select correct";
}
?>