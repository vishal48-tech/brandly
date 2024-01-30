<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <button id="btn" class="fixed right-2 bottom-2 bg-indigo-600 p-2 rounded-lg text-white z-10 hover:bg-indigo-500 transition ease duration-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
    </svg>
  </button>

  <script>
    let btn = document.getElementById('btn');
    btn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      })
    });
  </script>
</body>

</html>