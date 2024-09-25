<?php

$url = isset($_GET['url'])  ? $_GET['url'] : 'index';

switch ($url){
  case 'HomePage':
    include 'Arcega_home.php';
    break;
  case 'LoginPage':
    include 'Arcega_login.php';
    break;
  default:
    include 'Arcega_login.php';
    break;
}
?>


