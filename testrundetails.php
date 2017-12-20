<?php

session_start();
include_once 'conn.php';
// dapat test run id
$id = $_GET['id'];
$tr_id = $_GET['trid'];
$studentid =$_SESSION['studentid'];


// get ts_id
$result1=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id");
$row2=mysqli_fetch_array($result1);

$result4=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id");
$resultt=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_status = 'Pass'");
$resulttt=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_status = 'Fail'");
$resultttt=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_status = 'Skip'");
$resulttttt=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_status = ''");

// Count table rows 
$count=mysqli_num_rows($result4);
$countPass=mysqli_num_rows($resultt);
$countFail=mysqli_num_rows($resulttt);
$countSkip=mysqli_num_rows($resultttt);
$countNotRun=mysqli_num_rows($resulttttt);

//get number level of test case
$ltc_result=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_level = ' High'");
$ltc_result1=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_level = ' Medium'");
$ltc_result2=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_level = ' Low'");

//count level of test case
$tch_count=mysqli_num_rows($ltc_result);
$tcm_count=mysqli_num_rows($ltc_result1);
$tcl_count=mysqli_num_rows($ltc_result2);

//get number level of risk
$lr_result=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_level_risk = ' High'");
$lr_result1=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_level_risk = ' Medium'");
$lr_result2=mysqli_query($con,"SELECT * FROM runtestcase WHERE tr_id= $tr_id AND trc_level_risk = ' Low'");

//count level of risk
$lrh_count=mysqli_num_rows($lr_result);
$lrm_count=mysqli_num_rows($lr_result1);
$lrl_count=mysqli_num_rows($lr_result2);

// get test run name
$res=mysqli_query($con,"SELECT * FROM testrun WHERE tr_id= $tr_id");
$row1=mysqli_fetch_array($res);
$ts_id=$row2['ts_id'];

// get test run name
$res1=mysqli_query($con,"SELECT * FROM testsuite WHERE ts_id in (SELECT ts_id FROM testrun WHERE tr_id= $tr_id)");
$roww=mysqli_fetch_array($res1);
$ts_name=$roww['ts_name'];

if ($row2['tr_id'] !== $tr_id) {

    $query2= "INSERT INTO runtestcase (ts_id,tr_id, trc_title, trc_desc,trc_precondition,trc_input,trc_test_step,trc_level,trc_risk,trc_level_risk,trc_expected_result) 
    SELECT t1.ts_id,t2.tr_id, t1.tc_title, t1.tc_desc, t1.tc_precondition, t1.tc_input, t1.tc_test_step, t1.tc_level, t1.tc_risk, t1.tc_level_risk, t1.tc_expected_result FROM testcase t1 JOIN testrun t2 ON t2.ts_id = t1.ts_id  WHERE t2.tr_id=$tr_id";
    $result2= mysqli_query($con,$query2);
    mysqli_data_seek($result1, 0);
} else{
   

}

// get student
$result=mysqli_query($con,"SELECT * FROM student WHERE studentid=".$_SESSION['studentid']);
$fetched_row=mysqli_fetch_array($result);


// Check if button name "Submit" is active, do this 
if(isset($_POST['submit'])){
    for($i=0;$i<$count;$i++){
    $sql1="UPDATE runtestcase SET trc_actual_result='" . $_POST["trc_actual_result"][$i] . "', trc_status='" . $_POST["trc_status"][$i] . "' WHERE runtestcase_id='" . $_POST["runtestcase_id"][$i] . "'";
    $result5=mysqli_query($con,$sql1);
    }
    if($result5){
       
        header("location:".$_SERVER['HTTP_REFERER']);
        
       }
      
    }
    
  
    

?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <title>Test Case Management Tool</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    
        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>
    
        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />
    
    
        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        
<!-- Button trigger modal -->

<!-- realod page -->
<script type="text/javascript">
$(document).ready(function(){    
    //Check if the current URL contains '#'
    if(document.URL.indexOf("#")==-1){
        // Set the URL to whatever it was plus "#".
        url = document.URL+"#";
        location = "#";

        //Reload the page
        location.reload(true);
    }
});
</script>

<!-- donut chart -->

<script>

