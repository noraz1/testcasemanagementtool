<?php

session_start();
include_once 'conn.php';
// check ade value post tak
$matricnum =$_SESSION['matricnum'];
if (isset ($_POST['submit'])) {
    // declare variable untuk store data dari input
    
    $projectname =$_POST['projectname'];
    $projectdesc =$_POST['projectdesc'];
  
  $query= "INSERT INTO project (matricnum, projectname, projectdesc ) VALUES ('$matricnum','$projectname', '$projectdesc') ";
  
  $result= mysqli_query($con,$query);
  
  if ($result)
    {
  ?>
<script type="text/javascript">
  alert ('Add project success!');
  
</script>
<?php
  }
  
  else
  {
  ?>
<script type="text/javascript">
  alert ('failed to add project. please try again!');
</script>
<?php
  }
  
  }

$result1 = mysqli_query ($con,"SELECT * FROM project WHERE matricnum=".$_SESSION['matricnum']);


 //Update Items
 if(isset($_POST['update'])){
    $projectid = $_POST['projectid'];
	$projectname = $_POST['projectname'];
    $projectdesc = $_POST['projectdesc'];
    
     //INSERT
   $res=mysqli_query($con,"UPDATE project SET projectname='$projectname', projectdesc='$projectdesc'  WHERE projectid=$projectid");
   header('Location: dashboard.php');
}

// delete data
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM project WHERE projectid=$id");
	header('location: dashboard.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/hilti.png">
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
            <li class="active">
                <a href="dashboard.php">
                    <i class="pe-7s-graph"></i>
                    <p>All Project</p>
                </a>
            </li>


            <!-- <li>
                <a href="overview.php">
                    <i class="pe-7s-note2"></i>
                    <p>Overview</p>
                </a>
            </li>
            <li>
            <a href="testplan.php">
                <i class="pe-7s-news-paper"></i>
                <p>Test Plan</p>
            </a>
        </li>
            <li>
                <a href="testsuite.php">
                    <i class="pe-7s-science"></i>
                    <p>Test Suite</p>
                </a>
            </li>
            <li>
                <a href="testrun.php">
                    <i class="pe-7s-map-marker"></i>
                    <p>Test Run</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="pe-7s-bell"></i>
                    <p>Notifications</p>
                </a>
            </li> -->
<!--
            <li class="active-pro">
                <a href="upgrade.html">
                    <i class="pe-7s-rocket"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
-->
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
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                
                 
                </ul> 

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="viewprofile.php">
                       <?php 
                       echo  $_SESSION['matricnum'];
                       ?>
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
    <h2>Project List</h2>
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Add Project</button>
          
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
               
                    <div class="modal-header"><h4 class="modal-title">Add Project</h4></div>

                    <div class="modal-body">
                    <div class="row">
                        <form method="post">
                            <div class="form-group ">
                                <label class="control-label requiredField" for="projectname"> Project Name <span class="asteriskField"> *</span> </label>
                                <input class="form-control" id="projectname" name="projectname" placeholder="Enter Project Name" type="text"/>
                            </div>
                                <div class="form-group ">
                                    <label class="control-label " for="projectdesc"> Project Description</label>
                                        <textarea class="form-control" cols="40" rows="10" id="projectdesc" name="projectdesc" type="text"> </textarea> 
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
        <th>Project Name</th>
         <th>Description</th>
         <th>Edit/Delete</th>
   
    </tr>
</thread>  
<!-- body table -->
<tbody>
<?php
 $i =1;
 while ( $row= mysqli_fetch_array ($result1)) {
       $projectid= $row['projectid'];
         $projectname= $row['projectname'];
          $projectdesc= $row['projectdesc'];

?>

    <tr>
    <td><?php echo $i; ?></td>
    <td><a href="overview.php?id=<?php echo $projectid ?>"><?php echo $projectname; ?></a></td>
    <td><?php echo $projectdesc; ?></td>
    <td class= 'text-center'><a href="#edit<?php echo $projectid;?>"  data-toggle="modal" ><span class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
     <a href= "dashboard.php?del=<?php echo $row['projectid']; ?>" ><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true' onclick="return confirm('Are you sure want to delete?')"></span></button></a></td>

     
    </tr>
 
  <!-- edit modal -->
<div id="edit<?php echo $projectid;?>" class="w3-modal" data-backdrop="false">
<div class="w3-modal-content">
    <div class="w3-container">
      <span type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
   
        <div class="modal-header"><h4 class="modal-title">Edit Project</h4></div>

        <div class="modal-body">
        <div class="row">
            <form method="post">
                <div class="form-group ">
                 <!-- newly added field -->
                    <input type="hidden" name="projectid" value="<?php echo $projectid; ?>">
                    <label class="control-label requiredField" for="projectname"> Project Name <span class="asteriskField"> *</span> </label>
                    <input class="form-control" id="projectname" name="projectname" value="<?php echo $projectname; ?>"  type="text"/>
                </div>
                    <div class="form-group ">
                        <label class="control-label " for="projectdesc"> Project Description</label>
                            <textarea class="form-control" cols="40" rows="10" id="projectdesc"  name="projectdesc" type="text"> <?php echo $projectdesc; ?></textarea> 
                    </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="update" type="submit" onclick="return confirm('Are you sure?')" > Update</button>
                            </div>
                        </div>
            </form>
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