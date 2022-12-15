<?php
$serverName = "localhost";
$userName = "root";
$password = "000000";
$dbName = "Tutorial_08";
$connection = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
include("vendor/autoload.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_08</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body>