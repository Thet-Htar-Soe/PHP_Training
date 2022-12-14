<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_01</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Tutorial_01 Chess Board</h1>
    <br>  
    <table>
        <?php
        $row = 1;
        while ($row <= 8) {
            echo  "<tr>";
            $col = 1;
            while ($col <= 8) {
                $total = $row + $col;
                if ($total % 2 == 0) {
                    echo "<td class='white'></td>";
                } else {
                    echo "<td class='black'></td>";
                }
                $col++;
            }
            echo "</tr>";
            $row++;
        }
        ?>
    </table>

</body>

</html>
