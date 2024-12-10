<x-mainAdmin>
    <script src="https://kit.fontawesome.com/d28a8ff94b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css " rel="stylesheet"/>

    <x-slot:title>Preview Reports</x-slot:title>

    <img src="/img/preview.png" class="fixed right-0 top-0 max-w-[10rem] xl:w-fit z-30" alt="">

    {{-- NAVBAR --}}
    <nav class="bg-[#1751A5] px-10 py-1 fixed w-full z-20 top-0 left-0 border-b-4 border-[#F2C808]">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center justify-between mx-auto">
                <a href="#" class="flex items-center">
                    <img src="/img/pens.png" class="h-8 mr-3" alt="Logo PENS">
                    <span class="self-center hidden md:block text-1xl font-semibold whitespace-nowrap text-white">Cyber
                        Incident
                        Response Team</span>
                    <span class="self-center md:hidden text-2xl font-semibold whitespace-nowrap text-white">CIRT</span>
                </a>
                <div class="flex">
                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 md:p-0 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 text-white">
                        <li class="border-b md:border-none text-center">
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded md:bg-transparent md:p-0">Beranda</a>
                        </li>
                        <li class="border-b md:border-none text-center">
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded">Artikel</a>
                        </li>
                        <li class="border-b md:border-none text-center">
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded ">FAQ</a>
                        </li>
                        <li class="border-b md:border-none text-center">
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded ">Form
                                Pengaduan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>    
    {{-- NAVBAR --}}

    {{-- SHOW ARTICLE --}}
    <section class="container mx-auto px-5 my-36 sm:px-10 md:px-20">
        <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-2 max-w-5xl mx-auto mb-14">
            <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
            </svg>
            <p class="text-xl">Kembali</p>
        </a>
        <div class="flex flex-col items-center gap-5 md:gap-10">
            <h1 class="text-left text-5xl md:text-5xl font-medium mb-7 w-[80%] break-words">{{ $article->title }}</h1>
            <div class="w-[80%] h-[60%]  rounded-lg mx-auto">
                <img src="{{ asset('storage/' . $article->image) }}" class="rounded-lg w-full h-full"
                    alt="{{ $article->title }} Image">
            </div>
            <div class="flex items-center justify-start gap-3 w-[80%] my-4">
                <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-white">
                    <span class="text-3xl">{{ strtoupper(substr($article->user->name, 0, 1)) }}</span>
                </div>
                <div class="flex flex-col gap-1">
                    <h4 class="text-lg md:text-xl font-semibold">{{ $article->user->name }}</h4>
                    <h5 class="text-sm md:text-base font-light text-gray-500">
                        {{ $article->created_at->format('j M Y') }}</h5>
                </div>
            </div>

            <div
                class="w-[80%] text-start text-lg break-words max-w-full max-h-96 overflow-hidden bg-white my-1 shadow-sm">
                {!! $article->body !!}
            </div>

            {{-- card view for article --}}
            <div class="container mtg mb-24 mx-auto">
                <div class="w-[80%] flex justify-between items-center my-20 mx-auto">
                  <h1 class="font-bold text-5xl md:text-6xl relative pb-2">
                      Latest Post
                      <span class="absolute left-0 right-0 bottom-0 h-1 bg-[#F2C808]"></span>
                  </h1>        
                  <a href="#" 
                        class="inline-flex justify-center items-center p-5 text-base font-medium text-center text-[#14477A] rounded-lg bg-[#F2C808] border-2 border-[#F2C808] button-lihat">
                        Lihat Semua
                  </a>
                </div>
                <div class="grid grid-cols-1 w-fit mx-auto md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500">
                    @forelse ($articles as $article)
                        <div class="max-w-lg mb-6 transition-transform transform hover:-translate-y-2">
                            <div class="overflow-hidden h-[300px] bg-center bg-cover bg-no-repeat">
                                <a href="#">
                                    <img class="w-full h-full object-fill object-center transition-transform transform hover:scale-105 duration-300"
                                        src="{{ asset('storage/' . $article->image) }}" 
                                        alt="{{ $article->title }} Image" />
                                </a>
                            </div>
                            <div class="p-5">
                              <div class="flex items-center gap-3 text-gray-500">
                                  <h4 class="text-black text-base md:text-lg font-semibold">{{ $article->user->name }}</h4>
                                  <p class="text-sm">{{ $article->created_at->format('j M Y') }}</p>
                              </div>
                              <a href="#">
                                  <h5 class="mt-3 mb-2 text-xl font-bold transition-colors duration-300 hover:text-[#F2C808] break-words">
                                      {{ $article->title }}
                                  </h5>
                              </a>
                              <p class="mb-4 text-sm text-gray-700 dark:text-gray-400 break-words">
                                  {!! $article->excerpt !!}
                              </p>
                              <a href="#" 
                                  class="inline-flex items-center text-sm font-medium text-blue-500 hover:text-[#F2C808] hover:underline">
                                  Baca selengkapnya
                              </a>
                            </div>
                        </div>
                    @empty
                        <div class="w-full flex justify-center">
                            <div class="px-6 py-4 bg-gray-100 rounded-lg shadow-md dark:bg-gray-700 flex items-center">
                                <svg viewBox="0 0 40 40" class="w-8 h-8 mr-3 fill-current text-gray-500">
                                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                                </svg>
                                <p class="text-lg text-gray-500 dark:text-gray-300">Tidak ada artikel yang dipublikasikan</p>
                            </div>
                        </div>
                    @endempty
                </div>
              </div>
        </div>
    </section>
    {{-- SHOW ARTICLE --}}

    {{-- FOOTER --}}
    <div class="w-full px-5 sm:px-10 bg-[#1751A5] border-t-8 border-[#F2C808]">
        <footer class="bg-[#1751A5] w-full ">
            <div class="p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="#" class="text-white font-medium flex flex-col gap-2 lg:gap-5 items-start">
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
                                    <a href="#" class="hover:underline">Report</a>
                                </li>
                                <li class="mb-4 flex gap-3 items-center">
                                    <a href="#" class="hover:underline">Articles</a>
                                </li>
                                <li class="mb-4 flex gap-3 items-center">
                                    <a href="#" class="hover:underline">FAQ</a>
                                </li>
                            </ul>
                        </div>
        
                        <div>
                            <h2 class="mb-6 text-md font-semibold uppercase text-white">Alamat</h2>
                            <ul class="text-white font-medium">
                                <li class="mb-4 flex gap-3 items-start">
                                    <img src="img/home-solid.png" class="w-fit" alt="">
                                    <p class="text-xs md:text-base max-w-sm">Institut Teknologi Sepuluh Nopember, Kampus Jl.
                                        Raya ITS,
                                        Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-white sm:mx-auto lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-white sm:text-center">© 2023 <a href="https://www.pens.ac.id/"
                            class="hover:underline">Politeknik Elektronika Negeri Surabaya</a>.
                    </span>
                </div>
            </div>
        </footer>
    </div>
    {{-- FOOTER --}}

    <script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>
</x-mainAdmin>
