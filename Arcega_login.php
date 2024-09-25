<?php
//config
include "config.php";
$error="";
//errorcount
if(!isset($_SESSION['errorcount'])){
  $_SESSION['errorcount'] = 0;
} 
//Anti-SQL Injection


//Login Click
if(isset($_POST['login']))
{
$ret=mysqli_query($con,"SELECT * FROM user WHERE username='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
$username = $_POST['username']; 
$password = $_POST['password'];
$Encrypt=md5($_POST['password']);
 

$sanitized_userid =  
    mysqli_real_escape_string($con, $username); 
      
$sanitized_password =  
    mysqli_real_escape_string($con, $password);
if($num>0)
{
include "config.php";
$extra="Arcega_home.php";
echo "<script>window.location.href='".$extra."'</script>";
mysqli_close($con);
}
else //Wrong username or Password
{
   $_SESSION['errorcount']++;
  include "config.php";
  $error ="Wrong username or Password";
 
}
}
if(isset($_POST['register'])){
  include "config.php";
$extra="register.php";
echo "<script>window.location.href='".$extra."'</script>";
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Arcega | Login</title>
<link rel="stylesheet" href="styles.css">
<style>
  .error{
    color: red;
  }
  .form-group {
    text-align: center;
  }
  .input-with-icon {
    display: inline-block;
    margin: 0 auto;
  }
  #button {
    margin: 0 auto;
    display: block;
  }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

</head>
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          
        </div>
        <div class="col-md-5 "> <br>
     <form id="login-form" class="login-form" action="" method="post">
     <div class="row">
     <div class="form-group col-md-10">
            <label class="form-label"><b>Username</b></label>
            <div class="controls">
        <div class="input-with-icon  right">                                       
          <i class=""></i>
          <input type="text" name="username" id="txtusername" class="form-control" >                                 
        </div>
            </div>
          </div>
          </div>
      <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label"><b>Password</b></label>
            <span class="help"></span>
            <div class="controls">
        <div class="input-with-icon  right">                                       
          <i class=""></i>
          <input type="password" name="password" id="txtpassword" class="form-control" >                                 
        </div>
            </div>
          </div>
          </div>
      <div class="row">
          </div>
          </div>
          <div class="row">
            <div class="col-md-10 text-center">
              <?php
              if($_SESSION['errorcount']>=5){
              ?>  
              
              <button class="btn btn-primary btn-cons" name="login" type="submit" id="button" disabled>Login</button>
              <?php 
              echo"<p class='error'> Too many Failed Attempts. Wait for 5 minutes.</p>";
              ?>
              <?php
              }
              else{
              ?>  

              <button class="btn btn-primary btn-cons" name="login" type="submit" id="button">Login</button>
              <br><br>
              <button class="btn btn-primary btn-cons" name="register" type="submit" id="button">Register</button>

              <?php
              if($error != ""){ ?>
                <p class="error"><?= $error?></p>
                <?php
              }}
              ?>
            
           
      </form>
        </div>
     
    
  </div>
</div>

</body>
</html>