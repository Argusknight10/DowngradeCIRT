<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CIRT PENS - @yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
  @include('user.partials.navbar')
  @yield('content')
  <div class="w-full px-5 sm:px-10 bg-[#1751A5] border-t-8 border-[#F2C808]">
    @include('user.partials.footer')
  </div>
</body>

</html>
