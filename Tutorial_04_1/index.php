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
$userEmail = "thethtarsoe2761@gmail.com";
$userPsw = "123456";
    session_start();
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            header('Location:dashboard.php');
    }
    if (isset($_POST['login'])) {

        // empty email and empty password validation
        if ($_POST["email"] == null || $_POST["password"] == null) {
            if ($_POST["email"] == null) {
                $emptyEmail = "Please Enter Your Email!!!";
            }
            if ($_POST["password"] == null) {
              $emptyPsw = "Please Enter Your Password!!!";  
            }
        }   
        $getEmail = $_POST["email"]; 
      
            // if($_POST['email'] == $userEmail && $_POST['password'] == $userPsw) {
            //     $_SESSION['email'] = $getEmail;
            //     $_SESSION['password'] = $_POST['password'];
            //     header("Location:dashboard.php");
            // }

            if (isset($_SESSION['email'])) {
                header("Location:dashboard.php");
            } elseif (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
               $_POST["email"] = $_SESSION['email'];
               $_POST["password"] = $_SESSION['password'];
            //    header("Location:dashboard.php");
            }
      
        //    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        //     if (($_SESSION['email']) == $userEmail && $_SESSION['password'] == $userPsw) {
        //         header('Location:dashboard.php');
        //     } 
            // elseif (!empty($_POST['email']) && !empty($_POST['password'])) {
            //     if (($_SESSION['email']) == "thethtarsoe2761@gmail.com" && $_SESSION['password'] !== "123456") {
            //         echo "<h2>Wrong Password!!!</h2>";
            //     } elseif (($_SESSION['email']) !== "thethtarsoe2761@gmail.com" && $_SESSION['password'] == "123456") {
            //         echo "<h2>Wrong Email!!!</h2>";
            //     } else {
            //         echo "<h2>Please Try Again!!!</h2>"; 
            //     }
            // }
            // else {
            //     $_SESSION['email'] =  $_POST['email']; 
            //     $_SESSION['password'] =  $_POST['password'];   
            // }
    // }
    //    
    }
    ?>
    <h1>Tutorial_04</h1>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Enter Your Email" value=<?php echo $getEmail; ?>>
<span style='display:block;color:red'><?php echo $emptyEmail;?></span> 
        <br>

        <input type="password" name="password" placeholder="Enter Your Password">
 <span style='display:block;color:red'><?php echo $emptyPsw;?></span>
        <br>
        <input type="submit" name="login" value="Login">
    </form>


</body>

</html>
