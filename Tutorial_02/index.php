<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:lightblue">
    <section>
        <h1 style="text-align:center;">Tutorial_02 Diamond Shape</h1>
        <div style="width:200px;margin:0 auto;">
    <pre>
<?php
$upperSide = 1;
while ($upperSide <= 11) {
    $space = 11;
    while ($space >= $upperSide) {
        echo "&nbsp";
        $space--;
    }
    $diamond = 1;
    while ($diamond <= $upperSide) {
        echo " *";
        $diamond++;
    }
    echo "<br>";
    $upperSide += 2;
}
$lowerSide = 9;
while ($lowerSide >= 1) {
    $space = 11;
    while ($space >= $lowerSide) {
        echo "&nbsp";
        $space--;
    }
    $diamond = 1;
    while ($diamond <= $lowerSide) {
        echo " *";
        $diamond++;
    }
    echo "<br>";
    $lowerSide -= 2;
}
?>
</pre>
        </div>
    </section>
</body>

</html>
