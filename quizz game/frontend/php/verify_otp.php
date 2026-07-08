<?php
session_start();

require("../php/database.php");

$email = $_POST['email'];
$otp = $_POST['otp'];

$check_otp = $db->query("SELECT * FROM users WHERE email='$email'AND otp='$otp'");

if($check_otp->num_rows > 0)
{
    echo "success";
     $_SESSION['user_email'] = $email;
}
else
{
    echo "failed";
}

?>