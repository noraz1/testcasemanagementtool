<?php

session_start();
include_once 'conn.php';
// dapat project id
$id = $_GET['id'];
$ts_id = $_GET['tsid'];
$studentid =$_SESSION['studentid'];

$result=mysqli_query($con,"SELECT * FROM student WHERE studentid=".$_SESSION['studentid']);
$fetched_row=mysqli_fetch_array($result);

// create test plan
if (isset ($_POST['submit'])) {
  
    $tc_title =$_POST['tc_title'];
    $tc_desc =$_POST['tc_desc'];
    $tc_test_step =$_POST['tc_test_step'];
    $tc_level =$_POST['tc_level'];
    $tc_risk =$_POST['tc_risk'];
    $tc_level_risk =$_POST['tc_level_risk'];
    $tc_expected_result =$_POST['tc_expected_result'];
    
  $query= "INSERT INTO testcase (ts_id, tc_title, tc_desc,tc_test_step,tc_level,tc_risk,tc_level_risk,tc_expected_result) 
  VALUES ('$ts_id','$tc_title',' $tc_desc',' $tc_test_step',' $tc_level',' $tc_risk',' $tc_level_risk',' $tc_expected_result') ";
  
  $result= mysqli_query($con,$query);
  
  if ($result)
    {
  ?>
<script type="text/javascript">
  alert ('Add test case success!');
  
</script>
<?php
  }
  
  else
  {
  ?>
<script type="text/javascript">
  alert ('failed to add test case. please try again!');
</script>
<?php
  }
  
  }

$result1 = mysqli_query ($con,"SELECT * FROM testcase WHERE ts_id=$ts_id");
//$fetched_row1=mysqli_fetch_array($result1);



