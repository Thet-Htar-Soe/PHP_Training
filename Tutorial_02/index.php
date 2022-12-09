<h1 style="text-align:center;">Tutorial_02 Diamond Shape</h1>
<?php
$i = 1;
while ($i <= 11) {
    $j = 11;
    while ($j >= $i) {
        echo "&nbsp";
        $j--;
    }
    $k = 1;
    while ($k <= $i) {
        echo "*"; 
        $k++; 
    }
    echo "<br>";
    $i += 2;  
}

$a = 9;
while ($a >= 1) {
    $j = 11;
    while ($j >= $a) {
        echo "&nbsp";
        $j--;
    }
    $k = 1;
    while ($k <= $a) {
        echo "*";
        $k++;
    }
    echo "<br>";
    $a -= 2;
}
?>
