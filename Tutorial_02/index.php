<h1 style="text-align:center;">Tutorial_02 Diamond Shape</h1>
<div style="width:auto;height:auto;text-align:center;">
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
        echo " *   "; 
        $diamond++; 
    }
    echo "<br>";
    $upperSide += 2;  
}

$lowerSide = 9;
while ($lowerSide >= 1) {
    $space= 11;
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
</div>
