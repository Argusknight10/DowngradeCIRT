<nav class="bg-[#1751A5] px-5 py-3 fixed w-full z-20 top-0 left-0 border-b-4 border-[#F2C808]">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center justify-between mx-auto">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="/img/pens.png" class="h-10 mr-3" alt="Logo PENS">
                <span class="self-center hidden md:block text-2xl font-semibold whitespace-nowrap text-white">
                    Cyber Incident Response Team
                </span>
                <span class="self-center md:hidden text-3xl font-semibold whitespace-nowrap text-white">CIRT</span>
            </a>

            <!-- Toggle Button -->
            <div class="flex">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            <!-- Floating Mobile Menu -->
            <div class="w-48 text-sm font-medium text-gray-900 border-gray-600 rounded-lg bg-white hidden absolute top-14 right-4 z-30 shadow-2xl md:hidden"
                id="navbar-sticky">
                <a href="/" 
                    class="block w-full px-4 py-2 border-gray-200 cursor-pointer 
                    @if(Request::path() == '/') text-white bg-[#1751A5] @else hover:bg-gray-200 bg-white text-gray-900 @endif">
                    Beranda
                </a>

                <a href="{{ route('articles.index') }}" 
                    class="block w-full px-4 py-2 border-gray-200 cursor-pointer 
                    @if(Request::path() == 'articles') text-white bg-[#1751A5] @else hover:bg-gray-200 bg-white text-gray-900 @endif">
                    Artikel
                </a>

                <a href="{{ route('faq') }}" 
                    class="block w-full px-4 py-2 border-gray-200 cursor-pointer 
                    @if(Request::path() == 'faq') text-white bg-[#1751A5] @else hover:bg-gray-200 bg-white text-gray-900 @endif">
                    FAQ
                </a>

                <a href="{{ route('reports.create') }}" 
                    class="block w-full px-4 py-2 rounded-b-lg cursor-pointer 
                    @if(Request::path() == 'reports/create') text-white bg-[#1751A5] @else hover:bg-gray-200 bg-white text-gray-900 @endif">
                    Form Pengaduan
                </a>
            </div>

            <!-- Desktop Menu (List Style) -->
            <div class="hidden items-center justify-between w-full md:flex md:w-auto md:order-1">
                <ul class="flex flex-col p-4 md:p-0 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 text-white">
                    <li class="border-b md:border-none text-center">
                        <a href="/" class="block py-2 pl-3 pr-4 text-white rounded md:bg-transparent md:p-0">Beranda</a>
                    </li>
                    <li class="border-b md:border-none text-center">
                        <a href="{{ route('articles.index') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded">Artikel</a>
                    </li>
                    <li class="border-b md:border-none text-center">
                        <a href="{{ route('faq') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded ">FAQ</a>
                    </li>
                    <li class="border-b md:border-none text-center">
                        <a href="{{ route('reports.create') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded ">Form Pengaduan</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Toggle Script -->
<script>
    const toggleButton = document.querySelector('[data-collapse-toggle]');
    const menu = document.getElementById('navbar-sticky');

    toggleButton.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        if (!menu.contains(event.target) && !toggleButton.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
</script> 

<style>
    @media (min-width: 768px) {
        #navbar-sticky {
            display: none;
        }
    }
</style>