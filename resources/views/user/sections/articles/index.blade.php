<x-mainUser>
  <x-slot:title>Article</x-slot:title>
  
  <div class="container mx-auto px-5 my-36 sm:px-10 md:px-20">
    <div class="flex flex-col items-center ">
      <!-- Tombol Kembali -->
      <a href="{{ route('home') }}" 
         class="flex items-center order-1 md:order-none self-start" 
         data-aos="fade-down" 
         data-aos-easing="linear" 
         data-aos-duration="500">
        <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
        <p class="text-xl">Kembali</p>
      </a>
    
      <div class="text-center mb-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
        <h1 class="font-bold text-5xl md:text-6xl relative pb-2 inline-block"> 
          Semua Artikel
          <span class="block h-1 bg-[#F2C808]"></span>
        </h1>
      </div>
    </div>    
    
    {{-- search bar --}}
    <div class="flex justify-center my-20" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
      <form class="flex items-center justify-center w-full" method="GET" action="">
        <label for="simple-search" class="sr-only">Search</label>
        <input type="text" id="simple-search" name="q" value="{{ request('q') }}"
          class="bg-white border border-gray-300 text-black text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full max-w-[600px] py-4 dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Cari Artikel">
        <button type="submit"
          class="p-3 ml-2 text-lg font-medium text-[#14477A] bg-[#F2C808] rounded-lg border border-[#14477A]">
          <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
          <span class="sr-only">Search</span>
        </button>
      </form>
    </div>
    <div class="grid grid-cols-1 w-fit mx-auto md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5 md:gap-10" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
      @forelse ($articles as $article)
      <div class="max-w-md mb-6 border border-gray-200 rounded-lg shadow-lg transition-transform transform hover:-translate-y-2">
        <div class="overflow-hidden rounded-t-lg aspect-[4/3] bg-center bg-cover bg-no-repeat">
            <a href="{{ route('articles.show', $article->slug) }}">
                <img class="w-full h-full object-cover" 
                     src="{{ asset('storage/' . $article->image) }}" 
                     alt="{{ $article->title }} Image" />
            </a>
        </div>
        <div class="p-5">
            <div class="flex items-center gap-3 text-gray-500">
                <box-icon type="solid" name="calendar" color="#61677A"></box-icon>
                <p class="text-sm">{{ $article->created_at->format('j M Y') }}</p>
            </div>
            <a href="{{ route('articles.show', $article->slug) }}">
                <h5 class="mt-3 mb-2 text-xl font-bold transition-colors duration-300 break-words hover:text-[#F2C808]">
                    {{ $article->title }}
                </h5>
            </a>
            <p class="mb-4 text-sm text-gray-700 dark:text-gray-400 break-words"><code>{!! $article->excerpt !!}</code></p>
            <div class="flex justify-between items-center">
                <div class="flex-1">
                </div>
                <a href="{{ route('articles.show', $article->slug) }}" 
                   class="button-lihat">
                    Selengkapnya
                </a>
            </div>
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
    <div class="flex justify-center md:justify-end lg:mx-10">
      {{ $articles->links() }}
    </div>
  </div>
</x-mainUser>