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

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format!!!";
        }

        $getEmail = $_POST["email"];
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
                echo "<h2>Email And Password does not match!!!</h2>";
            }
        }
    }
    ?>
    <h1>Tutorial_04</h1>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="Enter Your Email" value=<?php echo $getEmail; ?>>
        <span style='display:block;color:red'><?php echo $emptyEmail;
        echo  $emailErr; ?></span>
        <br>
        <input type="password" name="password" placeholder="Enter Your Password">
        <span style='display:block;color:red'><?php echo $emptyPsw; ?></span>
        <br>
        <input type="submit" name="login" value="Login">
    </form>

</body>

</html>
