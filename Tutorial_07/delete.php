<?php
$getphoto = $_GET['photo'];
unlink($getphoto);
header("Location:index.php");
?>
