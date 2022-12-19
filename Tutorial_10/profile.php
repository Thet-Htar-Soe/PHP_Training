<?php
include("include/header.php");
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:index.php");
}
$email = $_SESSION['email'];
$sql = "select * from users where email=?";
$res = $conn->prepare($sql);
$res->execute([$email]);
$data = $res->fetch(PDO::FETCH_ASSOC);
if ($data['img'] !== null) {
    $forImage = $data['img'];
} elseif ($data['img'] == "") {
    $forImage = "user.png";
}
$invalidExtension = "";
$errEmail = "";
$errName = "";
$invalidEmail = "";
if (isset($_POST['update'])) {
    if ($_POST['name'] == null || $_POST['email'] == null) {
        if ($_POST['email'] == null) {
            $errEmail = "Please Enter Your Email!!!";
        }
        if ($_POST['name'] == null) {
            $errName = "Please Enter Your Name!!!";
        }
    }
    if ((!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $invalidEmail = "Invalid Email Format!!!";
    } else {
        $updateName = $_POST['name'];
        $updateEmail = $_POST['email'];

        $tmp_name = $_FILES['image']['tmp_name'];
        if ($tmp_name !== "") {
            $image_name = $_FILES['image']['name'];
            $path = "img/" . $image_name;
            move_uploaded_file($tmp_name, $path);
        } else {
            $image_name = $forImage;
        }

        $sql = "update users set name=?,email=?,img=? where email=?";
        $res = $conn->prepare($sql);
        $res->execute([$updateName, $updateEmail, $image_name, $email]);
        header("Location:index.php");
    }
}
?>
<section>
    <nav class="navbar navbar-expand-lg bg-secondary position-sticky">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand text-white">Home</a>
            <?php
            if (isset($_SESSION['email'])) { ?>
                <div class="dropdown me-5">
                    <div class="" data-bs-toggle="dropdown">
                        <img src="./img/<?php echo $forImage; ?>" class="nav-img-avator" />
                    </div>
                    <div id="foruser" class="dropdown-menu me-5">
                        <div class="dropdown-item"><a href="profile.php" class="text-dark text-decoration-none">Profile</a></div>
                        <div class="dropdown-item"><a href="logout.php?<?php echo $_SESSION['email']; ?>" class="text-dark text-decoration-none">Logout</a></div>
                    </div>
                </div>
            <?php  } else { ?>
                <div>
                    <a href="login.php" class="btn btn-primary">Login</a>
                    <a href="register.php" class="btn btn-primary">Register</a>
                </div>
            <?php } ?>
        </div>
    </nav>
    <div class="mt-5" id="profile">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        <h2>My Profile Setting</h2>
                    </div>
                    <div class="card-body">
                        <form action="profile.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group mb-3 img-sec">
                                <img src="./img/<?php echo $forImage; ?>" class="img-avator" id="chosen-image" />
                                <input type="file" name="image" class="img-upload" id="upload-file" />
                                <button type="submit" name="upload" id="upload-btn" class="btn btn-outline-primary rounded-pill ms-5">Upload</button> <br>
                                <small class="text-danger" id="invalidImage"></small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Name</label><br>
                                <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $data['name']; ?>" />
                                <small class="text-danger"><?php echo $errName; ?></small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label><br>
                                <input type="text" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $data['email']; ?>" />
                                <small class="text-danger"><?php echo $errEmail; ?></small>
                                <small class="text-danger"><?php echo $invalidEmail; ?></small>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- Custom JS -->
<script src="./js/script.js"></script>
</body>

</html>
