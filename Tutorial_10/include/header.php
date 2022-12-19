<?php
$serverName = "localhost";
$userName = "root";
$userPsw = "000000";
$dbName = "Tutorial_10";
$conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $userPsw);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_10</title>
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    