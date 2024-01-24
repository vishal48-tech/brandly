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

      echo '<div class="lg:grid lg:grid-cols-2 p-5 lg:p-20">
        <div class="lg:p-10 aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden rounded-lg">
            <img src="' . $image . '" alt="" class="h-full w-full object-cover object-center">
        </div>
        <div class="flex flex-col py-3">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl lg:px-10 py-4">' . $pro_name . '</h1>
            <p class="text-3xl tracking-tight text-gray-900 lg:px-10 py-3">₹ ' . $price . '</p>
            <p class="text-base text-gray-900 lg:px-10 py-2">' . $desc . '</p>
            <div class="flex gap-x-2 lg:px-10 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                <p class="text-md text-gray-600">In stock and ready to ship</p>
            </div>
            <a href="payment.php" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease duration-500">Add to cart</a>
        </div>
    </div>';
    }
  }
  ?>

  <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="w-full mt-3 sm:ml-4 sm:mt-0 sm:text-left">
                <div class="block w-full flex justify-end -mt-5">
                  <p class="cursor-default opacity-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <button class="rounded-md p-1 focus:ring-2 focus:ring-indigo-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
                <form action="" class="flex flex-col gap-y-3 mt-5" method="post">
                  <input type="radio" name="payment" id="option1" value="online" class="absolute top-0 left-0">
                  <input type="radio" name="payment" id="option2" value="cash" class="absolute top-0 right-0">
                  <input type="button" value="Online payment" id="btn-1" class="w-full border-2 ring-2 ring-transparent p-4 rounded-lg text-xl font-semibold hover:cursor-pointer focus:ring-indigo-500 transition ease duration-500">
                  <input type="button" value="Cash on delivery" id="btn-2" class="w-full border-2 ring-2 ring-transparent p-4 rounded-lg text-xl font-semibold hover:cursor-pointer focus:ring-indigo-500 transition ease duration-500">
                  <div class="mt-5">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white p-2 rounded-lg text-xl font-normal transition ease duration-500">Buy</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    let radio1 = document.getElementById('option1');
    let radio2 = document.getElementById('option2');
    let btn1 = document.getElementById('btn-1');
    let btn2 = document.getElementById('btn-2');

    btn1.addEventListener('click', function() {
      radio1.checked = true;
    });
    btn2.addEventListener('click', function() {
      radio2.checked = true;
    });
  </script>

</body>

</html>