// delete data
if (isset($_GET['del'])) {
	$tc_id = $_GET['del'];
	mysqli_query($con, "DELETE FROM testcase WHERE tc_id=$tc_id");
    header("location:".$_SERVER['HTTP_REFERER']);
    exit();
}

 //update test case
 if(isset($_POST['save'])){
    $tc_id = $_POST['tc_id'];
    $tc_title =$_POST['tc_title'];
    $tc_desc =$_POST['tc_desc'];
    $tc_precondition =$_POST['tc_precondition'];
    $tc_input =$_POST['tc_input'];    
    $tc_test_step =$_POST['tc_test_step'];
    $tc_level =$_POST['tc_level'];
    $tc_risk =$_POST['tc_risk'];
    $tc_level_risk =$_POST['tc_level_risk'];
    $tc_expected_result =$_POST['tc_expected_result'];
    
     //INSERT
   $res=mysqli_query($con,"UPDATE testcase SET tc_title='$tc_title',tc_desc='$tc_desc',tc_precondition='$tc_precondition',tc_input='$tc_input',tc_test_step='$tc_test_step',
   tc_level='$tc_level',tc_risk='$tc_risk',tc_level_risk='$tc_level_risk',
   tc_expected_result='$tc_expected_result' WHERE tc_id=$tc_id");
   
   header("location:".$_SERVER['HTTP_REFERER']);
}




?>

<style>
#parent {
    overflow: hidden;
    
}
.right {
    float: right;
    margin-right: 50px;
    height: 50px;
    margin-top: 20px;
   
}
.left {
    
    padding: 10px;
    float: left;
    overflow: hidden;
    height: 70px;
    
    
   
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
                <a class="navbar-brand" href="#">Test Case</a>
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
    <div >
        <div class="col-md-11">
            <div class="panel-heading">
            <div class="w3-container">
       
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div id="parent">
     <div align="center" class="right">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Add Test Case</button>
     </div>

        <div align="center" class="left">
        <h1>Test Case List</h1>
        </div>

    </div>
    
       

   
    
          
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
               
                    <div class="modal-header"><h4 class="modal-title">Add Test Case</h4></div>

                    <div class="modal-body">
                   <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post">
     <div class="form-group ">
      <label class="control-label requiredField" for="tc_title">
       Title
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="tc_title" name="tc_title" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_desc">
       Description
      </label>
      <textarea class="form-control" cols="40" id="tc_desc" name="tc_desc" rows="10"></textarea>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_test_step">
       Test steps
      </label>
      <textarea class="form-control" cols="40" id="tc_test_step" name="tc_test_step" rows="10"></textarea>
      <span class="help-block" id="hint_tc_test_step">
       A list of steps to perform along with any sample data.
      </span>
     </div>

     <!-- radio button -->
     <label class="control-label" for="tc_level">Test Case Level: </label>
     <div class="form-group ">
    <input name="tc_level" type="radio" id="tc_level" value="High" checked>
    <label for="tc_level">High</label>
</div>

<div class="form-group">
    <input name="tc_level" type="radio" id="tc_level" value="Medium">
    <label for="tc_risk">Medium</label>
</div>

<div class="form-group">
    <input name="tc_level" type="radio" id="tc_level" value="Low">
    <label for="tc_level">Low</label>
    <span class="help-block" id="tc_risk">
       The priority level of test case.
      </span>
</div>

<!--Radio group-->

     <div class="form-group ">
      <label class="control-label " for="tc_risk">
       Risk
      </label>
      <textarea class="form-control" cols="40" id="tc_risk" name="tc_risk" rows="10"></textarea>
      <span class="help-block" id="tc_risk">
       Expected risk that will occur.
      </span>
     </div>

   <!-- radio button -->
   <label class="control-label" for="tc_level_risk">Level of risk: </label>
     <div class="form-group ">
    <input name="tc_level_risk" type="radio" id="tc_level_risk" value="High" checked>
    <label for="tc_level_risk">High</label>
</div>

<div class="form-group">
    <input name="tc_level_risk" type="radio" id="tc_level_risk" value="Medium">
    <label for="tc_level_risk">Medium</label>
</div>

<div class="form-group">
    <input name="tc_level_risk" type="radio" id="tc_level_risk" value="Low">
    <label for="tc_level_risk">Low</label>

</div>

<!--Radio group-->

     <div class="form-group ">
      <label class="control-label " for="tc_expected_result">
       Expected result
      </label>
      <textarea class="form-control" cols="40" id="tc_expected_result" name="tc_expected_result" rows="10"></textarea>
      <span class="help-block" id="hint_tc_expected_result">
       Details of what the final result should be.
      </span>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
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
        <th>Test Case</th>
        <th>Test Case Name</th>
         <th>Edit/Delete</th>
   
    </tr>
</thread>  
<!-- body table -->
<tbody>
<?php
 $i =1;
 while ( $row= mysqli_fetch_array ($result1)) {
    $tc_id = $row['tc_id'];
    $tc_title =$row['tc_title'];
    $tc_desc =$row['tc_desc'];
    $tc_precondition =$row['tc_precondition'];
    $tc_input =$row['tc_input'];
    $tc_test_step =$row['tc_test_step'];
    $tc_level =$row['tc_level'];
    $tc_risk =$row['tc_risk'];
    $tc_level_risk =$row['tc_level_risk'];
    $tc_expected_result =$row['tc_expected_result'];

    // test case level
$High="";
$Medium="";
$Low="";
if ($row['tc_level']=='High') {
    $High = "checked";

}elseif ($row['tc_level']=='Medium') {
    $Medium = "checked";

}elseif ($row['tc_level']=='Low') {
    $Low = "checked";
}
 
// risk level
$RHigh="";
$RMedium="";
$RLow="";
if ($row['tc_level_risk']=='High') {
    $RHigh = "checked";

}elseif ($row['tc_level_risk']=='Medium') {
    $RMedium = "checked";

}elseif ($row['tc_level_risk']=='Low') {
    $RLow = "checked";
}
       
?>

    <tr>
    <td><?php echo"TC".$i; ?></td>
    <td> <?php echo $tc_title;?></td>
   
<!-- button view, update, delete -->
    <td class= 'text-center'>
    
    <a href="#edit<?php echo $tc_id;?>"  data-toggle="modal" ><span class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
    <a href= "testcase.php?del=<?php echo $tc_id; ?>" ><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true' onclick="return confirm('Are you sure want to delete?')"></span></button></a>
    </td>

     
    </tr>
 
  <!-- edit modal -->
<div id="edit<?php echo $tc_id;?>" class="w3-modal" data-backdrop="false">
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
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post">
     <div class="form-group ">
     <input type="hidden" name="tc_id" value="<?php echo $tc_id; ?>">
      <label class="control-label requiredField" for="tc_title">
       Title
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="tc_title" name="tc_title" type="text" value="<?php echo $tc_title; ?>"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_desc">
       Description
      </label>
      <textarea class="form-control" cols="40" id="tc_desc" name="tc_desc" rows="10" ><?php echo $tc_desc; ?></textarea>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_precondition">
       Pre-Condition
      </label>
      <textarea class="form-control" cols="40" id="tc_precondition" name="tc_precondition" rows="10" ><?php echo $tc_precondition; ?></textarea>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_input">
       Input
      </label>
      <textarea class="form-control" cols="40" id="tc_input" name="tc_input" rows="10" ><?php echo $tc_input; ?></textarea>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_test_step">
       Test steps
      </label>
      <textarea class="form-control" cols="40" id="tc_test_step" name="tc_test_step" rows="10" ><?php echo $tc_test_step; ?></textarea>
      <span class="help-block" id="hint_tc_test_step">
       A list of steps to perform along with any sample data.
      </span>
     </div>
    <!-- radio button -->
    <label class="control-label" for="tc_level">Test Case Level: </label>
    <div class="form-group ">
   <input name="tc_level" type="radio" id="tc_level" value="High" <?php echo $High; ?>>
   <label for="tc_level">High</label>
</div>

<div class="form-group">
   <input name="tc_level" type="radio" id="tc_level" value="Medium" <?php echo $Medium; ?>>
   <label for="tc_risk">Medium</label>
</div>

<div class="form-group">
   <input name="tc_level" type="radio" id="tc_level" value="Low" <?php echo $Low; ?>>
   <label for="tc_level">Low</label>
   <span class="help-block" id="tc_risk">
      The priority level of test case.
     </span>
</div>

<!--Radio group-->
     <div class="form-group ">
      <label class="control-label " for="tc_risk">
       Risk
      </label>
      <textarea class="form-control" cols="40" id="tc_risk" name="tc_risk" rows="10"><?php echo $tc_risk; ?></textarea>
      <span class="help-block" id="hint_tc_risk">
       Expected risk that will occur.
      </span>
     </div>
    <!-- radio button -->
   <label class="control-label" for="tc_level_risk">Level of risk: </label>
   <div class="form-group ">
  <input name="tc_level_risk" type="radio" id="tc_level_risk" value="High"  <?php echo $RHigh; ?>>
  <label for="tc_level_risk">High</label>
</div>

<div class="form-group">
  <input name="tc_level_risk" type="radio" id="tc_level_risk" value="Medium" <?php echo $RMedium; ?>>
  <label for="tc_level_risk">Medium</label>
</div>

<div class="form-group">
  <input name="tc_level_risk" type="radio" id="tc_level_risk" value="Low" <?php echo $RLow; ?>>
  <label for="tc_level_risk">Low</label>

</div>

<!--Radio group-->
     <div class="form-group ">
      <label class="control-label " for="tc_expected_result">
       Expected result
      </label>
      <textarea class="form-control" cols="40" id="tc_expected_result" name="tc_expected_result" rows="10"><?php echo $tc_expected_result; ?></textarea>
      <span class="help-block" id="hint_tc_expected_result">
       Details of what the final result should be.
      </span>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="save" type="submit">
        Submit
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
<a style="position: relative; left: 78%;" href="testcasereport.php?id=<?php echo $id ?>&tsid=<?php echo $ts_id; ?>" class="w3-button w3-blue">View Report</a>
</div> 
</div>

</div>

 



</body>


<!--   Core JS Files   -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>