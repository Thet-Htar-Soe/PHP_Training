<?php
require_once("connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from bib_students where id=?";
    $res = $connection->prepare($sql);
    $res->execute([$id]);
    header("Location:home.php");
}
