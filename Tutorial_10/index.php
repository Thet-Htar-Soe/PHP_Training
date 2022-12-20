<?php include("include/header.php");
session_start();
?>
<section>
    <nav class="navbar navbar-expand-lg bg-secondary position-sticky">
        <div class="container d-flex justify-content-between">
            <a href="index.php" class="navbar-brand text-white">Home</a>
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $sql = "select * from users where email=?";
                $res = $conn->prepare($sql);
                $res->execute([$email]);
                $data = $res->fetch(PDO::FETCH_ASSOC);
                if (isset($data['img'])) {
                    $forImage = $data['img'];
                } else {
                    $forImage = "user.png";
                }
            ?>
                <div class="dropdown me-5">
                    <div class="" data-bs-toggle="dropdown">
                        <img src="./img/<?php echo $forImage ?>" class="nav-img-avator" />
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
    <div class="d-flex justify-content-center align-items-center homepage">
        <h1>Welcome From My Website</h1>
    </div>
</section>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- Custom JS -->
<script src="./js/script.js"></script>
</body>

</html>
