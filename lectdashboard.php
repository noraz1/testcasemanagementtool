<?php
session_start();
include_once 'conn.php';
// check ade value post tak
//
//echo $classgroup;
//$classgroup = isset($_POST['classgroup']) ? $_POST['classgroup'] : false;
//if (($classgroup == '')) {
  // echo htmlentities($_POST['classgroup'], ENT_QUOTES, "UTF-8");

//} else {
   
  
//}



$result3=mysqli_query($con,"SELECT * FROM lecturer WHERE lect_id=".$_SESSION['lect_id']);
$fetched_row=mysqli_fetch_array($result3);


$percent= (isset ($_POST['subject']));


// submit mark

if(isset($_POST['submit'])){
    $tpl_id = $_POST['tpl_id'];
    $mark = $_POST['mark'];
    $feedback = $_POST['feedback'];

    if (($_POST["mark"]) >20) {
        ?>
        <script type="text/javascript">
        alert ('Please input a mark between 1 and 20');
       
        </script> 
         
        <?php
        $mark = 0;
     }else {
        $mark = ($_POST["mark"]);
     }

    $res=mysqli_query($con,"UPDATE tp_lecturer SET mark='$mark',feedback='$feedback' WHERE tpl_id=$tpl_id");
   
    
  if ($res && $mark != 0)
  {
?>
<script type="text/javascript">
alert ('Add feedback success!');

</script>
<?php
}

else
{
?>
<script type="text/javascript">
alert ('failed to add feedback. please try again!');
</script>
<?php
}

}

?>



