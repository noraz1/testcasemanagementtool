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
    
    $ts_name =$_POST['ts_name'];
    
  $query= "INSERT INTO testsuite (projectid, ts_name ) VALUES ('$id','$ts_name') ";
  
  $result= mysqli_query($con,$query);
  
  if ($result)
    {
  ?>
<script type="text/javascript">
  alert ('Add test suite success!');
  
</script>
<?php
  }
  
  else
  {
  ?>
<script type="text/javascript">
  alert ('failed to add test suite. please try again!');
</script>
<?php
  }
  
  }

$result1 = mysqli_query ($con,"SELECT * FROM testsuite WHERE projectid=$id");


 //update test plan
 if(isset($_POST['save'])){
    $ts_id = $_POST['ts_id'];
	$ts_name = $_POST['ts_name'];
   
    
     //INSERT
   $res=mysqli_query($con,"UPDATE testsuite SET ts_name='$ts_name' WHERE ts_id=$ts_id");
   
   header("location:".$_SERVER['HTTP_REFERER']);
}

// delete data
if (isset($_GET['del'])) {
	$ts_id = $_GET['del'];
	mysqli_query($con, "DELETE FROM testsuite WHERE ts_id=$ts_id");
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
    margin-top: 40px;
   
}
.left {
    
    padding: 10px;
    float: left;
    overflow: hidden;
    height: 100px;
    
    
   
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

  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
  
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
    <li class="active">
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
            <p>Test Plan Example</p>
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
                <a class="navbar-brand" href="#">Test Suite</a>
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
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Add Test Suite</button>
     </div>

        <div align="center" class="left">
        <h1>Test Suite List</h1>
        <P>A test suite contains a collection of test cases that can be written to verify a set of behaviours.</P>
        </div>

    </div>
    
       

   
    
          
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
               
                    <div class="modal-header"><h4 class="modal-title">Add Test Suite</h4></div>

                    <div class="modal-body">
                    <div class="row">
                        <form method="post">
                            <div class="form-group ">
                                <label class="control-label requiredField" for="ts_name"> <font color="black"> Test Suite Name <span class="asteriskField"> *</span> </label>
                                <input class="form-control" id="ts_name" name="ts_name" placeholder="Enter test suite name" type="text"/>
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
        <th>Test Suite Name</th>
         <th>Edit/Delete</th>
   
    </tr>
</thread>  
<!-- body table -->
<tbody>
<?php
 $i =1;
 while ( $row= mysqli_fetch_array ($result1)) {
    $projectid= $row['projectid'];
    $ts_id= $row['ts_id'];
    $ts_name= $row['ts_name'];
   
       
?>

    <tr>
    <td><?php echo $i; ?></td>
    <td> <a href="testcase.php?id=<?php echo $projectid ?>&tsid=<?php echo $ts_id ?>"><?php echo $ts_name;?></td>
   
<!-- button view, update, delete -->
    <td class= 'text-center'>
   
    <a href="#edit<?php echo $ts_id;?>"  data-toggle="modal" ><span class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
    <a href= "testsuite.php?del=<?php echo $ts_id; ?>" ><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true' onclick="return confirm('Are you sure want to delete?')"></span></button></a>
    </td>

     
    </tr>
 
  <!-- edit modal -->
<div id="edit<?php echo $ts_id;?>" class="w3-modal" data-backdrop="false">
<div class="w3-modal-content">
    <div class="w3-container">
      <span type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
   
        <div class="modal-header"><h4 class="modal-title">Edit Test Suite</h4></div>

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
     <input type="hidden" name="ts_id" value="<?php echo $ts_id; ?>">
      <label class="control-label requiredField" for="ts_name"><font color="black"> Test Suite Name<span class="asteriskField"> *</span>
      </label>
      <input class="form-control" id="ts_name" name="ts_name" value="<?php echo $ts_name; ?>" type="text"/>
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