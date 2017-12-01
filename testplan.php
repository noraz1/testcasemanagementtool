<?php

session_start();
include_once 'conn.php';
// dapat project id
$id = $_GET['id'];
$studentid =$_SESSION['studentid'];

$result=mysqli_query($con,"SELECT * FROM student WHERE studentid=".$_SESSION['studentid']);
$fetched_row=mysqli_fetch_array($result);

// create test plan
if (isset ($_POST['submit'])) {
    
    $tp_name =$_POST['tp_name'];
    
  $query= "INSERT INTO testplan (projectid, tp_name ) VALUES ('$id','$tp_name') ";
  
  $result= mysqli_query($con,$query);
  
  if ($result)
    {
  ?>
<script type="text/javascript">
  alert ('Add test plan success!');
  
</script>
<?php
  }
  
  else
  {
  ?>
<script type="text/javascript">
  alert ('failed to add test plan. please try again!');
</script>
<?php
  }
  
  }

$result1 = mysqli_query ($con,"SELECT * FROM testplan WHERE projectid=$id");


 //update test plan
 if(isset($_POST['save'])){
    $tp_id = $_POST['tp_id'];
	$tp_name = $_POST['tp_name'];
    $tp_introduction = $_POST['tp_introduction'];
    $tp_test_item = $_POST['tp_test_item'];
    $tp_features_to_be_tested = $_POST['tp_features_to_be_tested'];
    $tp_features_not_to_be_tested = $_POST['tp_features_not_to_be_tested'];
    $tp_approach = $_POST['tp_approach'];
    $tp_item_passfail_criteria = $_POST['tp_item_passfail_criteria'];
    $tp_testing_task = $_POST['tp_testing_task'];
    $tp_test_deliverable = $_POST['tp_test_deliverable'];
    $tp_environmental_need = $_POST['tp_environmental_need'];
    $tp_responsibilities = $_POST['tp_responsibilities'];
    $tp_schedule = $_POST['tp_schedule'];
    $tp_risk = $_POST['tp_risk'];
    $tp_approval = $_POST['tp_approval'];
    
     //INSERT
   $res=mysqli_query($con,"UPDATE testplan SET tp_name='$tp_name',tp_introduction='$tp_introduction',tp_test_item='$tp_test_item',tp_features_to_be_tested='$tp_features_to_be_tested',tp_features_not_to_be_tested='$tp_features_not_to_be_tested',tp_approach='$tp_approach',
   tp_item_passfail_criteria='$tp_item_passfail_criteria',tp_testing_task='$tp_testing_task',tp_test_deliverable='$tp_test_deliverable',tp_environmental_need='$tp_environmental_need',
   tp_responsibilities='$tp_responsibilities',tp_schedule='$tp_schedule',tp_risk='$tp_risk',tp_approval='$tp_approval' WHERE tp_id=$tp_id");
   
   header("location:".$_SERVER['HTTP_REFERER']);
}

// delete data
if (isset($_GET['del'])) {
	$tp_id = $_GET['del'];
	mysqli_query($con, "DELETE FROM testplan WHERE tp_id=$tp_id");
    header("location:".$_SERVER['HTTP_REFERER']);
    exit();
}

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
                    <i class="pe-7s-graph"></i>
                    <p>All Project</p>
                </a>
            </li>


            <li>
                <a href="overview.php?id=<?php echo $id ?>">
                    <i class="pe-7s-note2"></i>
                    <p>Overview</p>
                </a>
            </li>
            <li class="active">
            <a href="testplan.php?id=<?php echo $id ?>">
                <i class="pe-7s-news-paper"></i>
                <p>Test Plan</p>
            </a>
        </li>
            <li>
                <a href="testsuite.php?id=<?php echo $id ?>">
                    <i class="pe-7s-science"></i>
                    <p>Test Suite</p>
                </a>
            </li>
            <li>
                <a href="testrun.php?id=<?php echo $id ?>">
                    <i class="pe-7s-map-marker"></i>
                    <p>Test Run</p>
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
     <div align="center" class="right">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Add Test Plan</button>
     </div>

        <div align="center" class="left">
        <h1>Test Plan List</h1>
        <p>A test plan can be used to record the overall testing strategy </p>
        <p>and is where you can outline the objectives and scope of testing.</p>
        </div>

    </div>
    
       

   
    
          
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
               
                    <div class="modal-header"><h4 class="modal-title">Add Test Plan</h4></div>

                    <div class="modal-body">
                    <div class="row">
                        <form method="post">
                            <div class="form-group ">
                                <label class="control-label requiredField" for="tp_name"> Test Plan Name <span class="asteriskField"> *</span> </label>
                                <input class="form-control" id="tp_name" name="tp_name" placeholder="Enter Project Name" type="text"/>
                            </div>
                                    <div class="form-group">
                                        <div>
                                            <button class="btn btn-primary " name="submit" type="submit"> Submit</button>
                                        </div>
                                    </div>
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
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
         <th>View/Edit/Delete</th>
   
    </tr>
</thread>  
<!-- body table -->
<tbody>
<?php
 $i =1;
 while ( $row= mysqli_fetch_array ($result1)) {
    $tp_id= $row['tp_id'];
    $tp_name= $row['tp_name'];
    $tp_introduction = $row['tp_introduction'];
    $tp_test_item = $row['tp_test_item'];
    $tp_features_to_be_tested = $row['tp_features_to_be_tested'];
    $tp_features_not_to_be_tested = $row['tp_features_not_to_be_tested'];
    $tp_approach = $row['tp_approach'];
    $tp_item_passfail_criteria = $row['tp_item_passfail_criteria'];
    $tp_testing_task = $row['tp_testing_task'];
    $tp_test_deliverable = $row['tp_test_deliverable'];
    $tp_environmental_need = $row['tp_environmental_need'];
    $tp_responsibilities = $row['tp_responsibilities'];
    $tp_schedule = $row['tp_schedule'];
    $tp_risk = $row['tp_risk'];
    $tp_approval = $row['tp_approval'];
       
?>

    <tr>
    <td><?php echo $i; ?></td>
    <td> <?php echo $tp_name;?></td>
   
<!-- button view, update, delete -->
    <td class= 'text-center'>
    <a href="viewtestplan.php?id=<?php echo $tp_id; ?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a>
    <a href="#edit<?php echo $tp_id;?>"  data-toggle="modal" ><span class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
    <a href= "testplan.php?del=<?php echo $tp_id; ?>" ><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true' onclick="return confirm('Are you sure want to delete?')"></span></button></a>
    </td>

     
    </tr>
 
  <!-- edit modal -->
<div id="edit<?php echo $tp_id;?>" class="w3-modal" data-backdrop="false">
<div class="w3-modal-content">
    <div class="w3-container">
      <span type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
   
        <div class="modal-header"><h4 class="modal-title">Edit Project</h4></div>

        <div class="modal-body">
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-10 col-sm-10 col-xs-12">
    <form method="post">
     <div class="form-group ">
     <input type="hidden" name="tp_id" value="<?php echo $tp_id; ?>">
      <label class="control-label requiredField" for="tp_name">Test Plan Name<span class="asteriskField"> *</span>
      </label>
      <input class="form-control" id="tp_name" name="tp_name" value="<?php echo $tp_name; ?>" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label " for="tp_introduction">Introduction </label>
      <textarea class="form-control" cols="40"  id="tp_introduction" name="tp_introduction" rows="7"><?php echo $tp_introduction; ?></textarea>
      <span class="help-block"  id="hint_tp_introduction">
       Provide an overview of the plan, in terms of what the particular project encompasses. You may briefly mention items such as limitations in resources and budgets, scope of testing and how other activities such as reviews are related. This is just a summary, so keep things short.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_test_item">
       Test items
      </label>
      <textarea class="form-control" cols="40" id="tp_test_item" name="tp_test_item" rows="7"><?php echo $tp_test_item; ?></textarea>
      <span class="help-block" id="hint_tp_test_item">
       List the items that will be tested. This could be a software product, system or website.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="message2">
       Features to be tested
      </label>
      <textarea class="form-control" cols="40" id="tp_features_to_be_tested" name="tp_features_to_be_tested" rows="7"><?php echo $tp_features_to_be_tested; ?></textarea>
      <span class="help-block" id="hint_message2">
       List the features that will be tested and are within the scope of this test plan.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="message3">
       Features not to be tested
      </label>
      <textarea class="form-control" cols="40" id="tp_features_not_to_be_tested" name="tp_features_not_to_be_tested" rows="7"><?php echo $tp_features_not_to_be_tested; ?></textarea>
      <span class="help-block" id="hint_message3">
       List the features / requirements that will not be tested and are outside of the scope of this test plan.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_approach">
       Approach
      </label>
      <textarea class="form-control" cols="40" id="tp_approach" name="tp_approach" rows="7"><?php echo $tp_approach; ?></textarea>
      <span class="help-block" id="hint_tp_approach">
       Outline the overall test strategy for this plan, identifying the test process and rules that will be followed. You may also want to include any information about tools, software, or hardware that will be used.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_item_passfail_criteria">
       Item pass/fail criteria
      </label>
      <textarea class="form-control" cols="40" id="tp_item_passfail_criteria" name="tp_item_passfail_criteria" rows="7"><?php echo $tp_item_passfail_criteria; ?></textarea>
      <span class="help-block" id="hint_tp_item_passfail_criteria">
       State the acceptable pass / fail criteria. This can be general criteria or at the individual test case level.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_testing_task">
       Testing tasks
      </label>
      <textarea class="form-control" cols="40" id="tp_testing_task" name="tp_testing_task" rows="7"><?php echo $tp_testing_task; ?></textarea>
      <span class="help-block" id="hint_tp_testing_task">
       Outline what functional tasks are required with exception to the actual testing. You may want to consider equipment setup along with any administrative tasks.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_test_deliverable">
       Test deliverables
      </label>
      <textarea class="form-control" cols="40" id="tp_test_deliverable" name="tp_test_deliverable" rows="7"><?php echo $tp_test_deliverable; ?></textarea>
      <span class="help-block" id="hint_tp_test_deliverable">
       Identify what should be delivered as part of this plan. You may want to include items such as test plan documents, test cases, tools and any outputs.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_environmental_need">
       Environmental needs
      </label>
      <textarea class="form-control" cols="40" id="tp_environmental_need" name="tp_environmental_need" rows="7" ><?php echo $tp_environmental_need; ?></textarea>
      <span class="help-block" id="hint_tp_environmental_need">
       Are there any special requirements for these tests. You may want to consider things like special hardware, test data or restriction to any system during testing.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_responsibilities">
       Responsibilities
      </label>
      <textarea class="form-control" cols="40" id="tp_responsibilities" name="tp_responsibilities" rows="7"><?php echo $tp_responsibilities; ?></textarea>
      <span class="help-block" id="hint_tp_responsibilities">
       Provide details of who has the responsibility of delivering different parts of the test plan.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_schedule">
       Schedule
      </label>
      <textarea class="form-control" cols="40" id="tp_schedule" name="tp_risk" rows="7"><?php echo $tp_risk; ?></textarea>
      <span class="help-block" id="hint_tp_schedule">
       Provide a realistic estimate to the time required.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_risk">
       Risks and contingencies
      </label>
      <textarea class="form-control" cols="40" id="tp_risk" name="tp_risk" rows="7"><?php echo $tp_risk; ?></textarea>
      <span class="help-block" id="hint_tp_risk">
       Identify any know areas that are high risk and may cause delays.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tp_approval">
       Approvals
      </label>
      <textarea class="form-control" cols="40" id="tp_approval" name="tp_approval" rows="7"><?php echo $tp_approval; ?></textarea>
      <span class="help-block" id="hint_tp_risk">
      Identify who can approve the completion.
      </span>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="save" onclick="return confirm('Are you sure?')"  type="submit">
        Save
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

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