<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_07</title>
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/qrcode-style.css" rel="stylesheet" type="text/css" />
</head>

<body> 
    <?php
    $generateQRText = "";
    $errorMsg = "";
    $successCode = "";
    $errorCode = "";
    $imagePath = "";
    include("vendor/autoload.php");

    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Writer\PngWriter;

    if (isset($_POST["generate"])) {
        if ($_POST["text"] == null) {
            $errorMsg = "Please Enter Something To Generate QR Code!";
        } else {
            $generateQRText = $_POST["text"];
            $writer = new PngWriter();
            $tempDir = "img/";
            $fileName = $generateQRText . '.png';
            $pngAbsoluteFilePath = $tempDir . $fileName;
            if (!file_exists($pngAbsoluteFilePath)) {
                $qrCode = QrCode::create($generateQRText);
                $result = $writer->write($qrCode);
                $result->saveToFile("img/" . $generateQRText . '.png');
                $dataUri = $result->getDataUri();
                $successCode = "QR Code generated!";
            } else {
                $errorCode = "QR Code already generated!";
            }
        }
    }
    ?>
    <section class="sec-form">
        <h1>Tutorial_07</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="text" placeholder="Enter Your QR Code" value="<?php echo $generateQRText; ?>"><br>
            <small><?php echo $errorMsg; ?></small>
            <br>
            <button type="submit" name="generate" class="generate-btn">Generate</button>
        </form>
        <h2><?php echo $successCode; ?></h2>
        <h3><?php echo $errorCode; ?></h3>
    </section>
    <table>
        <?php
        $images = glob("img" . DIRECTORY_SEPARATOR . "*.{jpg,png,jpeg,JPG,PNG,JPEG}", GLOB_BRACE);
        foreach ($images as $image) {
            echo "<tr>";
            echo "<td>";
            echo '<img class="images" src="' . $image . '"><br>';
            echo "</td>";
            echo "<td><h4>" . $image . "</h4></td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>
