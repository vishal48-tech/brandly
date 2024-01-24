<?php

function generateRandomNumber()
{
    $min = 100000;
    $max = 999999;
    return mt_rand($min, $max);
}

$pro_name = $pro_image = $pro_desc = $pro_price = $pro_quantity = $address = $phone_num = "";
$pro_id = generateRandomNumber();

$target_dir = "Product_images/"; // Specify the target directory for storing the uploaded images
$target_file = $target_dir . basename($_FILES["p_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pro_name = $_POST["p_name"];
    $pro_desc = $_POST["p_desc"];
    $pro_price = $_POST["p_price"];
    $pro_quantity = $_POST["p_quantity"];
    $pro_category = $_POST["p_category"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $check = getimagesize($_FILES["p_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Move the uploaded file to the target directory
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {

            // Insert the file details into the database
            $pro_image = $target_file;

            require_once 'conn.php';

            $sql = "select Product_ID from products where Product_ID = '$pro_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                do {
                    $pro_id = generateRandomNumber();
                } while ($result->num_rows > 0);
            }

            $sql = "INSERT INTO `products`(`Product_ID`, `Product_Name`, `Image`, `Description`, `Price`, `Quantity`, `Category`, `Seller_Name`, `Address`, `Phone_Number`) VALUES ('$pro_id','$pro_name','$pro_image','$pro_desc','$pro_price','$pro_quantity','$pro_category','$name','$address','$phone')";
            $result = $conn->query($sql);

            header('Location: sell.php?action=success');
        }
    } else {
        header('Location: sell.php?action=invalid-image');
    }
}
