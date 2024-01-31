<?php
$email = $name = $phone_number = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $phone_number = $_POST["phone"];
    $address = $_POST["address"];

    require_once 'conn.php';

    $sql = "select * from userlist where Email = '$email' and Phone_number ='$phone_number'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $user2_email = $row["Email"];
    $user2_phone_num = $row["Phone_number"];

    $sql = "select * from userlist where Email = '$email' or Phone_number ='$phone_number'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $user_email = $row["Email"];
    $user_phone_num = $row["Phone_number"];

    if ($user2_email == $email && $user2_phone_num == $phone_number) {
        header("Location: register.php?action=email-phone-registered");
    } else if ($user_email == $email) {
        header("Location: register.php?action=email-registered");
    } else if ($user_phone_num == $phone_number) {
        header("Location: register.php?action=phone-registered");
    } else {
        setcookie('User_email', $email, time() + 60 * 60 * 24 * 30);
        setcookie('User_password', $password, time() + 60 * 60 * 24 * 30);

        $sql = "insert into userlist(Name, Email, Phone_number, Password, Address) values ('$name','$email','$phone_number','$password','$address')";
        $result = $conn->query($sql);

        $sql = "INSERT INTO `users`(`Email`, `Phone_number`, `Usertype`) VALUES ('$email','$phone_number','user')";
        $result = $conn->query($sql);

        header("Location: home.php?category=default");
    }
}
