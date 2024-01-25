<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="SVG/logo.svg">
</head>

<body>

  <?php
  include "menubar.php";
  ?>
  <div class="relative z-20 hidden" id="side-panel">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
          <div class="pointer-events-auto relative w-screen max-w-md">
            <div class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4">
              <button type="button" class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white transition ease duration-500" id="close-btn">
                <span class="absolute -inset-2.5"></span>
                <span class="sr-only">Close panel</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
              <div class="px-4 sm:px-6">
                <h2 class="text-base font-semibold leading-6 text-gray-900">Select a category</h2>
              </div>
              <div class="relative mt-6 flex flex-wrap gap-x-3 gap-y-5 px-4 sm:px-6">
                <a href="home.php?category=default" class="bg-gray-200 hover:opacity-75 py-1 px-3 rounded-lg transition ease duration-500">Default</a>
                <a href="home.php?category=monitor" class="bg-gray-200 hover:opacity-75 py-1 px-3 rounded-lg transition ease duration-500">Monitor</a>
                <a href="home.php?category=mouse" class="bg-gray-200 hover:opacity-75 py-1 px-3 rounded-lg transition ease duration-500">Mouse</a>
                <a href="home.php?category=keyboard" class="bg-gray-200 hover:opacity-75 py-1 px-3 rounded-lg transition ease duration-500">Keyboard</a>
                <a href="home.php?category=television" class="bg-gray-200 hover:opacity-75 py-1 px-3 rounded-lg transition ease duration-500">Television</a>
                <a href="home.php?category=book" class="bg-gray-200 hover:opacity-75 py-1 px-3 rounded-lg transition ease duration-500">Book</a>
                <a href="home.php?category=smartphone" class="bg-gray-200 hover:opacity-75 py-1 px-3 rounded-lg transition ease duration-500">Smartphone</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "scroll_top.php";
  ?>

  <script>
    let side_panel = document.getElementById('side-panel');
    let close_btn = document.getElementById('close-btn');
    let category_btn = document.getElementById('category-btn');
    let category_btn2 = document.getElementById('category-btn2');

    category_btn.addEventListener('click', function() {
      side_panel.classList.remove('hidden');
    });
    category_btn2.addEventListener('click', function() {
      side_panel.classList.remove('hidden');
    });
    close_btn.addEventListener('click', () => {
      side_panel.classList.add('hidden');
    });
  </script>
</body>

</html>

<?php
if ($_GET) {
  $category = $_GET["category"];
  if ($category == "default") {
    require_once "conn.php";

    $sql = "SELECT `Product_ID`,`Product_Name`, `Image`, `Price`, `Quantity` FROM `products` WHERE `Quantity` != '0'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="bg-white">
<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:pt-24 lg:max-w-7xl lg:px-8">
  <h2 class="text-2xl font-bold tracking-tight text-gray-900">Available products</h2>
  <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">';

      while ($row = $result->fetch_assoc()) {
        $pro_name = $row["Product_Name"];
        $image = $row["Image"];
        $price = $row["Price"];
        $quantity = $row["Quantity"];
        $pro_id = $row["Product_ID"];
        $modified_price = $price + 20;

        echo '<div class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 h-60 transition ease duration-500">
            <img src="' . $image . '" alt="" loading="lazy" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="product.php?product-id=' . $pro_id . '">
                  <span aria-hidden="true" class="absolute inset-0"></span>
      ' . $pro_name . '
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">Stocks left: ' . $quantity . '</p>
            </div>
            <p class="text-sm font-medium text-gray-900">₹ ' . $modified_price . '</p>
          </div>
        </div>
      ';
      }

      echo '</div>
    </div>
  </div>
        ';
    }
  } else if ($category == $category) {
    require_once "conn.php";

    $sql = "SELECT `Product_ID`,`Product_Name`, `Image`, `Price`, `Quantity` FROM `products` WHERE `Category` = '$category' AND `Quantity` != '0'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="bg-white">
<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:pt-24 lg:max-w-7xl lg:px-8">
  <h2 class="text-2xl font-bold tracking-tight text-gray-900">' . ucfirst($category) . 's</h2>
  <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">';

      while ($row = $result->fetch_assoc()) {
        $pro_name = $row["Product_Name"];
        $image = $row["Image"];
        $price = $row["Price"];
        $quantity = $row["Quantity"];
        $pro_id = $row["Product_ID"];
        $modified_price = $price + 20;

        echo '<div class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 h-60 transition ease duration-500">
            <img src="' . $image . '" alt="" loading="lazy" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="product.php?product-id=' . $pro_id . '">
                  <span aria-hidden="true" class="absolute inset-0"></span>
      ' . $pro_name . '
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">Stocks left: ' . $quantity . '</p>
            </div>
            <p class="text-sm font-medium text-gray-900">₹ ' . $modified_price . '</p>
          </div>
        </div>
      ';
      }

      echo '</div>
    </div>
  </div>
        ';
    } else {
      echo '<div class="bg-white">
<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:pt-24 lg:max-w-7xl lg:px-8">
  <h2 class="text-2xl font-bold tracking-tight text-gray-900">No items found for ' . $category . '</h2>
  </div>';
    }

    $sql = "SELECT `Product_ID`,`Product_Name`, `Image`, `Price`, `Quantity` FROM `products` WHERE `Category` != '$category' AND `Quantity` != '0'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="bg-white">
<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:pt-24 lg:max-w-7xl lg:px-8">
  <h2 class="text-2xl font-bold tracking-tight text-gray-900">Available products</h2>
  <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">';

      while ($row = $result->fetch_assoc()) {
        $pro_name = $row["Product_Name"];
        $image = $row["Image"];
        $price = $row["Price"];
        $quantity = $row["Quantity"];
        $pro_id = $row["Product_ID"];
        $modified_price = $price + 20;

        echo '<div class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 h-60 transition ease duration-500">
            <img src="' . $image . '" alt="" loading="lazy" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="product.php?product-id=' . $pro_id . '">
                  <span aria-hidden="true" class="absolute inset-0"></span>
      ' . $pro_name . '
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">Stocks left: ' . $quantity . '</p>
            </div>
            <p class="text-sm font-medium text-gray-900">₹ ' . $modified_price . '</p>
          </div>
        </div>
      ';
      }

      echo '</div>
    </div>
  </div>
        ';
    }
  }
}
