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
  
    $tc_title =$_POST['tc_title'];
    $tc_desc =$_POST['tc_desc'];
    $tc_test_step =$_POST['tc_test_step'];
    $tc_level =$_POST['tc_level'];
    $tc_risk =$_POST['tc_risk'];
    $tc_level_risk =$_POST['tc_level_risk'];
    $tc_expected_result =$_POST['tc_expected_result'];
    
  $query= "INSERT INTO testcase (ts_id, tc_title, tc_desc,tc_test_step,tc_level,tc_risk,tc_level_risk,tc_expected_result) 
  VALUES ('$id','$tc_title',' $tc_desc',' $tc_test_step',' $tc_level',' $tc_risk',' $tc_level_risk',' $tc_expected_result') ";
  
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

$result1 = mysqli_query ($con,"SELECT * FROM testcase WHERE ts_id=$id");


 //update test plan
 if(isset($_POST['save'])){
    $tc_id = $_POST['tc_id'];
    $tc_title =$_POST['tc_title'];
    $tc_desc =$_POST['tc_desc'];
    $tc_test_step =$_POST['tc_test_step'];
    $tc_level =$_POST['tc_level'];
    $tc_risk =$_POST['tc_risk'];
    $tc_level_risk =$_POST['tc_level_risk'];
    $tc_expected_result =$_POST['tc_expected_result'];
    
     //INSERT
   $res=mysqli_query($con,"UPDATE testcase SET tc_title='$tc_title',tc_desc='$tc_desc',tc_test_step='$tc_test_step',
   tc_level='$tc_level',tc_risk='$tc_risk',tc_level_risk='$tc_level_risk',
   tc_expected_result='$tc_expected_result' WHERE tc_id=$tc_id");
   
   header("location:".$_SERVER['HTTP_REFERER']);
}

// delete data
if (isset($_GET['del'])) {
	$tc_id = $_GET['del'];
	mysqli_query($con, "DELETE FROM testcase WHERE tc_id=$tc_id");
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
            <li >
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
            <li class="active">
                <a href="testcase.php?id=<?php echo $id ?>">
                    <i class="pe-7s-map-marker"></i>
                    <p>Test case</p>
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
    <div class="card">
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
     <div class="form-group ">
      <label class="control-label " for="tc_level">
       Test case level
      </label>
      <select class="select form-control" id="tc_level" name="tc_level">
       <option value="High">
        High
       </option>
       <option value="Medium">
        Medium
       </option>
       <option value="Low">
        Low
       </option>
      </select>
      <span class="help-block" id="hint_tc_level">
       The priority level of test case.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_risk">
       Risk
      </label>
      <textarea class="form-control" cols="40" id="tc_risk" name="tc_risk" rows="10"></textarea>
      <span class="help-block" id="hint_tc_risk">
       Expected risk that will occur.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_level_risk">
       Level of risk
      </label>
      <select class="select form-control" id="tc_level_risk" name="tc_level_risk">
       <option value="High">
        High
       </option>
       <option value="Moderate">
        Moderate
       </option>
       <option value="Low">
        Low
       </option>
      </select>
     </div>
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
    $tc_id = $row['tc_id'];
    $tc_title =$row['tc_title'];
    $tc_desc =$row['tc_desc'];
    $tc_test_step =$row['tc_test_step'];
    $tc_level =$row['tc_level'];
    $tc_risk =$row['tc_risk'];
    $tc_level_risk =$row['tc_level_risk'];
    $tc_expected_result =$row['tc_expected_result'];
       
?>

    <tr>
    <td><?php echo $i; ?></td>
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
      <textarea class="form-control" cols="40" id="tc_desc" name="tc_desc" rows="10" ><?php echo $tc_title; ?></textarea>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_test_step">
       Test steps
      </label>
      <textarea class="form-control" cols="40" id="tc_test_step" name="tc_test_step" rows="10" ><?php echo $tc_title; ?></textarea>
      <span class="help-block" id="hint_tc_test_step">
       A list of steps to perform along with any sample data.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_level">
       Test case level
      </label>
      <select class="select form-control" id="tc_level" name="tc_level">
       <option value="High">
        High
       </option>
       <option value="Medium">
        Medium
       </option>
       <option value="Low">
        Low
       </option>
      </select>
      <span class="help-block" id="hint_tc_level">
       The priority level of test case.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_risk">
       Risk
      </label>
      <textarea class="form-control" cols="40" id="tc_risk" name="tc_risk" rows="10"><?php echo $tc_risk; ?></textarea>
      <span class="help-block" id="hint_tc_risk">
       Expected risk that will occur.
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label " for="tc_level_risk">
       Level of risk
      </label>
      <select class="select form-control" id="tc_level_risk" name="tc_level_risk">
       <option value="High">
        High
       </option>
       <option value="Moderate">
        Moderate
       </option>
       <option value="Low">
        Low
       </option>
      </select>
     </div>
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