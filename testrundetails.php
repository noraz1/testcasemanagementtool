<?php

session_start();
include_once 'conn.php';
// dapat test run id
$id = $_GET['id'];
$tr_id = $_GET['trid'];
$studentid =$_SESSION['studentid'];

// get ts_id
$result1=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id");
$row=mysqli_fetch_array($result1);
//$ts_id=$fetched_row1['ts_id'];

if ($row['tr_id'] !== $tr_id) {

    $query2= "INSERT INTO runtestcase (ts_id,tr_id, trc_title, trc_desc,trc_precondition,trc_input,trc_test_step,trc_level,trc_risk,trc_level_risk,trc_expected_result) 
    SELECT t1.ts_id,t2.tr_id, t1.tc_title, t1.tc_desc, t1.tc_precondition, t1.tc_input, t1.tc_test_step, t1.tc_level, t1.tc_risk, t1.tc_level_risk, t1.tc_expected_result FROM testcase t1 JOIN testrun t2 ON t2.ts_id = t1.ts_id  WHERE t2.tr_id=$tr_id";
    $result2= mysqli_query($con,$query2);
} else{
echo "data already exist:";

}

// get student
$result=mysqli_query($con,"SELECT * FROM student WHERE studentid=".$_SESSION['studentid']);
$fetched_row=mysqli_fetch_array($result);

?>
