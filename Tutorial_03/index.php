<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_03</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    $errorDate = "";
    $validDate = "";
    $caculateDate = "";
    if (isset($_POST["submit"]) && empty($_POST["calendar"])) {
        $_POST['calendar'] = null;
        $errorDate = "Please Choose Date!!!";
    }
    if (isset($_POST['calendar'])) {
        $userBd = strtotime($_POST['calendar']);
        $currentDate = strtotime("today");
        if (($currentDate > $userBd)) {
            // cuz of 1 day has 60(sec)*60(min)*24(hr)
            $days = floor(($currentDate - $userBd) / 86400);
            $years = floor($days / 365);
            $months = floor(($days - ($years * 365)) / 30);
            $forday = floor(($days - ($years * 365) - ($months * 30)));
            $caculateDate =  "<h3>Your Age is " . $years . "years/" . $months . "months/" . $forday . "days!!!</h3>";
        } else {
            $validDate = "Enter Valid Date!!!";
        }
    }
    ?>
    <h1>Tutorial_03</h1>
    <form action="" method="POST">
        <input type="date" name="calendar">
        <h2><?php echo $errorDate; ?></h2>
        <h2><?php echo $validDate; ?></h2>
        <input type="submit" name="submit" value="Calculate">
    </form>
    <h3><?php echo $caculateDate; ?></h3>


</body>

</html>
