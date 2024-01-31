<?php
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];


    require_once 'conn.php';

    $sql = "select * from userlist where Email = '$email' or Phone_number ='$email'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $user_email = $row["Email"];
    $user_phone_num = $row["Phone_number"];
    $user_password = $row["Password"];

    if (($user_email == $email || $user_phone_num == $email) && $user_password == $password) {
        $sql = "select Usertype from users where Email = '$email' or Phone_number ='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usertype = $row["Usertype"];
            if ($usertype == "user") {
                setcookie('User_email', $email, time() + 60 * 60 * 24 * 30);
                setcookie('User_password', $password, time() + 60 * 60 * 24 * 30);

                header("Location: home.php?category=default");
            }
        }
    } else {
        header("Location: index.php?action=invalid");
    }
}
