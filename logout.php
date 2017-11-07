<?php 

session_destroy();
 if (!isset($_SESSION['matricnum']))
   {
   header("Location: login.php");
   }

 ?>