<?php
session_start();
include_once 'conn.php';
// dapat testplan id
$id = $_GET['id'];
$studentid =$_SESSION['lect_id'];

//read testplan
$result=mysqli_query($con,"SELECT * FROM tp_lecturer WHERE tpl_id=$id");
$fetched_row=mysqli_fetch_array($result);


// submit mark

if(isset($_POST['submit'])){
    $mark = $_POST['mark'];
    $lect_feedback = $_POST['lect_feedback'];

    $res=mysqli_query($con,"UPDATE feedback SET mark='$mark',lect_feedback='$lect_feedback' WHERE tp_id=$id");
   

}



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
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modall">Give Feedback </button>
              
                 <input type=button class="btn btn-success" onClick="location.href='lectdashboard.php'" value='Back'>
             </div>
        </div>
     </div>


<!-- report -->
        <div align="center" class="left">
            <h1> Test Plan Report </h1>
        </div>

    </div>
  
            <div id="TestPlan" padding-left:" 2cm;"  style=" left:50px; right :50px; width:1200px;" class="container">
        
            <p><span style="font-size: 14pt;" name="tp_name"><strong>Test plan for: <?php echo $fetched_row['tpl_name']; ?></strong></span></p>
            <p><span style="font-size: 13pt;"><strong>Introduction: </strong><?php echo $fetched_row['tpl_introduction']; ?></span></p>
            <p><span style="font-size: 13pt;"><strong>People:&nbsp;</strong><?php echo $fetched_row['tpl_responsibilities']; ?></span></p>
            <p><span style="font-size: 13pt;"><strong>Risks: </strong><?php echo $fetched_row['tpl_risk']; ?></span></p>
            <p><span style="font-size: 13pt;"><strong>Test stratergy:</strong></span></p>
            <ul>
            <li><span style="font-size: 12pt;"><strong>Test item:&nbsp;</strong><?php echo $fetched_row['tpl_test_item']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Features to be tested:</strong>&nbsp; </span><span style="font-size: 12pt;"><?php echo $fetched_row['tpl_features_to_be_tested']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Features not to be tested:</strong> <?php echo $fetched_row['tpl_features_not_to_be_tested']; ?></span></li>
            <li><span style="font-size: 12pt;" name="username" ><strong>Approach:</strong> <?php echo $fetched_row['tpl_approach']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Item pass/fail criteria:</strong> <?php echo $fetched_row['tpl_item_passfail_criteria']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Testing task:</strong> <?php echo $fetched_row['tpl_testing_task']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Test deliverables:</strong> <?php echo $fetched_row['tpl_test_deliverable']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Environmental needs:</strong> <?php echo $fetched_row['tpl_environmental_need']; ?></span></li>
            <li><span style="font-size: 12pt;"><strong>Approvals:</strong> <?php echo $fetched_row['tpl_approval']; ?></span></li>
            </ul>
            <p><span style="font-size: 13pt;"><strong>Testing activities and estimates: </strong><?php echo $fetched_row['tpl_schedule']; ?></span></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
     </div>



<!-- The Modal mark -->
<div>
<div class="modal fade" id="modall">
 <div class="modal-dialog">
   <div class="modal-content">
   
     <!-- Modal Header -->
     <div class="modal-header">
       <h4 class="modal-title">Feedback</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     
     <!-- Modal body -->
     <div class="modal-body">
     <div class="row">
        <form method="post">
            <div class="form-group ">
                 <label class="control-label requiredField" for="lect_feedback"> Please Enter Feedback <span class="asteriskField"> *</span> </label> 
                 <textarea class="form-control" cols="40" rows="10" id="lect_feedback" name="lect_feedback" type="text"> </textarea> 
                 <label class="control-label requiredField" for="mark"> Please Enter Student Mark <span class="asteriskField"> *</span> </label>
                <input class="form-control" id="mark" name="mark" placeholder="Enter Student Mark" type="number"/> 
            </div>
            <div class="form-group">
            <div>
                 <button class="btn btn-primary " name="submit" onclick="return confirm('Are you sure?')" type="submit"> Submit</button>
            </div>
            </div>
        </form>
     </div>
     </div>
     
     <!-- Modal footer -->
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     </div>
     
   </div>
 </div>
</div>
<!-- end mark modal -->

 

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