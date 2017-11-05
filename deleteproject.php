<?php

include_once 'conn.php';

// get variable
$projectid = $POST['id'];

// create query
$delete = mysqli_query($con, "DELETE FROM project WHERE projectid=$projectid");

//check
if(!$delete){
    echo"error";
}else{
    echo "success!";
}
?>