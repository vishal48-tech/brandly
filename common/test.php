<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="logo.svg">
  <title>Brandly</title>
</head>

<body class="h-full bg-white">

  <button onclick="show()">click</button>

  <div class="opacity-0 transition ease duration-500" id="myDiv">
    <h1>Hello</h1>
    <p>I am vishal</p>
  </div>

  <script>
    function show() {
      const div = document.getElementById("myDiv");
      div.classList.remove("opacity-0");
    }
  </script>

</body>