<?php
include "menubar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-white">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Enter your product details</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="sell_validation.php" method="POST" enctype="multipart/form-data">

        <!-- Name -->
        <div>
          <label for="p_name" class="block text-sm font-medium leading-6 text-gray-900">Product Name</label>
          <div class="mt-2">
            <input id="p_name" name="p_name" type="text" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
          </div>
        </div>

        <!-- Image -->
        <div>
          <label for="p_image" class="block text-sm font-medium leading-6 text-gray-900">Product Image</label>
          <div class="mt-2">
            <input id="p_image" name="p_image" type="file" autocomplete="off" required accept="image/*" class="block w-full rounded-md cursor-pointer border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
          </div>
        </div>

        <!-- Description -->
        <div>
          <label for="p_desc" class="block text-sm font-medium leading-6 text-gray-900">Product Description</label>
          <div class="mt-2">
            <textarea id="p_desc" name="p_desc" autocomplete="off" required style="resize:none;" class="block w-full rounded-md h-20 border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500"></textarea>
          </div>
        </div>

        <!-- Price -->
        <div>
          <label for="p_price" class="block text-sm font-medium leading-6 text-gray-900">Product Price (₹)</label>
          <div class="mt-2">
            <input id="p_price" name="p_price" type="number" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
          </div>
        </div>

        <!-- Quantity -->
        <div>
          <label for="p_quantity" class="block text-sm font-medium leading-6 text-gray-900">Product Quantity</label>
          <div class="mt-2">
            <input id="p_quantity" name="p_quantity" type="number" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
          </div>
        </div>

        <!-- Category -->
        <div>
          <label for="p_category" class="block text-sm font-medium leading-6 text-gray-900">Product Category</label>
          <div class="mt-2">
            <select name="p_category" id="p_category" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
              <option selected disabled value="">Select</option>
              <option value="monitor">Monitor</option>
              <option value="mouse">Mouse</option>
              <option value="keyboard">Keyboard</option>
              <option value="television">Television</option>
              <option value="book">Book</option>
              <option value="smartphone">Smartphone</option>
            </select>
          </div>
        </div>

        <!-- Seller Name -->
        <div>
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Seller Name</label>
          <div class="mt-2">
            <input id="name" name="name" type="text" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
          </div>
        </div>

        <!-- Address -->
        <div>
          <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Seller Address</label>
          <div class="mt-2">
            <textarea id="address" name="address" autocomplete="off" required style="resize:none;" class="block w-full rounded-md h-15 border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500"></textarea>
          </div>
        </div>

        <!-- Seller Phone Number -->
        <div>
          <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Seller Phone Number</label>
          <div class="mt-2">
            <input id="phone" name="phone" type="text" autocomplete="off" required pattern="[0-9]{10}" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 focus:outline-none sm:text-sm sm:leading-6 transition ease duration-500">
          </div>
        </div>

        <!-- Submit -->
        <div>
          <button type="submit" id="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition ease duration-500">Submit</button>
        </div>
      </form>
    </div>

    <?php
    include "scroll_top.php";
    ?>

    <?php
    if ($_GET) {
      $action = $_GET["action"];
      if ($action == "invalid-image") {
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
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Invalid image type</h3>
                            <div class="mt-2">
                              <p class="text-sm text-gray-500">Uploaded file is not an image. Only images are supported.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto" onclick="window.location.href = `sell.php`">OK</button>
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
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                      <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                          <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-green-600 bi bi-check2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" aria-hidden="true" stroke="currentColor" stroke-width="1">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                            </svg>
                          </div>
                          <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Product details uploaded</h3>
                            <div class="mt-2">
                              <p class="text-sm text-gray-500">Thanks for using our service and giving us your time.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto" onclick="window.location.href = `sell.php`">OK</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              ';
      }
    }
    ?>
</body>

</html>