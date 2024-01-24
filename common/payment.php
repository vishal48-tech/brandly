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

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $payment = $_POST['payment'];

    if ($_GET) {
      $price = $_GET['price'];
      $quantity = $_GET['quantity'];
    }

    if ($payment == 'online') {
      echo '<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Payment</h2>
      </div>
  
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="payment_validation.php" method="POST">
  
          <!-- Credit number -->
          <div>
            <label for="credit_num" class="block text-sm font-medium leading-6 text-gray-900">Credit card number</label>
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
              <input id="amount" name="amount" type="text" disabled value="₹ ' . $price * $quantity . '" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 font-semibold placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
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
    }
  }
  ?>
</body>

</html>