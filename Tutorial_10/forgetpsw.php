<?php
include("include/header.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';
$errEmail = "";
$resetError = "";

$file = "resetpsw.php";
$path = getcwd();
$getexplode = explode(DIRECTORY_SEPARATOR, $path);
$searchFilepath = array_search("htdocs", $getexplode);
$currentFolder = array_slice($getexplode, ($searchFilepath + 1));
$connectFilepath = join("/", $currentFolder);
$getFile = "localhost" . DIRECTORY_SEPARATOR . $connectFilepath . DIRECTORY_SEPARATOR . $file;

if (isset($_POST["send"])) {
    $token = uniqid();
    if ($_POST['email'] == null) {
        $errEmail = "Please Enter Your Email!!!";
    } elseif (((!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))) {
        $errEmail = "Invalid Email Format!!!";
    } elseif (((!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))) {
        $email = $_POST['email'];
        $sql = "select email from users where email=?";
        $res = $conn->prepare($sql);
        $res->execute([$email]);
        $data = $res->fetch();
        if ($data > 0) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'thethtarsoe2761@gmail.com';
                $mail->Password   = 'bkslnszvelrlqlvy';  //gmail app psw
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('thethtarsoe2761@gmail.com');
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);
                $mail->Subject = "Reset Password";
                $mail->Body = "<a href='http:://$getFile?token=$token' id='anchor-link' onclick='dieLink(this)'>Here Is To Reset Your Password</a>";
                $mail->send();
                echo "<div class='alert alert-success d-flex justify-content-between' role='alert'><h6>Email has sent successfully!!!</h6><a href='forgetpsw.php' class='btn btn-outline-secondary'>&times;</a></div>";
                session_start();
                $_SESSION['email'] = $_POST["email"];
                $_SESSION['token'] = $token;
            } catch (Exception $e) {
                echo "<div class='alert alert-danger d-flex justify-content-between'><h6>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</h6><a href='forgetpsw.php' class='btn btn-outline-secondary'>&times;</a></div>";
            }
        } else {
            $errEmail = "Your Email Does Not Match With Any User!!!";
        }
    }
}
?>
<?php if (isset($_GET["error"])) {
    $resetError =  "<div class='alert alert-danger d-flex justify-content-between' role='alert'><h6>Email've been already sent!!!</h6><a href='forgetpsw.php' class='btn btn-outline-secondary'>&times;</a></div>";
} ?>
<section class="row mt-4">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h2>Forget Password</h2>
            </div>
            <form action="" method="POST">
                <div class="card-body">
                    <?php echo $resetError; ?>
                    <div class="form-group mb-3">
                        <label>Email</label><br>
                        <input type="text" name="email" class="form-control" placeholder="name@example.com" />
                        <small class="text-danger"><?php echo $errEmail; ?></small>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="login.php" class="text-primary text-decoration-none">Login</a>
                    <button type="submit" name="send" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</section>
</body>

</html>
