<?php
//initialize
  $localhost = "localhost";
  $user = "root";
  $pass = "";
  $port = 3307;
  $dbase = "CRM";

  // Create connection & Check connection
  $con = mysqli_connect($localhost, $user, $pass, $dbase, $port) or die("Sorry! You can't connect to the database");
  

?>

