<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script> 
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>@yield('title')</title>
</head>
<body>
  <div class="bg-white">
    <x-notice></x-notice>
    <x-header></x-header>
    <x-alert></x-alert>
    <x-main>@yield('content')</x-main>
    <x-footer></x-footer>
  </div>
  @yield('scripts') 
</body>
</html>