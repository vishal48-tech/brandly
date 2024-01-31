<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="SVG/logo.svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Brandly</title>
</head>

<body class="h-full bg-white">

    <?php

    require_once "conn.php";

    if ($_GET) {
        $order_id = $_GET["order-id"];

        // Get required data from database
        $sql = "SELECT `Product_ID`, `Product_Quantity`, `Payment_type`, `Card_num` FROM `users_cart` WHERE `Order_ID` = '$order_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $pay_type = $row['Payment_type'];
        $pro_id = $row['Product_ID'];
        $pro_quantity = $row['Product_Quantity'];
        $card_num = $row['Card_num'];

        if ($pay_type == 'online') {
            // Get user's balance
            $sql = "SELECT `Balance` FROM `mastercard_users` WHERE `Card_number` = '$card_num'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $user_balance = $row['Balance'];

            // Get admin's balance
            $sql = "SELECT `Balance` FROM `mastercard_users` WHERE `Card_number` = '9120384293788743'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $admin_balance = $row['Balance'];

            // Get product's price
            $sql = "SELECT `Price` FROM `products` WHERE `Product_ID` = '$pro_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $pro_price = $row['Price'];

            // Update balance
            $new_user_balance = $user_balance + $pro_price;
            $new_admin_balance = $admin_balance - $pro_price;

            // Update user's balance
            $sql = "UPDATE `mastercard_users` SET `Balance`='$new_user_balance' WHERE `Card_number` = '$card_num'";
            $result = $conn->query($sql);

            // Update admin's balance
            $sql = "UPDATE `mastercard_users` SET `Balance`='$new_admin_balance' WHERE `Card_number` = '9120384293788743'";
            $result = $conn->query($sql);

            // Get product's quantity
            $sql = "SELECT `Quantity` FROM `products` WHERE `Product_ID` = '$pro_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            // Set product's new quantity
            $quantity = $row['Quantity'];
            $new_quantity = $pro_quantity + $quantity;

            // Update product's quantity
            $sql = "UPDATE `products` SET `Quantity`='$new_quantity' WHERE `Product_ID` = '$pro_id'";
            $result = $conn->query($sql);

            // Delete order
            $sql = "DELETE FROM `users_cart` WHERE `Order_ID` = '$order_id'";
            $result = $conn->query($sql);

            header("Location: cart.php?action=delete-order-online&order-id=$order_id");
        } else if ($pay_type == 'cash') {

            // Get product's quantity
            $sql = "SELECT `Quantity` FROM `products` WHERE `Product_ID` = '$pro_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            // Set product's new quantity
            $quantity = $row['Quantity'];
            $new_quantity = $pro_quantity + $quantity;

            // Update product's quantity
            $sql = "UPDATE `products` SET `Quantity`='$new_quantity' WHERE `Product_ID` = '$pro_id'";
            $result = $conn->query($sql);

            // Delete order
            $sql = "DELETE FROM `users_cart` WHERE `Order_ID` = '$order_id'";
            $result = $conn->query($sql);

            header("Location: cart.php?action=delete-order-cash&order-id=$order_id");
        }
    }

    ?>

</body>

</html>