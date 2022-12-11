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

    <section class="sec-txt">
        <h2>Reading Text File</h2>
        <p>
            <?php
            $textFile = fopen("file/sample.txt", "r");
            echo fread($textFile, filesize("file/sample.txt"));
            ?>
        </p>
    </section>

    <section class="sec-excel">
        <h2>Reading Excel File</h2>
        <?php
        require 'lib/vendor/autoload.php';

        use PhpOffice\PhpSpreadsheet\Spreadsheet;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("file/sample.xlsx");
        $d = $spreadsheet->getSheet(0)->toArray();
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        echo "<table>";
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            echo "<td>" . $sheetData[$i][0] . "</td>";
            echo "<td>" . $sheetData[$i][1] . "</td>";
            echo "<td>" . $sheetData[$i][2] . "</td>";
            echo "<td>" . $sheetData[$i][3] . "</td>";
            echo "<td>" . $sheetData[$i][4] . "</td>";
            echo "<td>" . $sheetData[$i][5] . "</td>";
            echo "<td>" . $sheetData[$i][6] . "</td>";
            echo "<td>" . $sheetData[$i][7] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
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

    <section class="sec-docx">
        <h2>Reading Docx File</h2>
        <?php
        require_once 'lib/vendor/autoload.php';

        use PhpOffice\PhpWord\TemplateProcessor;

        $docxPath = "file/sample.docx";
        $phpWord = PhpOffice\PhpWord\IOFactory::createReader('Word2007')->load($docxPath);
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if ($element instanceof PhpOffice\PhpWord\Element\Text) {
                    echo $element->getText() . '<br>';
                } elseif ($element instanceof PhpOffice\PhpWord\Element\TextRun) {
                    if (count($element->getElements()) > 0 and $element->getElements()[0] instanceof PhpOffice\PhpWord\Element\Text) {
                        echo "<p>";
                        for ($i = 0; $i < count($element->getElements()); $i++) {
                            echo $element->getElements()[$i]->getText();
                        }
                        echo "</p>";
                    }
                }
            }
        }
        ?>
    </section>

</body>

</html>
