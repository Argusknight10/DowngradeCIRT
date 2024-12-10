<footer class="bg-[#1751A5] w-full">
  <div class="p-4 py-6 lg:py-8">
    <div class="md:flex md:justify-between">
      <div class="mb-6 md:mb-0">
        <a href="{{ route('home') }}" class="text-white font-medium flex flex-col gap-2 lg:gap-5 items-start">
          <img src="/img/footerLogo.svg" class="h-18 mr-3" alt="ENT LOGO" />
          <p class="max-w-xs">Cyber Insident Response Team </br> Tim Penanganan Insiden Keamanan Siber </br>
            Politeknik Elektronika Negeri Surabaya</p>
        </a>
      </div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-2">
        <div>
          <h2 class="mb-6 text-md font-semibold uppercase text-white">Layanan Situs</h2>
          <ul class="text-white font-medium">
            <li class="mb-4 flex gap-3 items-center">
              <img src="img/li.png" class="text-[#F2C808]" alt="">
              <a href="{{ route('reports.create') }}" class="hover:underline">Report</a>
            </li>
            <li class="mb-4 flex gap-3 items-center">
              <img src="img/li.png" class="text-[#F2C808]" alt="">
              <a href="{{ route('articles.index') }}" class="hover:underline">Articles</a>
            </li>

          </ul>
        </div>

        <div>
          <h2 class="mb-6 text-md font-semibold uppercase text-white">Alamat</h2>
          <ul class="text-white font-medium">
            <li class="mb-4 flex gap-3 items-start">
              <img src="img/home-solid.png" class="w-fit" alt="">
              <p class="text-xs md:text-base max-w-sm">Institut Teknologi Sepuluh Nopember, Kampus Jl. Raya ITS,
                Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm text-white sm:text-center">© 2023 <a href="https://www.pens.ac.id/"
          class="hover:underline">Politeknik Elektronika Negeri Surabaya</a>.
      </span>
      <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
        <!-- <a href="#" class="text-[#14477A] bg-[#F2C808] p-2 rounded-full">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
              <path fill-rule="evenodd" d="M19.7 3.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.84c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.84A4.225 4.225 0 0 0 .3 3.038a30.148 30.148 0 0 0-.2 3.206v1.5c.01 1.071.076 2.142.2 3.206.094.712.363 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.15 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965c.124-1.064.19-2.135.2-3.206V6.243a30.672 30.672 0 0 0-.202-3.206ZM8.008 9.59V3.97l5.4 2.819-5.4 2.8Z" clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Youtube Channel</span>
          </a>
          <a href="#" class="text-[#14477A] bg-[#F2C808] p-2 rounded-full">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
              <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Facebook Page</span>
          </a>
          <a href="#" class="text-[#14477A] bg-[#F2C808] p-2 rounded-full">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
              <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Twitter page</span>
          </a> -->
      </div>
    </div>
  </div>
</footer>
