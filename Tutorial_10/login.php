<?php
include("include/header.php");
session_start();
$errEmail = "";
$errPsw = "";
$invalidEmail = "";
$wrongPsw = "";
$notMemberErr = "";
$email = "";
if (isset($_POST['login'])) {
    if ($_POST['email'] == null || $_POST['password'] == null) {
        if ($_POST['email'] == null) {
            $errEmail = "Please Enter Your Email!!!";
        }
        if ($_POST['password'] == null) {
            $errPsw = "Please Enter Your Password!!!";
        }
    }
    if ((!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $invalidEmail = "Invalid Email Format!!!";
    } else {
        $password = $_POST['password'];
        $email = $_POST['email'];
    }

    if (!empty($email) && !empty($password)) {
        $pswSql = "select password from users where email=?";
        $res = $conn->prepare($pswSql);
        $res->execute([$email]);
        $pswDatas = $res->fetchColumn();
        if ($pswDatas) {
            $verifyPsw = password_verify($password, $pswDatas);
            if ($verifyPsw) {
                session_start();
                $_SESSION['email'] = $email;
                header("Location:index.php");
            } else {
                $wrongPsw = "Wrong Password!!!";
            }
        } else {
            $notMemberErr = "You Are Not Even Sign Up!!!";
        }
    }
}

?>
<section class="row mt-4">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h2>Login</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label>Email</label><br>
                        <input type="text" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $email;?>" />
                        <small class="text-danger"><?php echo $errEmail; ?></small>
                        <small class="text-danger"><?php echo $invalidEmail; ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label><br>
                        <input type="password" name="password" class="form-control" placeholder="password" />
                        <small class="text-danger d-block"><?php echo $errPsw; ?></small>
                        <small class="text-danger d-block"><?php echo $wrongPsw; ?></small>
                        <a href="forgetpsw.php" class="text-primary text-decoration-none">forget password?</a>
                    </div>
                    <div class="d-grid mt-4 mb-2">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="text-center">
                    <h6 class="text-danger"><?php echo  $notMemberErr; ?></h6>
                    <span>Not a member?</span>
                    <a href="register.php" class="text-primary text-decoration-none">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>
