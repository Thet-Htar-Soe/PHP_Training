<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_07</title>
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    $generateQRText = "";
    $errorMsg = "";
    $successCode = "";
    $errorCode = "";
    $imagePath = "";
    if (isset($_POST["generate"])) {
        if ($_POST["text"] == null) {
            $errorMsg = "Please Enter Something To Generate QR Code!";
        } else {
            $generateQRText = $_POST["text"];
        }
        include('lib/phpqrcode/qrlib.php');
        $tempDir = "img/";
        $codeContents = $generateQRText;
        $fileName = $codeContents . '.png';
        $pngAbsoluteFilePath = $tempDir . $fileName;
        $urlRelativeFilePath = $tempDir . $fileName;
        if ($_POST["text"] !== "") {
            if (!file_exists($pngAbsoluteFilePath)) {
                QRcode::png($codeContents, $pngAbsoluteFilePath);
                $successCode = "QR Code generated!";
                $imagePath = $urlRelativeFilePath;
            } else {
                $errorCode = "QR Code already generated!";
            }
        }
    }
    ?>
    <section>
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

</body>

</html>
