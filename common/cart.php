<?php
if (!isset($_COOKIE['User_email']) && !isset($_COOKIE['User_password'])) {
  header('Location: index.php');
}

include "menubar.php";
include "scroll_top.php";

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

      $grid_row = $status == 'Delivering' ? 'lg:grid-rows-4' : 'lg:grid-rows-3';
      $hidden = $status == 'Delivering' ? '' : 'hidden';
      $bg_color = $status == 'Delivering' ? 'bg-amber-200' : 'bg-emerald-200';

      $sql = "SELECT `Product_Name`, `Image`, `Price` FROM `products` WHERE `Product_ID` = '$pro_id'";
      $result2 = $conn->query($sql);

      while ($row = $result2->fetch_assoc()) {
        $pro_name = $row['Product_Name'];
        $pro_image = $row['Image'];
        $price = $row['Price'];
        $pro_price = $price + 20;

        $sql = "SELECT `Address` FROM `userlist` WHERE `Email` = '$user' OR `Phone_number` = '$user'";
        $result3 = $conn->query($sql);

        while ($row = $result3->fetch_assoc()) {
          $address = $row['Address'];

          echo '<div class="' . $bg_color . ' shadow-lg ring-1 ring-black ring-opacity-5 rounded-lg py-5 px-3 md:px-10">

      <div class="flex flex-row">
        <h1 class="font-bold">Order ID:</h1>
        <p class="px-2 font-semibold">' . $order_id . '</p>
      </div>

      <div class="grid ' . $grid_row . ' gap-y-5">
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
            <p class="font-semibold">' . $address . '</p>
          </div>

        </div>

        <div class="flex items-center justify-end ' . $hidden . '">
          <a id href="cart.php?action=cancel-order&order-id=' . $order_id . '" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:w-auto transition ease duration-500">Cancel order</a>
        </div>

      </div>
    </div>';
        }
      }
    }
    echo '</div>';
  } else {
    echo '<div class="w-full group relative lg:px-20 py-5 px-3 flex flex-col gap-y-10">
            <div class="flex justify-center">
              <h1 class="font-semibold text-5xl">No orders yet</h1>
            </div>
          </div>';
  }
  ?>
</body>

</html>

<?php
if ($_GET) {
  $order = $_GET['order-id'];
  $action = $_GET["action"];
  if ($action == "cancel-order") {
    echo '<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Cancel order</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">Are you sure you want to cancel your order? This action cannot be undone.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition ease duration-500" onclick="window.location.href=`cancel_order.php?order-id=' . $order . '`">Yes</button>
            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-10 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-300 sm:mt-0 sm:w-auto transition ease duration-500" onclick="window.location.href=`javascript:history.back()`">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>';
  } else if ($action == 'delete-order-cash') {
    echo '<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-green-600 bi bi-check2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" aria-hidden="true" stroke="currentColor" stroke-width="1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
            </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Order cancelled</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">Your order has been cancelled. You can check out for other products.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
            <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto transition ease duration-500" onclick="window.location.href=`cart.php`">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>';
  } else if ($action == 'delete-order-online') {
    echo '<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-green-600 bi bi-check2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" aria-hidden="true" stroke="currentColor" stroke-width="1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
            </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Order cancelled</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">Your order has been cancelled. Your money has been returned.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
            <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto transition ease duration-500" onclick="window.location.href=`cart.php`">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>';
  }
}