$(document).ready(function(){
	var ctx = $("#mycanvas").get(0).getContext("2d");
var pass = <?php echo  $countPass ?>;
var fail = <?php echo  $countFail ?>;
var skip = <?php echo  $countSkip ?>;
var notrun = <?php echo  $countNotRun ?>;

	var data = [
		{
			value: pass ,
			color: "yellowgreen",
			highlight: "green",
			label: "Passed"
		},
		{
			value:fail,
			color: "red",
			highlight: "pink",
			label: "Failed"
        },
        {
			value: skip,
			color: "orange",
			highlight: "darkorange" ,
			label: "Skipped"
		},
		{
			value:notrun,
			color: "blue",
			highlight: "lightskyblue",
			label: "Not Run"
		}
	];

	var chart = new Chart(ctx).Doughnut(data);
});


</script>

<!-- bar chart -->
<script>
window.onload = function () {

var barchart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Priority Level of Test Case "
	},
	axisY: {
		title: "Number of level"
	},
	data: [{        
		type: "column",  
		//showInLegend: true, 
		//legendMarkerColor: "grey",
		//legendText: "MMbbl = one million barrels",
		dataPoints: [      
            { y: <?php echo $tcl_count ?>,  label: "Low" },
            { y: <?php echo $tcm_count ?>,  label: "Medium" },
			{ y: <?php echo $tch_count ?>, label: "High" }
			
			
			
		]
	}]
});
barchart.render();
barchart = {};

var linechart = new CanvasJS.Chart("linechartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Risk Level"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
			{ y: <?php echo $lrl_count ?>,  label: "Low" },
            { y: <?php echo $lrm_count ?>,  label: "Medium" },
			{ y: <?php echo $lrh_count ?>, label: "High" }
		]
	}]
});
linechart.render();
linechart = {};

}
</script>

</head>

<body>

<div class="wrapper">
<div class="sidebar" data-color="blue" data-image="assets/img/soft.jpg">

    <!--
Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
Tip 2: you can also add an image using data-image tag
-->

<div class="sidebar-wrapper">
<div class="logo">
    <a href="#" class="simple-text">
   TEST CASE MANAGEMENT TOOL
</a>
</div>

<ul class="nav">
    <li >
        <a href="dashboard.php">
            <i class="pe-7s-note2"></i>
            <p>All Project</p>
        </a>
    </li>
    

    <!-- <li>
        <a href="overview.php?id=<?php echo $id ?>">
            <i class="pe-7s-note2"></i>
            <p>Overview</p>
        </a>
    </li> -->
    <li class="active" >
    <a href="testplan.php?id=<?php echo $id ?>">
        <i class="pe-7s-news-paper"></i>
        <p>Test Plan</p>
    </a>
</li>
    <li >
        <a href="testsuite.php?id=<?php echo $id ?>">
            <i class="pe-7s-copy-file"></i>
            <p>Test Suite</p>
        </a>
    </li>
    <li>
        <a href="testrun.php?id=<?php echo $id ?>">
            <i class="pe-7s-display1"></i>
            <p>Test Run</p>
        </a>
    </li>
    <li >
    <a href="alltestplan.php?id=<?php echo $id ?>">
            <i class="pe-7s-notebook"></i>
            <p>All Test Plan</p>
        </a>
    </li>


</ul>
</div>
</div>

<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="#">Test Run for <?php echo $row1['tr_name']; ?></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                
                 
                </ul> 

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="viewprofile.php">
                       <?php  echo "welcome    ".$fetched_row['username']."!"; ?>
                    </a>
                    </li>
                
                    <li>
                        <a onclick="return confirm('Are you sure want to logout?')"  href="logout.php">
                        Log out
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   

             <div class="content">
                <div class="container-fluid">
                
                <div style="height:70px; text-align: right;" >   
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Run all tests</button>
                 <a type="button" class="btn btn-primary" href="testrunreport.php?id=<?php echo $id ?>&trid=<?php echo $tr_id; ?>">View Report</a>
                </div>
            </div>
            
                    <!-- row 1-->
                    <div class="row">
                    <!-- first box -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Test Run Result</h4>
                                    <hr>
                                </div>
                                <div class="content">
                                <script type="text/javascript" src="graphjs/jquery-2.1.4.min.js"></script>
                                <script type="text/javascript" src="graphjs/Chart.js"></script>
                               
                              <div> <canvas id="mycanvas" width="340" height="340"></canvas></div>
                               
                                </div>
                            </div>
                        </div>

