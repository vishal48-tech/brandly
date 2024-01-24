<?php
if (isset($_COOKIE['User_email'])) {
    $email = $_COOKIE['User_email'];

    require_once 'conn.php';

    $sql = "select Email,Phone_Number from userlist where Email = '$email' or Phone_Number = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "DELETE FROM `userlist` WHERE Email = '$email' or Phone_Number = '$email'";
        $result = $conn->query($sql);

        $sql = "DELETE FROM `users` WHERE Email = '$email' or Phone_Number = '$email'";
        $result = $conn->query($sql);

        header("Location: index.php");
    }
}
