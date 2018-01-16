<?php
session_start();
include_once 'conn.php';
// dapat testplan id
$id = $_GET['id'];
$ts_id = $_GET['tsid'];
$studentid =$_SESSION['studentid'];

//read testsuite
$result=mysqli_query($con,"SELECT * FROM testcase WHERE ts_id=$ts_id");
//$fetched_row=mysqli_fetch_array($result);

// read project description
$result2=mysqli_query($con,"SELECT * FROM project WHERE projectid=$id");
$fetched_row2=mysqli_fetch_array($result2);
$projectname= $fetched_row2['projectname'];

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
  
	<title>Test Case Report</title>
</head>


<style>
table, th, td {
    border: 1px solid black;
}
div.container {
    width: 100%;
    padding: 1em;
    margin-left: 50px;
    border: 1px solid gray;
}
</style>

<body>
	<!-- 
	content of this area will be the content of your PDF file 
	-->
    
    <div id="parent">
     <div align="center" class="right">
          <!-- button -->
        <div class="button" >
            <div class="btn-group" >
    <p></p>
    <p></p>
             </div>
        </div>
     </div>





<!-- report -->
     
    
  
            <div id="TestCase" padding-left:" 2cm;"  style=" left:50px; right :50px; width:1200px;" class="container">
            
            <p style="text-align: center;"><span style="font-family: 'times new roman', times;"><span style="font-size: 20pt;">TEST CASE SPECIFICATION REPORT</span></span></p>
            
            <p style="text-align: center;">&nbsp;</p>
            <p style="text-align: left;"><span style="font-size: 15pt; font-family: 'times new roman', times;">&nbsp;Project name:&nbsp;<?php echo $projectname ?></span></p>
<p style="text-align: left;">&nbsp;</p>

 <?php
 $i =1;
 while ( $row= mysqli_fetch_array ($result)) {
        $tc_title= $row['tc_title'];
        $tc_desc= $row['tc_desc'];
        $tc_precondition= $row['tc_precondition'];
        $tc_input= $row['tc_input'];
        $tc_test_step= $row['tc_test_step'];
        $tc_level= $row['tc_level'];
        $tc_risk= $row['tc_risk'];
        $tc_level_risk= $row['tc_level_risk'];
        $tc_expected_result= $row['tc_expected_result'];

?>
            <div padding-left:" 2cm;"  style=" left:80px; right :80px; width:1150px;">
            <p style="text-align: left;"><span style="font-size: 14pt; font-family: 'times new roman', times;"> <?php echo $i.". TC".$i." ".  $tc_title; ?></span></p>
            <div class="table-responsive">
            <table  class="table table-striped" >
            <colgroup>
            <col width="10%">
                <col width="30%">
                   
        </colgroup>
        <thead>
        <tr>
        <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp;<?php echo " TC".$i ?></span></td>
        <td ></td>
        </tr>
        
        </thead>
            <tbody>
            <tr>
        <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Description:</span></td>
        <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; <?php echo $tc_desc; ?></span></td>
        </tr>
        <tr>
            <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Preconditions:</span></td>
            <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; <?php echo $tc_precondition; ?></span></td>
            </tr>
            <tr >
            <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Input:</span></td>
            <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; <?php echo $tc_input; ?></span></td>
            </tr>
            <tr >
            <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Test steps:</span></td>
            <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp;<?php echo $tc_test_step; ?></span></td>
            </tr>
            <tr >
            <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Test case level:</span></td>
            <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; <?php echo $tc_level; ?></span></td>
            </tr>
            <tr >
            <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Expected risk:</span></td>
            <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; <?php echo $tc_risk; ?></span></td>
            </tr>
            <tr >
            <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Level of risk:</span></td>
            <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; <?php echo $tc_level_risk; ?></span></td>
            </tr>
            <tr >
            <td style="width: 150px;"><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; Expected result:</span></td>
            <td ><span style="font-family: 'times new roman', times; font-size: 12pt;">&nbsp; <?php echo $tc_expected_result; ?></span></td>
            </tr>
            </tbody>
            </table>
            
            <p style="text-align: left;">&nbsp;</p>
            </div>
     </div>

     <?php

    $i++;

 }
 ?>
   
 </div>
 <div  style=" left:50px; right :50px; width:1200px;" class="container" ><a class="btn btn-success"  onclick="TestCase()">Download PDF</a></div>

 

   

	<!-- these js files are used for making PDF -->
	<script src="assets/js/jspdf.js"></script>
	<script src="assets/js/jquery-2.1.3.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
    function TestCase(){
var pdf = new jsPDF('p', 'pt', 'letter');
source = $('#TestCase')[0];
specialElementHandlers = {
	'#bypassme': function(element, renderer){
        
		return true
	}
}

margins = {
    top: 50,
    bottom: 60,
    left: 40,
    width: 522,
   
  };
pdf.fromHTML(
  	source // HTML string or DOM elem ref.
  	, margins.left // x coord
  	, margins.top // y coord
  	, {
  		'width': margins.width // max width of content on PDF
  		, 'elementHandlers': specialElementHandlers
  	},
  	function (dispose) {
  	  // dispose: object with X, Y of the last line add to the PDF
  	  //          this allow the insertion of new lines after html
        pdf.save('Test Case Report.pdf');
      }
      , margins
  );		
}
    
    </script>
</body>
</html>