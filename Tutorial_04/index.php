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
        <input type="email" name="email" placeholder="Enter Your Email"><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
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
        } else {
            echo "<h2>Please Try Again</h2>";
        }
    }
    ?>
</body>

</html>
