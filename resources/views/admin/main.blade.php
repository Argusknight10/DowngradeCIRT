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
  @php
    $excludeSidebar = ['admin.articles.create', 'admin.articles.show', 'admin.articles.edit'];
  @endphp

  @if (!in_array(Route::currentRouteName(), $excludeSidebar))
    @include('admin.partials.sidebar')
  @endif

  @yield('content')
  @yield('js')
</body>

</html>
