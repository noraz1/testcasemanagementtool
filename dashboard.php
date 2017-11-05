<?php
include_once 'conn.php';
// check ade value post tak
if (isset ($_POST['submit'])) {
    // declare variable untuk store data dari input
    
    $projectname =$_POST['projectname'];
    $projectdesc =$_POST['projectdesc'];
  
  $query= "INSERT INTO project (projectname, projectdesc ) VALUES ('$projectname', '$projectdesc') ";
  
  $result= mysqli_query($con,$query);
  
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

$result = mysqli_query ($con,"SELECT * FROM project");

?>

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
        <div class="sidebar" data-color="blue" data-image="assets/img/st.jpg">


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
                                <a href="user.php">
                               Account
                            </a>
                            </li>
                         
                            <li>
                                <a href="login.php">
                                Log out
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

<!-- head table -->
<div class="container" style="margin-top:50px;margin-right:50px">
    <div class="row">
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
               
                    <div class="modal-header">
                     <h4 class="modal-title">Add Project</h4>
                    </div>

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



<!-- row for table -->
    
    <div class="row">   
<div class="panel-body">
<div class="col-md-11">
<table class="table table-hover table-bordered">
<thread>    
    <tr>
        <th>number</th>
        <th>project name</th>
         <th>description</th>
         <th>Delete</th>
    </tr>
</thread>  
<!-- body table -->
<tbody>
<?php
 $i =1;
 while ( $row= mysqli_fetch_array ($result)) {
       $projectid= $row['projectid'];
         $projectname= $row['projectname'];
          $projectdesc= $row['projectdesc'];

?>

    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $projectname; ?></td>
    <td><?php echo $projectdesc; ?></td>
     <td class= 'text-center'><a href= '#' id='<?php echo $projectid ?>' class= 'delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'> </span></a></td>
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


<!-- jquery ajax plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- ajax delete script -->
<script  type="text/javascript">
$(function(){
    $(".delete").click(function() {
        var element = $(this);
        var projectid = element.attr("id");
        var info ='id=' + projectid;
     
        if(confirm("are you sure want to delete?")){
            $.ajax({
                url:'deleteproject.php',
                type: 'post',
                data: info ,
                success: fuction() 
            });
            $(this).parent().parent().fadeOut(300,function(){

               $(this).remove();
            }); 
        };
        return false;
    });
});
</script>

</body>


<!--   Core JS Files   -->

<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>