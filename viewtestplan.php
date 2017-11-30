<?php
session_start();
include_once 'conn.php';
// dapat testplan id
$id = $_GET['id'];
$studentid =$_SESSION['studentid'];

//read testplan
$result=mysqli_query($con,"SELECT * FROM testplan WHERE tp_id=$id");
$fetched_row=mysqli_fetch_array($result);

//feedback
$result1=mysqli_query($con,"SELECT * FROM feedback WHERE tp_id=$id");
$fetched_row1=mysqli_fetch_array($result1);
$feedbackid= $fetched_row1['feedback_id'];
$feedback= $fetched_row1['lect_feedback'];

//student group
$result4=mysqli_query($con,"SELECT * FROM student WHERE studentid=".$_SESSION['studentid']);
$row=mysqli_fetch_array($result4);
$classgroup=$row['classgroup'];
$matricnum=$row['matricnum'];
?>



<style>
div.container {
    width: 100%;
    padding: 1em;
    margin-left: 50px;
    border: 1px solid gray;
}

.button {
    display: block;
    padding: 10px;
    text-align: justify;
    margin-left: 45px;
    margin-top: 20px; /* OR ADD THIS LINE AND SET YOUR PROPER SPACE as the space above box2 */
}
#parent {
    overflow: hidden;
    
}
.right {
    float: right;
    margin-right: 150px;
    height: 70px;
    margin-top: 15px;
   
}
.left {
    margin-left: 45px;
    padding: 10px;
    float: left;
    overflow: hidden;
    height: 100px;
    
    
   
}

</style>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<title>Test Plan</title>
</head>
<body>
	<!-- 
	content of this area will be the content of your PDF file 
	-->
    
    <div id="parent">
     <div align="center" class="right">
          <!-- button -->
        <div class="button" >
            <div class="btn-group" >
                 <a class="btn btn-success" href="#" onclick="TestPlan()">Download PDF</a>
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                     Open comment
                 </button>
                 <button class="btn btn-success" type="submit" id="submit" value="1"  name="submit" onclick= "myFunction()" >Submit</button>

             </div>
        </div>
     </div>



<!-- submit to lecturer -->
     <script>
function myFunction() {
   
    if (confirm('Are you sure you want to submit this Test Plan to lecturer?')) {

             <?php
             // delete old data in tpl
            mysqli_query($con, "DELETE FROM tp_lecturer WHERE tpl_id=$id");
            ?>
            alert ('are you sure?');
           <?php
           // insert new data
         //  $query = " INSERT INTO tp_lecturer (tpl_id, projectid, tpl_name, tpl_introduction, tpl_test_item, tpl_features_to_be_tested, tpl_features_not_to_be_tested, tpl_approach,
          // tpl_item_passfail_criteria, tpl_testing_task, tpl_test_deliverable, tpl_environmental_need,
         //  tpl_responsibilities, tpl_schedule, tpl_risk, tpl_approval, groupclass ) 
          // VALUES ('$tp_id ','$projectid ','$tp_name','$tp_introduction','$tp_test_item','$tp_features_to_be_tested','$tp_features_not_to_be_tested', '$tp_approach','$tp_item_passfail_criteria',$tp_testing_task','$tp_test_deliverable',
          // '$tp_environmental_need', '$tp_responsibilities','$tp_schedule','$tp_risk', '$tp_approval','$groupclass') WHERE tp_id=$id";
         $query= " INSERT INTO tp_lecturer (tpl_id, projectid, tpl_name, tpl_introduction, tpl_test_item, tpl_features_to_be_tested, tpl_features_not_to_be_tested, tpl_approach,
          tpl_item_passfail_criteria, tpl_testing_task, tpl_test_deliverable, tpl_environmental_need,
          tpl_responsibilities, tpl_schedule, tpl_risk, tpl_approval) SELECT tp_id, projectid, tp_name, tp_introduction, tp_test_item, tp_features_to_be_tested, tp_features_not_to_be_tested, tp_approach,
           tp_item_passfail_criteria, tp_testing_task, tp_test_deliverable, tp_environmental_need,
          tp_responsibilities, tp_schedule, tp_risk, tp_approval FROM testplan WHERE tp_id=$id";
            $result2= mysqli_query($con,$query);
           mysqli_query($con, "UPDATE tp_lecturer SET classgroup='$classgroup' WHERE tpl_id=$id");
           mysqli_query($con, "UPDATE tp_lecturer SET matricnum='$matricnum' WHERE tpl_id=$id");
         // $query=" INSERT INTO tp_lecturer SELECT * FROM testplan WHERE tp_id=$id";
           

            
            ?>
            alert ('you are successfully submit this test plan to lecturer!');
            
            

   
} else {
    alert ('Failed to submit this test plan to lecturer! Please try again.');
}
}
</script>



<!-- report -->
        <div align="center" class="left">
            <h1> Test Plan Report </h1>
        </div>

    </div>
  
            <div id="TestPlan" padding-left:" 2cm;"  style=" left:50px; right :50px; width:1200px;" class="container">
        
            <p><span style="font-size: 14pt;" name="tp_name"><strong>Test plan for: <?php echo $fetched_row['tp_name']; ?></strong></span></p>
            <p><span style="font-size: 13pt;"><strong>Introduction: </strong><?php echo $fetched_row['tp_introduction']; ?></span></p>
            <p><span style="font-size: 13pt;"><strong>People:&nbsp;</strong><?php echo $fetched_row['tp_responsibilities']; ?></span></p>
            <p><span style="font-size: 13pt;"><strong>Risks: </strong><?php echo $fetched_row['tp_risk']; ?></span></p>
            <p><span style="font-size: 13pt;"><strong>Test stratergy:</strong></span></p>
            <ul>
            <li><span style="font-size: 12pt;"><strong>Test item:&nbsp;</strong><?php echo $fetched_row['tp_test_item']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Features to be tested:</strong>&nbsp; </span><span style="font-size: 12pt;"><?php echo $fetched_row['tp_features_to_be_tested']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Features not to be tested:</strong> <?php echo $fetched_row['tp_features_not_to_be_tested']; ?></span></li>
            <li><span style="font-size: 12pt;" name="username" ><strong>Approach:</strong> <?php echo $fetched_row['tp_approach']; ?></span></li>
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
   



 <!-- The Modal -->
 <div class="modal fade" id="myModal">
 <div class="modal-dialog">
   <div class="modal-content">
   
     <!-- Modal Header -->
     <div class="modal-header">
       <h4 class="modal-title">Lecturer comment</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     
     <!-- Modal body -->
     <div class="modal-body">
     <?php
    if ($feedback != "") {
        echo $feedback;
    }else
     
     echo "no comment yet!";
     
     ?>
     </div>
     
     <!-- Modal footer -->
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     </div>
     
   </div>
 </div>



	<!-- here we call the function that makes PDF -->
	

   

	<!-- these js files are used for making PDF -->
	<script src="assets/js/jspdf.js"></script>
	<script src="assets/js/jquery-2.1.3.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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