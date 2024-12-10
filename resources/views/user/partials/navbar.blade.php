<nav class="bg-[#1751A5] px-10 py-1 fixed w-full z-20 top-0 left-0 border-b-4 border-[#F2C808]">
  <div class="container mx-auto">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/" class="flex items-center">
        <img src="/img/pens.png" class="h-8 mr-3" alt="Logo PENS">
        <span class="self-center hidden md:block text-1xl font-semibold whitespace-nowrap text-white">Cyber Incident
          Response Team</span>
        <span class="self-center md:hidden text-2xl font-semibold whitespace-nowrap text-white">CIRT</span>
      </a>
      <div class="flex">
        <button data-collapse-toggle="navbar-sticky" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul
          class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 text-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li class="border-b md:border-none text-center">
            <a href="/" class="block py-2 pl-3 pr-4 text-white rounded md:bg-transparent md:p-0">Beranda</a>
          </li>
          <li class="border-b md:border-none text-center">
            <a href="{{ route('articles.index') }}"
              class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Artikel</a>
          </li>
          <li class="border-b md:border-none text-center">
            <a href="{{ route('reports.create') }}"
              class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Form
              Pengaduan</a>
          </li>
          <li class="border-b md:border-none text-center">
            <a href="/login"
              class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
