<?php
require_once("connection.php");
$sql = "insert into bib_students(name,email) values(?,?)";
$name = $_POST['name'];
$email = $_POST['email'];
$res = $connection->prepare($sql);
$res->execute([$name,$email]);
header("Location:home.php");
