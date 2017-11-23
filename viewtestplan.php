<?php
session_start();
include_once 'conn.php';
// dapat testpplan id
$id = $_GET['id'];

$result=mysqli_query($con,"SELECT * FROM testplan WHERE tp_id=$id");
$fetched_row=mysqli_fetch_array($result);


?>
<style>
div.container {
    width: 100%;
    padding: 1em;
    margin-left: 50px;
    border: 1px solid gray;
}
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Test Plan</title>
</head>
<body>
	<!-- 
	content of this area will be the content of your PDF file 
	-->

   
	<div id="TestPlan"padding-left:" 2cm;" style=" left:50px; right :50px; width:1200px;" class="container">

    <p><span style="font-size: 14pt;"><strong>Test plan for: <?php echo $fetched_row['tp_name']; ?></strong></span></p>
    <p><span style="font-size: 13pt;"><strong>Introduction: </strong><?php echo $fetched_row['tp_introduction']; ?></span></p>
    <p><span style="font-size: 13pt;"><strong>People:&nbsp;</strong>dvf<?php echo $fetched_row['tp_responsibilities']; ?>dceces</span></p>
    <p><span style="font-size: 13pt;"><strong>Risks: </strong><?php echo $fetched_row['tp_risk']; ?></span></p>
    <p><span style="font-size: 13pt;"><strong>Test stratergy:</strong></span></p>
    <ul>
    <li><span style="font-size: 12pt;"><strong>Test item:&nbsp;</strong><?php echo $fetched_row['tp_test_item']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Features to be tested:</strong>&nbsp; </span><span style="font-size: 12pt;"><?php echo $fetched_row['tp_features_to_be_tested']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Features not to be tested:</strong> <?php echo $fetched_row['tp_features_not_to_be_tested']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Approach:</strong> <?php echo $fetched_row['tp_approach']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Item pass/fail criteria:</strong> <?php echo $fetched_row['tp_item_passfail_criteria']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Testing task:</strong> <?php echo $fetched_row['tp_testing_task']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Test deliverables:</strong> <?php echo $fetched_row['tp_test_deliverable']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Environmental needs:</strong> <?php echo $fetched_row['tp_environmental_need']; ?></span></li>
    <li><span style="font-size: 12pt;"><strong>Approvals:</strong> <?php echo $fetched_row['tp_approval']; ?></span></li>
    </ul>
    <p><span style="font-size: 13pt;"><strong>Testing activities and estimates: </strong><?php echo $fetched_row['tp_schedule']; ?></span></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


	</div>





	<!-- here we call the function that makes PDF -->
	<a class="btn btn-success" href="#" onclick="TestPlan()">Download PDF</a>

	<!-- these js files are used for making PDF -->
	<script src="assets/js/jspdf.js"></script>
	<script src="assets/js/jquery-2.1.3.js"></script>


	<script>
    function TestPlan(){
var pdf = new jsPDF('p', 'pt', 'letter');
source = $('#TestPlan')[0];
specialElementHandlers = {
	'#bypassme': function(element, renderer){
        
		return true
	}
}
margins = {
    top: 50,
    bottom: 60,
    left: 40,
    width: 522
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
        pdf.save('Test Plan.pdf');
      }
      , margins
  )		
}
    
    </script>
</body>
</html>