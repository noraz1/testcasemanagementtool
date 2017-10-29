
<?php
include_once 'conn.php';

// check ade value post tak
if (isset ($_POST['submit'])) {
  // declare variable untuk store data dari input
  
  $projectname =$_POST['projectname'];
  $projectdesc =$_POST['projectdesc'];

$query= "INSERT INTO project (projectname, projectdesc ) VALUES ('$projectname', '$projectdesc') ";

$result- mysql_query($query);

if ($result)
  {
?>
<script type="text/javascript">
alert ('register success!');

</script>
<?php
}

else
{
?>

<script type="text/javascript">
alert ('failed to register. please try again!');
</script>

<?php
}

}
?>

<?php 
 
   $result1=mysql_query("SELECT * FROM project ");
   $fetched_row=mysql_fetch_array($result1);
?>

<?php
   if (isset($_POST["delete"])){
  
       $sql= ("DELETE FROM project WHERE projectname = '$projectname' AND projectdesc = '$projectdesc' ");
     $res = mysql_query($sql);


if ($row['projectname']=$projectname && $row['projectdesc']=$projectdesc){

     echo"your project has been deleted";
     } ELSE {
      ?>
  <script type="text/javascript">
  alert("Your project cannot be deleted");
  </script>
  <?php
    } 
      
}
 ?>


<!doctype html>
<html lang="en">

<style type="text/css">
    

    #btnproject {  
    margin-left: 20px;
    margin-top: 1px;

    width: 120px;
    height: 35px;     
    font-size:14px;
    font-weight:700;
}



}
</style>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/hilti.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Test Case Management Tool</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/user.css" rel="stylesheet" />



    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="assets/img/st.jpg">

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

<!--
                    <li>
                        <a href="user.html">
                            <i class="pe-7s-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
-->

                    <li>
                        <a href="index.php">
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
                    </li>
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
                        
                            <!--<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="notifications.html">Notification 1</a></li>
                                    <li><a href="notifications.html">Notification 2</a></li>
                                    <li><a href="notifications.html">Notification 3</a></li>
                                    <li><a href="notifications.html">Notification 4</a></li>
                                    <li><a href="notifications.html">Another notification</a></li>
                                </ul>
                            </li> -->
                          <!--  <li>
                                <a href="">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li> -->
                        </ul> 

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="user.php">
                               Account
                            </a>
                            </li>
                           <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="login.php">
                                Log out
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


          

                                <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Project List</h4>
                                <p class="category">List of all project </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <div class="w3-container">
                                        <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">Add Project</button>

                                            <div id="id01" class="w3-modal">
                                                  <div class="w3-modal-content">
                                                          <div class="w3-container">
                                                                 <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
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
        <legend>Add New Project</legend>
      <label class="control-label requiredField" for="projectname">
       Project Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="projectname" name="projectname" placeholder="Enter Project Name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="projectdesc">
       Project Description
      </label>
      <textarea class="form-control" cols="40" rows="10" id="projectdesc" name="projectdesc" type="text"> </textarea> 
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

                                    <thead>
                                        
                                       <th>Number</th>
                                        <th>Project Name</th>
                                      <th>Project Description</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i =1;
                                        while (  $fetched_row=mysql_fetch_array($result1)) {
                                            
                                            ?>
                                              <tr>
                                           
                                       <td><?php echo $i; ?></td>
                                            <td><?php echo $fetched_row['projectname']; ?></td>
                                            <td><?php echo $fetched_row['projectdesc']; ?></td>
                                          <td>  <button id="delete" name="delete" class="btn btn-danger">Delete</button></td>
                                        </tr>
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
        </div>

                                    
-->


                                </div>
                            </div>
                        </div>


                  


         

  


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        demo.initChartist();
    });
</script>

°</html>