<!-- 2nd box -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Test Run Result</h4>
                                    <hr>
                                </div>
                                <div class="content" >
                                   
                               
                                    <font size ="5"> <i class="fa fa-circle text-primary"></i>
                                     <?php echo "    ". $countNotRun?>  Not Run</font> <br>
                                    <span class="desc">Test cases still to be run</span>
                                      
                                    <hr>
                                    <font size ="5"> <i class="fa fa-circle text-success"></i>
                                  <?php echo "    ". $countPass?>  Passed</font> <br>
                                    <span class="desc">Test cases have passed</span>
                                      
                                    <hr>
                                    <font size ="5"> <i class="fa fa-circle text-danger"></i> 
                                    <?php echo "    ". $countFail?> Failed</font> <br>
                                    <span class="desc">Test cases have failed</span>
                                      
                                    <hr>
                                    <font size ="5"> <i class="fa fa-circle text-warning"></i> 
                                     <?php echo "    ". $countSkip?>  Skipped</font> <br>
                                    <span class="desc">Test cases have been skipped</span>
                                      

                                  
                                </div>
                            </div>
                        </div>

                    </div>


                <!-- row 2-->
                <div class="row">
                    <!-- first box -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Test Case Level for Test Suite <?php echo $ts_name ?></h4>
                                </div>
                                <div class="content">
                                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                </div>
                            </div>
                        </div>

                        <!-- 2nd box -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Risk Level  for Test Suite <?php echo $ts_name ?></h4>
                                </div>
                                <div class="content">
                                <div id="linechartContainer" style="height: 400px; width: 100%;"></div>
                               
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
             </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:1300px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Test Run</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- table -->
      <div style="overflow-x:auto;">
      <form method="post" action="">
        <table class="table table-hover table-bordered" width="100%">
            <thread>    
                <tr>
                     <th>Number</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Precondition</th>
                     <th>Input</th>
                     <th>Test step</th>
                     <th>test case level</th>
                     <th>risk</th>
                     <th>level of risk</th>
                     <th>expected result</th>
                     <th>Actual result</th>
                     <th>Status</th>
   
                 </tr>
            </thread>  
<!-- body table -->
            <tbody>

            <?php
            $i =1;
            for($i=1;$i<=$count;$i++) {
            while ($row[$i]=mysqli_fetch_array($result4)) {
                
                $runtestcase_id[]= $row[$i]['runtestcase_id'];
                $trc_title= $row[$i]['trc_title'];
                $trc_desc= $row[$i]['trc_desc'];
                $trc_precondition= $row[$i]['trc_precondition'];
                $trc_input= $row[$i]['trc_input'];
                $trc_test_step= $row[$i]['trc_test_step'];
                $trc_level= $row[$i]['trc_level'];
                $trc_risk= $row[$i]['trc_risk'];
                $trc_level_risk= $row[$i]['trc_level_risk'];
                $trc_expected_result= $row[$i]['trc_expected_result'];
                $trc_status= $row[$i]['trc_status'];
            
                
            ?>
            <tr>
            <input type="hidden" name="runtestcase_id[]" value="<?php echo $row[$i]['runtestcase_id']; ?>">
             <td><?php echo $i; ?></td>
             <td><?php echo $trc_title; ?></td>
             <td><?php echo $trc_desc; ?></td>
             <td><?php echo $trc_precondition; ?></td>
             <td><?php echo $trc_input; ?></td>
             <td><?php echo $trc_test_step; ?></td>
             <td><?php echo $trc_level; ?></td>
             <td><?php echo $trc_risk; ?></td>
             <td><?php echo $trc_level_risk; ?></td>
             <td><?php echo $trc_expected_result; ?></td>
             <td><textarea rows="7" cols="25" name="trc_actual_result[]" id="trc_actual_result" ></textarea></td>
             <td><select name= "trc_status[]" id="trc_status">
                <option  value=""></option>
                <option value="Pass">Pass</option>
                <option value="Fail">Fail</option>
                <option value="Skip">Skip</option>
                </select>
            </td>
             </tr>
   
          
         
         <?php

    $i++;
            }
 }
 ?>
   </tbody>
<!--end  body table -->
         </table>
         
 </div>
      <!-- end modal body -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="submit" value="submit" >Save changes</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

</body>


<!--   Core JS Files   -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>