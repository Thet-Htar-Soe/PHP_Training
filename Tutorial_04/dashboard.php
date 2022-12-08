<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    session_start();
    ?>
    <h1>Hello <?php echo $_SESSION["email"]; ?></h1>
    <form action="" method="POST">
        <input type="submit" name="submit" value="Logout">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        header("Location:index.php");
        session_destroy();
    }
    ?>

</body>

</html>
