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
    <?php
    $emptyEmail = "";
    $emptyPsw = "";
    $getEmail = "";
    $emailErr = "";
    $wrongPsw = "";
    $wrongEmail = "";
    $wrongMailPsw = "";
    session_start();
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        if (($_SESSION['email']) == "thethtarsoe2761@gmail.com" && $_SESSION['password'] == "123456") {
            header('Location:dashboard.php');
        }
    }
    if (isset($_POST['login'])) {

        if ($_POST["email"] == null || $_POST["password"] == null) {
            if ($_POST["email"] == null) {
                $emptyEmail = "Please Enter Your Email!!!";
            }
            if ($_POST["password"] == null) {
                $emptyPsw = "Please Enter Your Password!!!";
            }
        }

        $getEmail = $_POST["email"];
        $_SESSION['email'] =  $_POST['email'];
        $_SESSION['password'] =  $_POST['password'];

        if (($_SESSION['email']) == "thethtarsoe2761@gmail.com" && $_SESSION['password'] == "123456") {
            header('Location:dashboard.php');
        } elseif (!empty($_POST['email']) && !empty($_POST['password'])) {
            if (($_SESSION['email']) == "thethtarsoe2761@gmail.com" && $_SESSION['password'] !== "123456") {
                $wrongPsw = "Wrong Password!!!";
            } elseif (($_SESSION['email']) !== "thethtarsoe2761@gmail.com" && $_SESSION['password'] == "123456" && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $wrongEmail = "Wrong Email!!!";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_SESSION['password'] == "123456") {
                $emailErr = "Invalid email format!!!";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_SESSION['password'] !== "123456") {
                $emailErr = "Invalid email format!!!";
                $wrongPsw = "Wrong Password!!!";
            } else {
                $wrongMailPsw =  "Email And Password does not match!!!";
            }
        } elseif (!empty($_POST['email'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format!!!";
            }
        }
    }
    ?>
    <h1>Tutorial_04</h1>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="Enter Your Email" value=<?php echo $getEmail; ?>>
        <h2><?php echo $emptyEmail; ?></h2>
        <h2><?php echo $emailErr; ?></h2>
        <h2><?php echo $wrongEmail ?></h2>
        <br>
        <input type="password" name="password" placeholder="Enter Your Password">
        <h2><?php echo $emptyPsw; ?></h2>
        <h2><?php echo $wrongPsw; ?></h2>
        <br>
        <input type="submit" name="login" value="Login">
        <br>
    </form>
    <h3><?php echo $wrongMailPsw; ?></h3>

</body>

</html>
