<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CIRT | PENS</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-contain bg-no-repeat" style="background-image: url('img/pengaduanTop.png')">
  <div class="container mx-auto px-4">
    <div class="flex items-center justify-center gap-x-10 min-h-screen">
      <div class="flex items-center md:gap-10 flex-col md:flex-row w-full max-w-5xl">
        <div class="flex-1 content-end">
          <a href="/">
            <img src="img/ent-dark.svg" class="w-[70%] mx-auto md:w-auto min-w-[10rem] mb-8 md:mb-0" alt="ENT logo">
          </a>
        </div>
        <div class="flex-1 w-full sm:w-3/4">
          <h2 class="md:text-4xl text-center mb-8 hidden md:block text-[#1751A5] font-bold">
            Welcome back!
          </h2>

          <form action="/login" method="post">
            @csrf

            <div class="mb-6">
              <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full rounded-md p-2.5 mb-2" placeholder="email" autofocus required>
              @error('email')
              <span class="w-full text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-6">
              <input type="password" name="password" id="password" class="w-full rounded-md p-2.5 mb-2" placeholder="password">
              @error('password')
              <span class="w-full text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>

            <div class="flex items-start mb-6">
              <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" name="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
              </div>
              <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Remember me
              </label>
            </div>

            @error('loginError')
            <div class="text-sm text-red-600 text-center mb-6">{{ $message }}</div>
            @enderror

            <button type="submit" class="w-full rounded-md p-3 md:p-4 bg-[#1751A5] text-white font-bold text-xl">
              Log in
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>