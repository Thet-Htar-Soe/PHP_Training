<?php
include("include/header.php");
$errName = "";
$errEmail = "";
$errPhone = "";
$errPsw = "";
$errAddress = "";
$invalidEmail = "";
$invalidPhone = "";
$name =  $phone  = $address = $email ="";
if (isset($_POST['register'])) {
    if ($_POST['name'] == null || $_POST['email'] == null || $_POST['phone'] == null || $_POST['password'] == null || $_POST['address'] == null) {
        if ($_POST['name'] == null) {
            $errName = "Please Enter Your Name";
        }
        if ($_POST['email'] == null) {
            $errEmail = "Please Enter Your Email";
        }
        if ($_POST['phone'] == null) {
            $errPhone = "Please Enter Your Phone";
        }
        if ($_POST['password'] == null) {
            $errPsw = "Please Enter Your Password";
        }
        if ($_POST['address'] == null) {
            $errAddress = "Please Enter Your Address";
        }
    }
    if ((!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $invalidEmail = "Invalid Email Format";
    } else {
        $name = $_POST['name'];
        if(!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
            if(preg_match('/^[0-9]{10}+$/', $phone)) {
            $phone = $_POST['phone'];
            } else {
            $invalidPhone = "Invalid Phone Number!!!";
            }
        }
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $address = $_POST['address'];
        $email = $_POST['email'];
    }

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($address)) {
        $sql = "insert into users(name,email,password,phone,address) values(?,?,?,?,?)";
        $res = $conn->prepare($sql);
        $res->execute([$name, $email, $password, $phone, $address]);
        echo "<div class='alert alert-success' role='alert'>User Created Successfully!!!<a href='login.php' class='btn btn-outline-success'>OK</a></div>";
    }
}
?>

<section class="row mt-4">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h2>Register</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label>Name</label><br>
                        <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $name;?>"/>
                        <small class="text-danger"><?php echo $errName; ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label><br>
                        <input type="text" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $email;?>" />
                        <small class="text-danger"><?php echo $errEmail; ?></small>
                        <small class="text-danger"><?php echo $invalidEmail; ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label><br>
                        <input type="password" name="password" class="form-control" placeholder="password"/>
                        <small class="text-danger"><?php echo $errPsw; ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Phone</label><br>
                        <input type="text" name="phone" class="form-control" placeholder="09*********" value="<?php echo $phone;?>"/>
                        <small class="text-danger"><?php echo $errPhone; ?></small>
                        <small class="text-danger"><?php echo $invalidPhone; ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Address</label><br>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address;?>"/>
                        <small class="text-danger"><?php echo $errAddress; ?></small>
                    </div>
                    <div class="d-grid mt-4 mb-3">
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <div class="text-center text-primary">
                    <a href="login.php" class="text-decoration-none">Already have an account?</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
