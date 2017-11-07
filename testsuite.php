<!doctype html>
<html lang="en">
<head>
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
        <div class="sidebar"  data-color="blue" data-image="assets/img/st.jpg">

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
                       <?php 
                       echo  $_SESSION['matricnum'];
                       ?>
                    </a>
                            </li>
                         
                            <li>
                            <a onclick="return confirm('Are you sure want to logout?')"  href="logout.php">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">

                    <!-- row 1-->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Test Status Graph</h4>
                                </div>
                                <div class="content">
                                    <h1>21°C</h1>

                                    <hr>
                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-success"></i> Test Case Graph

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Test Case Graph</h4>
                                </div>
                                <div class="content">
                                    <h1>65%</h1>

                                    <hr>
                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-success"></i> Health

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                               <h4 class="title">Bug Graph</h4>
                                </div>
                                <div class="content">
                                <img class="img-responsive" src="assets/img/temperature.gif" width="300" style="margin-top:10px;margin-bottom:45px;" />
                                </div>
                                </div>
                                </div>
                                </div>


                                <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Inventory List</h4>
                                <p class="category">List of all items purchased from Hilti</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th></th>
                                        <th>number</th>
                                     
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <img class="img-responsive" src="assets/img/tools/Drill.png" width="25"/></td>
                                            <td>HC0211</td>
                                            <td>Hilti Te boo-AVR</td>
                                            <td>Drill</td>
                                            <td>5.7 lb</td>
                                            <td>Yes</td>
                                            <td>03-June-2017</td>
                                            <td>6 Months</td>
                                            <td>3 Years</td>
                                            <td>03-June-2020</td>
                                        </tr>
                                        <tr>
                                            <td> <img class="img-responsive" src="assets/img/tools/Drill.png" width="25"/></td>
                                            <td>HC0211</td>
                                            <td>Hilti Te boo-AVR</td>
                                            <td>Drill</td>
                                            <td>5.7 lb</td>
                                            <td>Yes</td>
                                            <td>03-June-2017</td>
                                            <td>6 Months</td>
                                            <td>3 Years</td>
                                            <td>03-June-2020</td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Staff ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mohd Mazlan</td>
                                                    <td>177132</td>
                                                </tr>
                                                <tr>
                                                    <td>Muaz Toshihiko</td>
                                                    <td>124233</td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
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