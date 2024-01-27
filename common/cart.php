<?php
include "menubar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


  <?php
  require_once "conn.php";

  if (isset($_COOKIE['User_email'])) {
    $user = $_COOKIE['User_email'];
  }

  $sql = "SELECT `Order_ID`, `Product_ID`, `Product_Quantity`, `Status` FROM `users_cart` WHERE `User_email` = '$user' OR `User_phone_num` = '$user'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    echo '<div class="w-full group relative lg:px-20 py-5 px-3 flex flex-col gap-y-10">

    <div class="flex justify-center">
      <h1 class="font-semibold text-5xl">Order details</h1>
    </div>';

    while ($row = $result->fetch_assoc()) {
      $order_id = $row['Order_ID'];
      $pro_id = $row['Product_ID'];
      $pro_quantity = $row['Product_Quantity'];
      $status = $row['Status'];

      $sql = "SELECT `Product_Name`, `Image`, `Price` FROM `products` WHERE `Product_ID` = '$pro_id'";
      $result = $conn->query($sql);
      
      while ($row = $result->fetch_assoc()) {
        $pro_name = $row['Product_Name'];
        $pro_image = $row['Image'];
        $pro_price = $row['Price'];

        echo '<div class="bg-slate-200 shadow-lg ring-1 ring-black ring-opacity-5 rounded-lg py-5 px-3 md:px-10">

      <div class="flex flex-row">
        <h1 class="font-bold">Order ID:</h1>
        <p class="px-2 font-semibold">' . $order_id . '</p>
      </div>

      <div class="grid lg:grid-rows-4 gap-y-5">
        <div class="grid lg:grid-cols-5 mt-3 lg:row-span-3 gap-y-5 md:grid-cols-3 gap-x-3">

          <div class="h-64 md:h-40 flex md:justify-start lg:justify-start justify-center">
            <img class="h-full w-72 md:w-48 object-cover object-center rounded-lg" src="' . $pro_image . '" alt="">
          </div>

          <div class="flex flex-col gap-y-2 md:col-span-2">
            <h1 class="font-bold text-2xl">' . $pro_name . '</h1>
            <p class="font-bold text-xl">₹ ' . $pro_price . '</p>
            <div class="flex flex-row">
              <h1 class="font-bold">Status: </h1>
              <p class="px-2 font-semibold">' . $status . '</p>
            </div>
            <div class="flex flex-row">
              <h1 class="font-bold">Quantity: </h1>
              <p class="px-2 font-semibold">' . $pro_quantity . '</p>
            </div>
          </div>

          <div class="flex flex-col gap-y-2 md:col-span-3 lg:col-span-2">
            <h1 class="font-bold text-xl">Delivery Address</h1>
            <p class="font-semibold">103, Shivdhara Flat opp. Behrampura post oofice, Ahmedabad, Gujarat</p>
          </div>

        </div>

        <div class="flex items-center justify-end">
          <a href="" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:w-auto transition ease duration-500">Cancel order</a>
        </div>

      </div>
    </div>
  </div>';
      }
    }
  }
  ?>
</body>

</html>

<?php
include "scroll_top.php";
?>