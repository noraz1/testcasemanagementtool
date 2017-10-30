<?php
include_once 'conn.php';
$projectid = isset($_GET['projectid']) ? $_GET['projectid'] : ''; // $id is now defined
// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysql_query("DELETE FROM project WHERE projectid = '$projectid' ");
mysql_close();

?> 