<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Tutorial_04</h1>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Enter Your Email"><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
        <input type="submit" value="Login">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (!empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (isset($_POST["email"])) {
                session_start();
                $email = $_POST["email"];
                $password = $_POST["password"];
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                header("Location:dashboard.php");
            }
        } else {
            die("please try again");
        }
    }

    ?>

</body>

</html>
