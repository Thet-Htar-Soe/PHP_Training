<?php
$psw = password_hash("hiiamthethtarsoe", PASSWORD_BCRYPT);
// echo $psw;
if (password_verify("hiiamthethtarsoe", $psw)) {
    echo "yes";
}
