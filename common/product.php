<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="SVG/logo.svg">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Brandly</title>
</head>

<body class="h-full bg-white">
  <?php
  if ($_GET) {
    $pro_id = $_GET["product-id"];
    if ($pro_id == $pro_id) {

      require_once "conn.php";

      $sql = "SELECT `Product_Name`, `Image`, `Price`, `Description` FROM `products` WHERE `Product_ID` = '$pro_id'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      $pro_name = $row["Product_Name"];
      $image = $row["Image"];
      $price = $row["Price"];
      $desc = $row["Description"];
      $modified_price = $price + 20;

      echo '<div class="lg:grid lg:grid-cols-2 p-5 lg:p-20">
        <div class="lg:p-10 aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden rounded-lg">
            <img src="' . $image . '" alt="" class="h-full w-full object-cover object-center">
        </div>
        <div class="flex flex-col py-3">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl lg:px-10 py-4">' . $pro_name . '</h1>
            <p class="text-3xl tracking-tight text-gray-900 lg:px-10 py-3">₹ ' . $modified_price . '</p>
            <p class="text-base text-gray-900 lg:px-10 py-2">' . $desc . '</p>
            <div class="flex gap-x-2 lg:px-10 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                <p class="text-md text-gray-600">In stock and ready to ship</p>
            </div>
            <form action="pay_method.php?product-id=' . $pro_id . '&price=' . $modified_price . '" method="post">
              <div class="py-2 lg:px-10">
                <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
                  <div class="mt-2">
                    <input id="quantity" name="quantity" type="number" min="1" value="1" autocomplete="off" required class="block w-20 rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 font-semibold placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
                  </div>
              </div>
              <button class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease duration-500">Add to cart</button>
            </form>
        </div>
    </div>';
    }
    if (isset($_GET['action'])) {
      $action = $_GET['action'];
      if ($action == 'not-enough-stocks') {
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
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Not enough stocks</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">Reduce the quantity to continue with shopping.</p>
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
      }
    }
  }
  ?>

</body>

</html>