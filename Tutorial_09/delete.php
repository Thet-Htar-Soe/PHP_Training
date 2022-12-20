<?php
include("include/header.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from posts where id=?";
    $res = $connection->prepare($sql);
    $res->execute([$id]);
    header("Location:index.php");
}
?>
