<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="SVG/logo.svg">
  <title>Brandly</title>
</head>

<body class="h-full bg-white">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white transition ease duration-500" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-btn">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
            <svg class="block h-6 w-6" id="hamburger" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
            <svg class="hidden h-6 w-6" id="cross" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="SVG/logo.svg" alt="Your Company">
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="home.php?category=default" class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium transition ease duration-500" aria-current="page">Home</a>
              <a href="sell.php" class="<?= basename($_SERVER['PHP_SELF']) == 'sell.php' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium transition ease duration-500">Sell</a>
              <button class="<?= basename($_SERVER['PHP_SELF']) == 'sell.php' ? 'hidden' : '' ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium transition ease duration-500" id="category-btn">Category</button>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 hover:opacity-75 transition ease duration-500">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View cart</span>
            <svg class="h-6 w-6 text-cyan-400" fill="currentColor" viewBox="0 0 16 16" stroke-width="0" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 hover:opacity-75 transition ease duration-500" id="user-menu-button">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user profile</span>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-cyan-400">
                  <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                </svg>

              </button>
            </div>

            <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition duration-100" role="menu" aria-orientation="vertical" tabindex="-1" id="profile_menu">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="account.php" class="block px-4 py-2 text-sm text-gray-700 hover:opacity-75 transition ease duration-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="sign_out.php" class="block px-4 py-2 text-sm text-gray-700 hover:opacity-75 transition ease duration-500" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="home.php?category=default" class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium transition ease duration-500">Home</a>
        <a href="sell.php" class="<?= basename($_SERVER['PHP_SELF']) == 'sell.php' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium transition ease duration-500">Sell</a>
        <button class="<?= basename($_SERVER['PHP_SELF']) == 'sell.php' ? 'hidden' : '' ?> text-gray-300 block rounded-md px-3 py-2 text-base font-medium transition ease duration-500" id="category-btn2">Category</button>
      </div>
    </div>

    <script>
      let mobile_menu = document.getElementById('mobile-menu');
      let menu_btn = document.getElementById('mobile-menu-btn');
      let hamburger = document.getElementById('hamburger');
      let cross = document.getElementById('cross');
      menu_btn.addEventListener("click", function() {
        if (mobile_menu.classList.contains('hidden')) {
          mobile_menu.classList.remove('hidden');
          cross.classList.remove('hidden');
          hamburger.classList.add('hidden');
        } else {
          mobile_menu.classList.add('hidden');
          cross.classList.add('hidden');
          hamburger.classList.remove('hidden');
        }
      });

      let profile_btn = document.getElementById('user-menu-button');
      let profile_menu = document.getElementById('profile_menu');
      profile_btn.addEventListener("click", function() {
        if (profile_menu.classList.contains('hidden')) {
          profile_menu.classList.remove('hidden');
        } else {
          profile_menu.classList.add('hidden');
        }
      });
    </script>
  </nav>
</body>

</html>