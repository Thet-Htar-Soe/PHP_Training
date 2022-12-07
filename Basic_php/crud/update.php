<?php
require_once("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "update bib_students set name=?,email=? where id=?";
    $res = $connection->prepare($sql);
    $res->execute([$name, $email, $id]);
    header("Location:home.php?update=success");
}
