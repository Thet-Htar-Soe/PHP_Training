<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_06</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    $errorFolder = "";
    $errorImage = "";
    $successMsg = "";
    $validExtError = "";
    $getFolder = "";
    if (isset($_POST["upload"])) {
        $getFolder = $_POST["folder"];
        $getImage  = $_FILES['image']['name'];
        $getTmp    = $_FILES['image']['tmp_name'];
        if (empty($getFolder) || empty($getImage)) {
            if (empty($getFolder)) {
                $errorFolder = "Please Enter Folder Name!!!";
            }
            if (empty($getImage)) {
                $errorImage = "Please Choose Image!!!";
            }
        } elseif (isset($getFolder) && isset($getImage)) {
            if (!is_dir($getFolder)) {
                mkdir($getFolder);
            }
            $getImagePath = $getFolder . '/' . $getImage;
            $allowExtension = ["jpg", "png", "jpeg"];
            $splitImageName = explode(".", $getImage);
            $imageExtension = strtolower(end($splitImageName));
            if (in_array($imageExtension, $allowExtension)) {
                move_uploaded_file($getTmp, $getImagePath);
                $successMsg = "Image Uploaded Successfully!!!";
            } else {
                $validExtError = "Please Choose Valid Extension!!!";
            }
        }
    }
    ?>

    <h1>Tutorial_06</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="folder" placeholder="Enter Your Folder Name" value="<?php echo $getFolder; ?>"><br>
            <small><?php echo $errorFolder; ?></small>
        </div>
        <div class="form-group">
            <input type="file" name="image"><br>
            <small><?php echo $errorImage; ?></small>
        </div>
        <div>
            <button type="submit" name="upload" class="upload-btn">Upload</button>
        </div><br>
        <h2><?php echo  $successMsg; ?></h2>
        <h3><?php echo  $validExtError; ?></h3>
    </form>
    <table>
        <?php
        $dirs = array_filter(glob("*"), 'is_dir');
        foreach ($dirs as $dir) {
            $images = glob($dir . DIRECTORY_SEPARATOR . "*.{jpg,png,jpeg,JPG,PNG,JPEG}", GLOB_BRACE);
            foreach ($images as $image) {
                echo "<tr>";
                echo "<td>";
                echo '<img class="images" src="' . $image . '"><br>';
                echo "</td>";
                echo "<td><h4>" . $image . "</h4></td>";
                echo "<td>";
        ?>
                <a href="delete.php?photo=<?php echo $image; ?>" class="delete-btn" onclick="alert('Are You Sure You Want To Delete?')">Delete</a>
        <?php
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

</body>

</html>
