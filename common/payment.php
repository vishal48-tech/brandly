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
  $payment = "";

  // Get payment mode from form
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $payment = $_POST['payment'];
  }

  if ($_GET) {
    // Get Product - ID, price and quantity
    $pro_id = $_GET['product-id'];
    $price = $_GET['price'];
    $quantity = $_GET['quantity'];

    // Get payment from uri if present
    if (isset($_GET['payment'])) {
      $payment = $_GET['payment'];
    }

    // Get action from uri if present
    if (isset($_GET['action'])) {
      $action = $_GET['action'];

      if ($action == "insufficient-balance") {
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
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Insufficient balance</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">You don\'t have enough balance to buy this product.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
              <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto" onclick="window.location.href = `javascript:history.back()`">OK</button>
            </div>
          </div>
        </div>
      </div>
    </div>
      ';
      } else if ($action == "card-not-found") {
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
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Card not found</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">We can\'t found your card. Check if you entered the correct card number.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
              <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto" onclick="window.location.href = `javascript:history.back()`">OK</button>
            </div>
          </div>
        </div>
      </div>
    </div>
      ';
      } else if ($action == "invalid-details") {
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
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Invalid details</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">Expiry date or CVC is invalid. Enter valid data.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
              <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto" onclick="window.location.href = `javascript:history.back()`">OK</button>
            </div>
          </div>
        </div>
      </div>
    </div>
      ';
      } else if ($action == "success") {
        echo '<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
              class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div
                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-green-600 bi bi-check2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" aria-hidden="true" stroke="currentColor" stroke-width="1">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                    </svg>
                  </div>
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Payment successful</h3>
                    <div class="mt-2">
                      <p class="text-sm text-gray-500">Thanks for buying. Item added to your cart.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
                <button type="button"
                  class="inline-flex w-full justify-center rounded-md bg-blue-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto"
                  onclick="window.location.href = `cart.php`">OK</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      ';
      }
    }
  }


  if ($payment == 'online') {
    // Display payment form if payment mode is online
    echo '<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm grid place-items-center">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Payment</h2>
        <img src="Mastercard-Logo.webp" alt="" class="h-16 mt-2">
      </div>
  
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="payment_validation.php?product-id=' . $pro_id . '&quantity=' . $quantity . '" method="POST">
  
          <!-- Card number -->
          <div>
            <label for="credit_num" class="block text-sm font-medium leading-6 text-gray-900">Card number</label>
            <div class="mt-2">
              <input id="credit_num" name="credit_num" type="text" autocomplete="off" required pattern="\d{4}\s\d{4}\s\d{4}\s\d{4}" placeholder="XXXX XXXX XXXX XXXX" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
            </div>
          </div>
  
          <!-- Expiry -->
          <div>
            <label for="expiry" class="block text-sm font-medium leading-6 text-gray-900">Expiry date</label>
            <div class="mt-2">
              <input id="expiry" name="expiry" type="text" autocomplete="off" required pattern="(0[1-9]|1[0-2])/\d{4}" placeholder="XX/XXXX" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
            </div>
          </div>
  
          <!-- CVC -->
          <div>
            <label for="cvc" class="block text-sm font-medium leading-6 text-gray-900">CVC</label>
            <div class="mt-2">
              <input id="cvc" name="cvc" type="password" autocomplete="off" required pattern="\d{3}" placeholder="XXX" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
            </div>
          </div>
  
          <!-- Amount -->
          <div>
            <label for="amount" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
            <div class="mt-2">
                <input id="amount" name="amount" type="text" readonly value="' . $price * $quantity . '" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 font-semibold placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
            </div>
          </div>
  
          <!-- Submit -->
          <div>
            <button type="submit" id="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition ease duration-500">Pay</button>
          </div>
        </form>
      </div>
        ';
  } else if ($payment == 'cash') {

    function generateRandomNumber()
    {
      $min = 100000;
      $max = 999999;
      return mt_rand($min, $max);
    }

    $order_id = generateRandomNumber();

    require_once 'conn.php';

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

    // Get order ID from database
    $sql = "SELECT `Order_ID` FROM `users_cart` WHERE `Order_ID` = '$order_id'";
    $result = $conn->query($sql);

    // Check for same order ID
    if ($result->num_rows > 0) {
      do {
        $order_id = generateRandomNumber();
      } while ($result->num_rows > 0);
    }

    // Insert values into database
    $sql = "INSERT INTO `users_cart`(`Order_ID`, `User_email`, `User_phone_num`, `Product_ID`, `Product_Quantity`, `Payment_type`) VALUES ('$order_id','$user_email','$user_phone','$pro_id','$quantity','cash')";
    $result = $conn->query($sql);

    echo '<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
          class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div
                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-green-600 bi bi-check2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" aria-hidden="true" stroke="currentColor" stroke-width="1">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Item added</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">Thanks for buying. Item added to your cart.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
            <button type="button"
              class="inline-flex w-full justify-center rounded-md bg-blue-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto"
              onclick="window.location.href = `cart.php`">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
    ';
  }

  ?>

</body>

</html>