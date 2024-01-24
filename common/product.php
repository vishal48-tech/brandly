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
  }
  ?>

</body>

</html>