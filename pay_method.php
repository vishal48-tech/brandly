<?php
if (!isset($_COOKIE['User_email']) && !isset($_COOKIE['User_password'])) {
  header('Location: index.php');
}
?>

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
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST["quantity"];

    if ($_GET) {
      $pro_id = $_GET['product-id'];
      $price = $_GET['price'];
    }

    require_once 'conn.php';

    $sql = "SELECT `Quantity` FROM `products` WHERE `Product_ID` ='$pro_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $pro_quantity = $row['Quantity'];

    if ($pro_quantity < $quantity) {
      header('Location: product.php?product-id=' . $pro_id . '&action=not-enough-stocks');
    }

    $sql = '';
  }

  ?>

  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Select payment method</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form action="payment.php?product-id=<?php echo $pro_id . '&price=' . $price . '&quantity=' . $quantity ?>" class="flex flex-col gap-y-3 mt-5" method="post">

        <input type="radio" name="payment" id="option1" value="online" class="absolute top-0 left-0 opacity-0" checked>

        <input type="radio" name="payment" id="option2" value="cash" class="absolute top-0 right-0 opacity-0">

        <input type="button" value="Online payment" id="btn-1" class="w-full border-2 border-gray-400 ring-2 ring-transparent p-4 rounded-lg text-xl font-semibold hover:cursor-pointer focus:ring-indigo-500 focus:border-indigo-500 transition ease duration-500">

        <input type="button" value="Cash on delivery" id="btn-2" class="w-full border-2 border-gray-400 ring-2 ring-transparent p-4 rounded-lg text-xl font-semibold hover:cursor-pointer focus:ring-indigo-500 focus:border-indigo-500 transition ease duration-500">

        <div class="mt-5">
          <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white p-2 rounded-lg text-xl font-normal transition ease duration-500">Continue</button>
        </div>

      </form>
    </div>
  </div>

  <script>
    let radio1 = document.getElementById('option1');
    let radio2 = document.getElementById('option2');
    let btn1 = document.getElementById('btn-1');
    let btn2 = document.getElementById('btn-2');

    btn1.addEventListener('click', function() {
      radio1.checked = true;
      if (radio1.checked == true) {
        btn1.classList.add('border-indigo-600');
        btn2.classList.remove('border-indigo-600');
      } else {
        btn1.classList.remove('border-indigo-600');
      }
    });
    btn2.addEventListener('click', function() {
      radio2.checked = true;
      if (radio2.checked == true) {
        btn2.classList.add('border-indigo-600');
        btn1.classList.remove('border-indigo-600');
      } else {
        btn2.classList.remove('border-indigo-600');
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      if (radio1.checked == true) {
        btn1.classList.add('border-indigo-600');
      } else {
        btn2.classList.add('border-indigo-600');
      }
    });
  </script>

</body>

</html>