<style>
#parent {
    overflow: hidden;
    
}
.right {
    float: right;
    margin-right: 50px;
    height: 100px;
    margin-top: 20px;
   
}
.left {
    margin-left: 50px;
   
    float: left;
   
    height: 140px;
   
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
<body >

<!-- <div class="wrapper">
    <div  class="w3-sidebar w3-bar-block" style="width:25%" data-color="blue" >

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


      <!-- <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                    TEST CASE MANAGEMENT TOOL
                </a>
                </div>


            <ul class="nav">
                <li >
                <form  autocomplete="off" action="" method="POST" >
                <input type="submit" value="0" name="mybutton">
                <input type="submit" value="1" name="mybutton">
                <input type="submit" value="3" name="mybutton">
                <input type="submit" value="4" name="mybutton">
                <input type="submit" value="5" name="mybutton">
            </form>  
            <?php 
            
   if (isset($_POST["mybutton"]))
   {
    $_SESSION['classgroup']=$_POST["mybutton"];
   }

   if ($_SESSION['classgroup']=='')
   {
    $_SESSION['classgroup']=0;
   }
   
?> 
            </li>       -->
<!--
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
     </ul>
    	</div>
    </div> -->

    <div >
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Test Case Management Tool</a>
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<!-- header -->

<div id="parent">
     <div align="center" class="right">
     <p>Enter percent mark after finish key in all the mark.</p>
     <p>Example: 3 (for 3%)</p>
     <form  method="post">
  <input type="text" name="subject" size="10" value=" " >
  <input type="submit" class="btn btn-success">

</form>
     </div>

        <div align="center" class="left">
        <h1>Test Plan List</h1>
        <p>Choose Group</p>
        <form  autocomplete="off" action="" method="POST" >
        <button name="mybutton" type="submit" value="1" class="btn btn-success">Group 1</button>
        <button name="mybutton" type="submit" value="2" class="btn btn-success">Group 2</button>
        <button name="mybutton" type="submit" value="3" class="btn btn-success">Group 3</button>
        <button name="mybutton" type="submit" value="4" class="btn btn-success">Group 4</button>
                <!-- <input type="submit" value="0" name="mybutton">
                <input type="submit" value="1" name="mybutton">
                <input type="submit" value="3" name="mybutton">
                <input type="submit" value="4" name="mybutton">
                <input type="submit" value="5" name="mybutton"> -->
            </form>  
            <?php 
   if (isset($_POST["mybutton"]))
   {
    $_SESSION['classgroup']=$_POST["mybutton"];
   }
?> 
        </div>

    </div>
            



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        
                                        <th><font color="black">Number</font></th>
                                        <th><font color="black">Class Group</font></th>
                                        <th><font color="black">Matric Number</font></th>
                                        <th><font color="black">Project Description</font></th>
                                        <th><font color="black">Test Plan</font></th>
                                        <th><font color="black">Mark</font></th>
                                        <th><font color="black">Mark(<?php if (isset($_POST['subject'])) {
                                              echo $_POST['subject'];
                                                } else{
                                                    echo "100";
                                                }?>%)</font></th>
                                       
                                     
                                    <tbody>

                                    <?php

                                    if (( $_SESSION['classgroup']!== 0)) {
                                        $result = mysqli_query ($con,"SELECT * FROM tp_lecturer WHERE classgroup=". $_SESSION['classgroup']);
                                        $i =1;
                                        while ( $row= mysqli_fetch_array ($result)) {
                                            $tpl_id= $row['tpl_id'];
                                            $classgroup= $row['classgroup'];
                                            $matricnum= $row['matricnum'];
                                            $tpl_name = $row['tpl_name'];
                                            $projectdesc = $row['projectdesc'];
                                            $feedback= $row['feedback']; 
                                            $mark= $row['mark'];
                                           
                                              
                                                if (isset($_POST['subject'])) {
                                                $mark= $row['mark'];
                                               
                                                $totalmark = 20;
                                                
                                                $new_mark = ($mark / $totalmark) * $_POST['subject'];
                                                } else{
                                                    $mark= $row['mark'];
                                                    
                                                     $totalmark = 20;
                                                     
                                                     $new_mark = ($mark / $totalmark) * 100; 
                                                }


                                            ?>
                                         <tr>
                                        <td><?php echo $i; ?></td>
                                        <td> <?php echo $classgroup;?></td>
                                        <td> <?php echo $matricnum;?></td>
                                        <td> <?php echo $projectdesc;?></td>
                                        
                                        <td><a href="#edit<?php echo $tpl_id;?>"  data-toggle="modal" ><?php echo $tpl_name;?></a></td>

                                       <!-- View test plan -->
                                       <div id="edit<?php echo $tpl_id;?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true"data-backdrop="false">
                                        <div class="modal-dialog" style="width:1300px;">
                                            
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    
                                                        <h1> Test Plan Report </h1>
                                                    
                                                </div>

                                                    <!--body   -->
                                                <div class="modal-body">
                                                    <!-- report -->
                                                    <div id="TestPlan" padding-left:" 2cm;"  style=" left:50px; right :50px; width:1200px;" class="container">
                                                    
                                                        <p><span style="font-size: 14pt;" name="tp_name"><strong>Test plan for: <?php echo $row['tpl_name']; ?></strong></span></p>
                                                        <p><span style="font-size: 13pt;"><strong>Introduction: </strong><?php echo $row['tpl_introduction']; ?></span></p>
                                                        <p><span style="font-size: 13pt;"><strong>People:&nbsp;</strong><?php echo $row['tpl_responsibilities']; ?></span></p>
                                                        <p><span style="font-size: 13pt;"><strong>Risks: </strong><?php echo $row['tpl_risk']; ?></span></p>
                                                        <p><span style="font-size: 13pt;"><strong>Test stratergy:</strong></span></p>
                                                        <ul>
                                                        <li><span style="font-size: 12pt;"><strong>Test item:&nbsp;</strong><?php echo $row['tpl_test_item']; ?></span></li>
                                                        <li><span style="font-size: 12pt;"><strong>Features to be tested:</strong>&nbsp; </span><span style="font-size: 12pt;"><?php echo $row['tpl_features_to_be_tested']; ?></span></li>
                                                        <li><span style="font-size: 12pt;"><strong>Features not to be tested:</strong> <?php echo $row['tpl_features_not_to_be_tested']; ?></span></li>
                                                        <li><span style="font-size: 12pt;" name="username" ><strong>Approach:</strong> <?php echo $row['tpl_approach']; ?></span></li>
                                                        <li><span style="font-size: 12pt;"><strong>Item pass/fail criteria:</strong> <?php echo $row['tpl_item_passfail_criteria']; ?></span></li>
                                                        <li><span style="font-size: 12pt;"><strong>Testing task:</strong> <?php echo $row['tpl_testing_task']; ?></span></li>
                                                        <li><span style="font-size: 12pt;"><strong>Test deliverables:</strong> <?php echo $row['tpl_test_deliverable']; ?></span></li>
                                                        <li><span style="font-size: 12pt;"><strong>Environmental needs:</strong> <?php echo $row['tpl_environmental_need']; ?></span></li>
                                                        <li><span style="font-size: 12pt;"><strong>Approvals:</strong> <?php echo $row['tpl_approval']; ?></span></li>
                                                        </ul>
                                                        <p><span style="font-size: 13pt;"><strong>Testing activities and estimates: </strong><?php echo $row['tpl_schedule']; ?></span></p>
                                                        <p>&nbsp;</p>
                                                        <p>&nbsp;</p>
            
                                                        </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <div >
                                                        <form method="post">
                                                        <div class="form-group ">
                                                             <input type="hidden" name="tpl_id" value="<?php echo $tpl_id; ?>">
                                                            <label style= "float: left;" class="control-label requiredField " for="feedback"> Please Enter Feedback <span class="asteriskField"> *</span> </label> 
                                                            <textarea class="form-control" cols="40" rows="10" id="feedback" name="feedback" type="text"><?php echo $feedback; ?> </textarea> 
                                                            <label style= "float: left;" class="control-label requiredField " for="mark"> Please Enter Student Mark <span class="asteriskField"> *</span> </label>
                                                            <input class="form-control" id="mark" name="mark" placeholder="Enter Student Mark" value =" <?php echo $mark;?>" type="text"/> 
                                                            <span class="help-block"  style= "float: left;"  id="mark">Please input a mark between 1 and 20</span>
                                                           

                                                        </div>
                                                        <div class="form-group">
                                                            <div>
                                                                <button class="btn btn-primary " name="submit" type="submit" > Submit</button>
                                                            </div>
                                                        </div>
                                                         </form>
                                                        
                                                    </div>
                                            <a  class="btn btn-success" href="#" onclick="TestPlan()">Download PDF</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   <!-- these js files are used for making PDF -->
                                                        <script src="assets/js/jspdf.js"></script>
                                                        <script src="assets/js/jquery-2.1.3.js"></script>
                                                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                                                        <meta name="viewport" content="width=device-width, initial-scale=1">
                                                        <script>
                                                        function TestPlan(){
                                                    var pdf = new jsPDF('p', 'pt', 'letter');
                                                    source = $('#TestPlan')[0];
                                                    specialElementHandlers = {
                                                        '#bypassme': function(element, renderer){
                                                            
                                                            return true
                                                        }
                                                    }
                                                    margins = {
                                                        top: 50,
                                                        bottom: 60,
                                                        left: 40,
                                                        width: 522
                                                    };
                                                    pdf.fromHTML(
                                                        source // HTML string or DOM elem ref.
                                                        , margins.left // x coord
                                                        , margins.top // y coord
                                                        , {
                                                            'width': margins.width // max width of content on PDF
                                                            , 'elementHandlers': specialElementHandlers
                                                        },
                                                        function (dispose) {
                                                        // dispose: object with X, Y of the last line add to the PDF
                                                        //          this allow the insertion of new lines after html
                                                            pdf.save('Test Plan.pdf');
                                                        }
                                                        , margins
                                                    )		
                                                    }
                                                        
                                                        </script>
                                                </div>
                                            </div>
                                                                                        
                                        
                                             
                                        </div>
                                        </div>
                                   

                                           
                                       
                                        <td> <?php echo $mark;?></td>
                                        <td> <?php echo $new_mark;?></td>
                                       
                                        <!-- <td>  <button id="toggle" onclick="myFunction()">Unchecked yet!</button></td> -->
                                    <?php
                                              
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
        </div>


<!-- script for button change onclick -->
        <!-- <script>

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

        </script> -->
<!-- end script for button change onclick -->

        <!-- <footer class="footer">
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
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web -->
                <!-- </p>
            </div>
        </footer> -->


    </div>
</div>

<!-- <div id="edit<?php echo $tpl_id;?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" style="width:1250px;">
    <div class="modal-content">
      ...
    </div>
  </div>
</div> -->
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