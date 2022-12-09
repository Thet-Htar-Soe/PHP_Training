<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_05</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body> 
    <h1>Tutorial_05</h1>
    <h2>Reading Text File</h2>
    <p>
        <?php
        $textFile = fopen("file/sample.txt", "r");
        echo fread($textFile, filesize("file/sample.txt"));
        ?>
    </p>
    <?php
    include "lib/Classes/PHPExcel.php";
    // for excel file accesss in php
    $filePath = "file/sample.xlsx";
    $reader = PHPExcel_IOFactory::createReaderForFile($filePath);
    $excel_Obj = $reader->load($filePath);
    $worksheet = $excel_Obj->getActiveSheet();
    ?>
    <section class="sec-excel">
        <h2>Reading Excel File</h2>
        <table>
            <thead>
                <tr>
                    <th><?php echo $worksheet->getCell('A1')->getValue(); ?></th>
                    <th><?php echo $worksheet->getCell('B1')->getValue(); ?></th>
                    <th><?php echo $worksheet->getCell('C1')->getValue(); ?></th>
                    <th><?php echo $worksheet->getCell('D1')->getValue(); ?></th>
                    <th><?php echo $worksheet->getCell('E1')->getValue(); ?></th>
                    <th><?php echo $worksheet->getCell('F1')->getValue(); ?></th>
                    <th><?php echo $worksheet->getCell('G1')->getValue(); ?></th>
                    <th><?php echo $worksheet->getCell('H1')->getValue(); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $worksheet->getCell('A2')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('B2')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('C2')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('D2')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('E2')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('F2')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('G2')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('H2')->getValue(); ?></td>
                </tr>
                <tr>
                    <td><?php echo $worksheet->getCell('A3')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('B3')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('C3')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('D3')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('E3')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('F3')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('G3')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('H3')->getValue(); ?></td>
                </tr>
                <tr>
                    <td><?php echo $worksheet->getCell('A4')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('B4')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('C4')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('D4')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('E4')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('F4')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('G4')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('H4')->getValue(); ?></td>
                </tr>
                <tr>
                    <td><?php echo $worksheet->getCell('A5')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('B5')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('C5')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('D5')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('E5')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('F5')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('G5')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('H5')->getValue(); ?></td>
                </tr>
                <tr>
                    <td><?php echo $worksheet->getCell('A6')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('B6')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('C6')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('D6')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('E6')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('F6')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('G6')->getValue(); ?></td>
                    <td><?php echo $worksheet->getCell('H6')->getValue(); ?></td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="sec-csv">
        <h2>Reading Csv File</h2>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Job</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <?php
            $csvFile = fopen("file/sample.csv", "r");
            $data = fgetcsv($csvFile, 1000, ",");
            $arr = [];
            while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
                $arr[] = $data;
            }
            fclose($csvFile);
            ?>
            <?php foreach ($arr as $data) {
                echo "<tr>";
                echo "<td>" . $data[0] . "</td>";
                echo "<td>" . $data[1] . "</td>";
                echo "<td>" . $data[2] . "</td>";
                echo "<td>" . $data[3] . "</td>";
                echo "<td>" . $data[4] . "</td>";
                echo "<td>" . $data[5] . "</td>";
                echo "<tr>";
            } ?>
        </table>
    </section>

</body>

</html>
