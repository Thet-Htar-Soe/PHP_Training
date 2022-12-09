<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Tutorial_04</h1>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Enter Your Email" value=<?php if (isset($_POST['login']) && isset($_POST['email'])) {
        echo $_POST['email'];
        } ?>>
        <?php
        if (isset($_POST['login']) && empty($_POST["email"])) {
            echo "<span style='display:block;color:red'>Please Enter Your Email!!!</span>";
        }
        ?>
        <br>
        <input type="password" name="password" placeholder="Enter Your Password">
        <?php
        if (isset($_POST['login']) && empty($_POST["password"])) {
            echo "<span style='display:block;color:red'>Please Enter Your Password!!!</span>";
        }
        ?>
        <br>
        <input type="submit" name="login" value="Login">
    </form>

    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        if (($_SESSION['email']) == "thethtarsoe2761@gmail.com" && $_SESSION['password'] == "123456") {
            header('Location:dashboard.php');
        }
    }

    if (isset($_POST['login'])) {
        $_SESSION['email'] =  $_POST['email'];
        $_SESSION['password'] =  $_POST['password'];
        if (($_SESSION['email']) == "thethtarsoe2761@gmail.com" && $_SESSION['password'] == "123456") {
            header('Location:dashboard.php');
        } elseif (!empty($_POST['email']) && !empty($_POST['password'])) {
            if (($_SESSION['email']) == "thethtarsoe2761@gmail.com" && $_SESSION['password'] !== "123456") {
                echo "<h2>Wrong Password!!!</h2>";
            } elseif (($_SESSION['email']) !== "thethtarsoe2761@gmail.com" && $_SESSION['password'] == "123456") {
                echo "<h2>Wrong Email!!!</h2>";
            } else {
                echo "<h2>Please Try Again!!!</h2>";
            }
        }
    }
    ?>
</body>

</html>
