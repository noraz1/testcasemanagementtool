<?php
session_start();
include_once 'conn.php';
// check ade value post tak


$classgroup = isset($_POST['classgroup']) ? $_POST['classgroup'] : false;
if (($classgroup == '')) {
  // echo htmlentities($_POST['classgroup'], ENT_QUOTES, "UTF-8");
  $classgroup = 0;
  
} else {
   
  
}

$result3=mysqli_query($con,"SELECT * FROM lecturer WHERE lect_id=".$_SESSION['lect_id']);
$fetched_row=mysqli_fetch_array($result3);
?>




<style>
#parent {
    overflow: hidden;
    
}
.right {
    float: right;
    margin-right: 50px;
    height: 40px;
    margin-top: 20px;
   
}
.left {
    
    padding: 10px;
    float: left;
    
    overflow: hidden;
    height: 60px;
    
    
   
}

</style>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

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

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


      <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                    TEST CASE MANAGEMENT TOOL
                </a>
                </div>


            <ul class="nav">
                <li class="active">
                    <a href="lectdashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
<!--
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>

                <li>
                    <a href="devicelist.html">
                        <i class="pe-7s-note2"></i>
                        <p>Device List</p>
                    </a>
                </li>
                <li class="active">
                    <a href="inventorylist.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Inventory List</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>

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
                                <a href="#">
                               <?php 
                               echo "welcome    ".$fetched_row['lect_username']."!";
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
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<!-- header -->
<div id="parent">
     <div align="center" class="right">
     <!-- dropdown menu -->
     <form method="post" >
     <select name="classgroup">
     <option value="0">Choose Class Group</option>
       <option value="1">Group 1</option>
       <option value="2">Group 2</option>
       <option value="3">Group 3</option>
       <option value="4">Group 4</option>
       <option value="5">Group 5</option>
     </select>
     <input type="submit" class="w3-button w3-blue"   value="Submit"/>
   </form>
     <!-- <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Select group</button> -->
     </div>

        <div align="center" class="left">
        <h1>Test Plan List</h1>
        </div>

    </div>
            
</body>
</html>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        
                                        <th>Number</th>
                                        <th>Class Group</th>
                                        <th>Matric Number</th>
                                        <th>Test Plan</th>
                                        <th>Mark</th>
                                        <th>Check</th>
                                        
                                    <tbody>

                                    <?php

                                    if (($classgroup !== 0)) {
                                        $result = mysqli_query ($con,"SELECT * FROM tp_lecturer WHERE classgroup=$classgroup");
                                        $i =1;
                                        while ( $row= mysqli_fetch_array ($result)) {
                                            $tpl_id= $row['tpl_id'];
                                            $classgroup= $row['classgroup'];
                                            $matricnum= $row['matricnum'];
                                            $tpl_name = $row['tpl_name'];
                                            
                                            $result2 = mysqli_query ($con,"SELECT * FROM feedback WHERE tp_id=$tpl_id");
                                            while ( $row2= mysqli_fetch_array ($result2)) {
                                                $mark= $row2['mark'];
                                           
                                            ?>
                                         <tr>
                                        <td><?php echo $i; ?></td>
                                        <td> <?php echo $classgroup;?></td>
                                        <td> <?php echo $matricnum;?></td>
                                        
                                        <td><a href="lectviewtestplan.php?id=<?php echo $tpl_id ?>"><?php echo $tpl_name;?></a></td>
                                        <td> <?php echo $mark;?></td>
                                       
                                        <td>  <button id="toggle" onclick="myFunction()">Unchecked yet!</button></td>
                                    <?php
                                              }
                                        }

                                     } else {
                                        echo '<span style="color:#FF0000;text-align:center;">Class group is required!</span>';
                                       
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

<!-- script for button change onclick -->
        <script>

            function myFunction() {
                var change = document.getElementById("toggle");
                if (change.innerHTML == "Unchecked yet!")
                {
                    change.innerHTML = "Checked!";
                }
                else {
                    change.innerHTML = "Unchecked yet!";
                }
            }

        </script>
<!-- end script for button change onclick -->

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>


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

</html>