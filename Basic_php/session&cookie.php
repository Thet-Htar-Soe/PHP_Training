<?php
//SESSION
session_start();
$_SESSION['name'] = "Thet Htar Soe";
// print_r($_SESSION);
echo $_SESSION['name'];

//COOKIE 
setcookie('firstName', 'Thet Htar', time() + (60 * 60));
// print_r($_COOKIE);
// echo $_COOKIE['firstName'];
