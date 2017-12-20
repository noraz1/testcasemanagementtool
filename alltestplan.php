<?php

session_start();
include_once 'conn.php';
$id = $_GET['id'];
$studentid =$_SESSION['studentid'];

$result=mysqli_query($con,"SELECT * FROM student WHERE studentid=".$_SESSION['studentid']);
$fetched_row=mysqli_fetch_array($result);



$result1 = mysqli_query ($con,"SELECT * FROM tp_lecturer WHERE mark=20");


 
?>

<style>
#parent {
    overflow: hidden;
    
}
.right {
    float: right;
   
    height: 50px;
    margin-top: 60px;
   
}
.left {
    
    padding: 10px;
    float: left;
    overflow: hidden;
    height: 125px;
    
    
   
    
   
}

</style>

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
            <li >
            <a href="testplan.php?id=<?php echo $id ?>">
                <i class="pe-7s-news-paper"></i>
                <p>Test Plan</p>
            </a>
        </li>
            <li>
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
            <li class="active">
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
                <a class="navbar-brand" href="#">Test Plan</a>
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
<!-- head table -->
<div class="container">
    <div class="row">
    <div class="card">
        <div class="col-md-11">
            <div class="panel-heading">
            <div class="w3-container">
       
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div id="parent">
   

        <div align="center" >
        <h1>All Test Plan List</h1>
        <p>Test Plan list that got full mark from lecturer</p>
        <p></p>
        </div>

    </div>


    </div>
</div>





<!-- row for table -->
    
    <div class="row">   
    <div class="card">
<div class="panel-body">
<div class="col-md-11">
<table class="table table-hover table-bordered">
<thread>    
    <tr>
        <th>Number</th>
        <th>Test Plan Name</th>
        <th>Project Description</th>
         <th>View</th>
   
    </tr>
</thread>  
<!-- body table -->
<tbody>
<?php
 $i =1;
 while ( $row= mysqli_fetch_array ($result1)) {
    $tpl_id= $row['tpl_id'];
    $tpl_name= $row['tpl_name'];
    $tpl_introduction = $row['tpl_introduction'];
    $tpl_test_item = $row['tpl_test_item'];
    $tpl_features_to_be_tested = $row['tpl_features_to_be_tested'];
    $tpl_features_not_to_be_tested = $row['tpl_features_not_to_be_tested'];
    $tpl_approach = $row['tpl_approach'];
    $tpl_item_passfail_criteria = $row['tpl_item_passfail_criteria'];
    $tpl_testing_task = $row['tpl_testing_task'];
    $tpl_test_deliverable = $row['tpl_test_deliverable'];
    $tpl_environmental_need = $row['tpl_environmental_need'];
    $tpl_responsibilities = $row['tpl_responsibilities'];
    $tpl_schedule = $row['tpl_schedule'];
    $tpl_risk = $row['tpl_risk'];
    $tpl_approval = $row['tpl_approval'];
    $projectdesc = $row['projectdesc'];
       
?>

    <tr>
    <td><?php echo $i; ?></td>
    <td> <?php echo $tpl_name;?></td>
    <td> <?php echo $projectdesc;?></td>
   
<!-- button view, update, delete -->
    <td class= 'text-center'>
    <a href="#view<?php echo $tpl_id;?>"  data-toggle="modal" class="btn btn-primary" > View</a>
    </td>
     
    </tr>
    <div  id="view<?php echo $tpl_id;?>" class="w3-modal" data-backdrop="false">
    <div class="modal-dialog modal-lg">
            <div class="w3-modal-content">
                <div class="w3-container">
                <span type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
   
                    <div class="modal-header"> <h1 style="text-align: center;" ><span style="font-size: 24pt; font-family: 'times new roman', times;">  Test Plan Report </h1></div>

                    <div class="modal-body">
                    <div class="row">
                       
                   
            <p style="text-align: left;">&nbsp;</p>
            <p><span style="font-family: 'times new roman', times; font-size: 14pt;" name="tp_name"><strong>Test plan for: <?php echo  $tpl_name; ?></strong></span></p>
            <p><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Introduction: </strong><?php echo $tpl_introduction; ?></span></p>
            <p><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>People:&nbsp;</strong><?php echo $tpl_responsibilities; ?></span></p>
            <p><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Risks: </strong><?php echo $tpl_risk; ?></span></p>
            <p><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Test stratergy:</strong></span></p>
            <ul>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Test item:&nbsp;</strong><?php echo $tpl_test_item; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Features to be tested:</strong><?php echo $tpl_features_to_be_tested; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Features not to be tested:</strong> <?php echo $tpl_features_not_to_be_tested; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;" name="username" ><strong>Approach:</strong> <?php echo $tpl_approach; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Item pass/fail criteria:</strong> <?php echo $tpl_item_passfail_criteria; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Testing task:</strong> <?php echo $tpl_testing_task; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Test deliverables:</strong> <?php echo $tpl_test_deliverable; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Environmental needs:</strong> <?php echo $tpl_environmental_need; ?></span></li>
            <li><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Approvals:</strong> <?php echo $tpl_approval; ?></span></li>
            </ul>
            <p><span style="font-family: 'times new roman', times;font-size: 14pt;"><strong>Testing activities and estimates: </strong><?php echo $tpl_schedule; ?></span></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
  
    <?php

    $i++;

 }
 ?>
</tbody>  
</table>
</div> 
</div> 
</div>
</div>
</div>

 



</body>


<!--   Core JS Files   -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>