<?php
$email = $_COOKIE['User_email'];
$password = $_COOKIE['User_password'];

setcookie('User_email', $email, time() - 60);
setcookie('User_password', $password, time() - 60);

header("Location: index.php");