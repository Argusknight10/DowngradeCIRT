<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="img/pens.png" type="image/x-icon">
  <title>CIRT PENS - {{ $title }}</title>

  <!--Link Icon Tab-->
  <link rel="icon" href="img/pens.png" type="image/x-icon">
    
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
</head>

<body>
  @php
    $excludeSidebar = ['admin.articles.create', 'admin.articles.show', 'admin.articles.edit'];
  @endphp

  @if (!in_array(Route::currentRouteName(), $excludeSidebar))
    <x-sidebar></x-sidebar>
  @endif

  {{ $slot }}
  @yield('js')

</body>

</html>
