<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    if (empty($name)) {
        echo "Please Enter Your Name";
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Welcome " . $name;
        }
    }
}
