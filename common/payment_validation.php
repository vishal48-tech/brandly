<?php
$card_num_spaces = $card_num = $expiry = $cvc = $amount = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get all data from form
  $card_num_spaces = $_POST['credit_num'];
  $expiry = $_POST['expiry'];
  $cvc = $_POST['cvc'];
  $amount = $_POST['amount'];

  // Remove spaces from card number
  $card_num = str_replace(" ", "", $card_num_spaces);

  if ($_GET) {
    // Get all data from uri
    $pro_id = $_GET['product-id'];
    $quantity = $_GET['quantity'];
  }

  require_once 'conn.php';

  // Get data from database
  $sql = "SELECT `Card_number`, `Expiry_date`, `CVC`, `Balance` FROM `mastercard_users` WHERE `Card_number` = '$card_num'";
  $result = $conn->query($sql);

  // Check if we get any row or not
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $user_card_num = $row['Card_number'];
    $card_expiry = $row['Expiry_date'];
    $card_cvc = $row['CVC'];
    $balance = $row['Balance'];

    if ($card_expiry != $expiry || $card_cvc != $cvc) {
      header("Location: payment.php?product-id=$pro_id&price=$price&quantity=$quantity&action=invalid-details&payment=online");
      exit();
    }

    $price = $amount / $quantity;

    // Check if balance < product's amount
    if ($balance < $amount) {
      header("Location: payment.php?product-id=$pro_id&price=$price&quantity=$quantity&action=insufficient-balance&payment=online");
    } else {
      // Set new balance
      $new_balance = $balance - $amount;

      // Update balance in database
      $sql = "UPDATE `mastercard_users` SET `Balance`='$new_balance' WHERE `Card_number` = '$card_num'";
      $result = $conn->query($sql);

      // Get quantity from database
      $sql = "SELECT `Quantity` FROM `products` WHERE `Product_ID` = '$pro_id'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      $pro_quantity = $row['Quantity'];

      // Set new quantity
      $new_quantity = $pro_quantity - $quantity;

      // Update quantity in database
      $sql = "UPDATE `products` SET `Quantity`='$new_quantity' WHERE `Product_ID` = '$pro_id'";
      $result = $conn->query($sql);

      // Get user email if set
      if (isset($_COOKIE['User_email'])) {
        $user = $_COOKIE['User_email'];
      }

      // Get data from database
      $sql = "SELECT `Email`, `Phone_number` FROM `users` WHERE `Email` = '$user' OR `Phone_number` = '$user'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      $user_email = $row['Email'];
      $user_phone = $row['Phone_number'];

      // Insert values into database
      $sql = "INSERT INTO `users_cart`(`User_email`, `User_phone_num`, `Product_ID`, `Product_Quantity`) VALUES ('$user_email','$user_phone','$pro_id','$quantity')";
      $result = $conn->query($sql);

      header("Location: payment.php?product-id=$pro_id&price=$price&quantity=$quantity&action=success&payment=online");
    }
  } else {
    header("Location: payment.php?product-id=$pro_id&price=$price&quantity=$quantity&action=card-not-found&payment=online");
  }
}
