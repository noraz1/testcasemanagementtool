<?php
// panggil file connection

include_once 'conn.php';

// check ade value post tak
if (isset ($_POST['submit'])) {

  // declare variable untuk store data dari input

  $firstname =$_POST['firstname'];
  $lastname =$_POST['lastname'];
  $matricnum =$_POST['matricnum'];
  $major =$_POST['major'];
  $groupclass =$_POST['groupclass'];
  $username =$_POST['username'];
  $email =$_POST['email'];
  $password =$_POST['password'];


  // insert

  $query = " INSERT INTO student (firstname, lastname, matricnum, major, groupclass, username, email, password ) 
  VALUES ('$firstname','$lastname', '$matricnum','$major', '$groupclass', '$username','$email', '$password' )";

  $result = mysqli_query($con,$query);


  if ($result)
  {

?>

<script type="text/javascript">
alert ('register success!');
header('Location: index.php');
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



<!DOCTYPE html>
<html lang="en">

<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
 <!-- Form Name -->
<legend>Student Registeration</legend>
    <form method="post">

     <div class="form-group ">
      <label class="control-label requiredField" for="firstname"> First Name<span class="asteriskField"> * </span> </label>
      <input class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="lastname"> Last Name <span class="asteriskField"> * </span> </label>
      <input class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="matricnum"> Matric Number<span class="asteriskField"> *</span> </label>
      <input class="form-control" id="matricnum" name="matricnum" placeholder="Enter Matric Number" type="text"/>
     </div>

<!--Radio group-->
<label class="control-label" for="major">Major: </label><span class="asteriskField"> *</span>
     <div class="form-group ">
    <input name="major" type="radio" id="major" value="Software Engineering" checked>
    <label for="major">Software Engineering</label>
</div>

<div class="form-group">
    <input name="major" type="radio" id="major" value="Networking">
    <label for="major">Networking</label>
</div>

<div class="form-group">
    <input name="major" type="radio" id="major" value="Multimedia">
    <label for="major">Multimedia</label>
</div>
<div class="form-group">
    <input name="major" type="radio" id="major" value="System Computer">
    <label for="major">System Computer</label>
</div>
<!--Radio group-->

<div class="form-group ">
      <label class="control-label requiredField" for="groupclass"> Group <span class="asteriskField"> *</span> </label>
      <input class="form-control" id="groupclass" name="groupclass" placeholder="Enter Group Number     eg: 1" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="username"> Username<span class="asteriskField"> * </span> </label>
      <input class="form-control" id="username" name="username" placeholder="Enter Username" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="email">Email <span class="asteriskField"> * </span></label>
      <input class="form-control" id="email" name="email" placeholder="Enter Email" type="email"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="password">Password<span class="asteriskField"> *</span></label>
      <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="confirmpassword"> Confirm Password <span class="asteriskField">*</span>
      </label>
      <input class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Enter Confirm Password" type="password"/>
     </div>

     <div class="form-group">
      <div>

<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirmpassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
      <!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">

    <button id="submit" name="submit" class="btn btn-success" href="login.php">Sign In</button>
    <button id="cancel" name="cancel"  href="index.php" class="btn btn-danger">Cancel</button>
  </div>
</div>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
</html>