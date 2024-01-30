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
  <meta name="description" content="This e-commerce website is just for my practice. You can use this website for your project.">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="SVG/logo.svg">
  <title>Brandly</title>
</head>

<body class="bg-white">
  <div class="flex flex-col items-center mt-20 px-3">
    <!-- Profile Image and Name -->
    <div class="bg-slate-200 w-full sm:w-full md:w-1/2 lg:w-1/2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 flex flex-row justify-evenly">

      <?php

      $email = $_COOKIE['User_email'];
      require_once 'conn.php';

      $sql = "select Name from userlist where Email = '$email' or Phone_Number = '$email'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $name = $row["Name"];

      echo '<svg class="h-20 w-20 rounded-full my-5 text-zinc-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>';

      echo '<h1 class="text-5xl my-8 text-zinc-900">' . $name . '</h1>';

      ?>
    </div>

    <!-- Change Password and Delete Account -->
    <div class="flex flex-col mt-10 w-full sm:w-full md:w-1/2 lg:w-1/2 rounded-md shadow-lg ring-1 ring-black ring-opacity-10">
      <a href="change_pass.php" class="flex justify-between font-semibold leading-6 text-black hover:text-gray-500 w-full border-b-2 border-slate-300 py-2 px-7 transition ease duration-500">Change Password
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-400">
          <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
      </a>
      <a href="account.php?action=delete" class="flex justify-between font-semibold leading-6 text-red-600 hover:text-red-400 w-full py-2 px-7 transition ease duration-500">Delete Account
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-400">
          <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
      </a>
    </div>

    <!-- Brand and Version -->
    <div class="flex justify-evenly mt-40 w-full sm:w-full md:w-1/2 lg:w-1/2">
      <img class="h-16 w-16" src="SVG/logo.svg" alt="">
      <p class="text-2xl text-slate-400 mt-4">V - 1.0</p>
    </div>

    <?php
    if ($_GET) {
      $action = $_GET["action"];
      if ($action == "delete") {
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
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete account</h3>
                            <div class="mt-2">
                              <p class="text-sm text-gray-500">Are you sure you want to delete your account? All of your data will be permanently removed. This action cannot be undone.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition ease duration-500" onclick="window.location.href=`delete_account.php`">Delete</button>
                        <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-10 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition ease duration-500" onclick="window.location.href=`javascript:history.back()`">Cancel</button>
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