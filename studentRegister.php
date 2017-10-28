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
      <label class="control-label requiredField" for="firstName">
       First Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="lastName">
       Last Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="subject2">
       Matric Number
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="subject2" name="subject2" placeholder="Enter Matric Number" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="username">
       Username
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="username" name="username" placeholder="Enter Username" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Email
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="email" name="email" placeholder="Enter Email" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="password">
       Password
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="password" name="password" placeholder="Enter Password" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="confirmPassword">
       Confirm Password
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Enter Confirm Password" type="text"/>
     </div>
     <div class="form-group">
      <div>
      <!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Sign In</button>
    <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
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