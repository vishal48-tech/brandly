<?php
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'conn.php';

    $sql = "select * from userlist where Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE `userlist` SET `Password`='$password' WHERE `Email` = '$email' OR `Phone_number` = '$email'";
        $result = $conn->query($sql);

        setcookie('User_email', $email, time() + 60 * 60 * 24 * 30);
        setcookie('User_password', $password, time() + 60 * 60 * 24 * 30);
        header("Location: change_pass.php?action=changed");
    } else {
        header("Location: change_pass.php?action=invalid");
    }
}
