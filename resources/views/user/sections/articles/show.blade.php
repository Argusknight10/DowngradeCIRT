<x-mainUser>
  <x-slot:title>{{ $article->title }}</x-slot:title>

  <section class="container mx-auto px-5 my-36 sm:px-10 md:px-20">
      <a href="{{ route('home') }}" class="flex items-center gap-2 max-w-5xl mx-auto mb-14">
          <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 8 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
          </svg>
          <p class="text-xl">Kembali</p>
      </a>
      <div class="flex flex-col items-center gap-5 md:gap-10">
          <h1 class="text-left text-2xl md:text-5xl lg:text-5xl font-medium md:mb-7 w-[80%] break-words">{{ $article->title }}
          </h1>
          <div class="w-[80%] aspect-[16/9] rounded-lg mx-auto overflow-hidden">
              <img src="{{ asset('storage/' . $article->image) }}" class="rounded-lg w-full h-full object-cover"
                  alt="{{ $article->title }} Image">
          </div>
          <div class="flex items-center justify-start gap-3 w-[80%] md:my-4">
              <div class="w-10 h-10 md:w-16 md:h-16 lg:w-20 lg:h-20 bg-gray-300 rounded-full flex items-center justify-center text-white">
                  <span class="text-xl md:text-2xl">{{ strtoupper(substr($article->user->name, 0, 1)) }}</span>
              </div>
              <div class="flex flex-col gap-1">
                  <h4 class="text-md md:text-xl lg:text-xl font-semibold">{{ $article->user->name }}</h4>
                  <h5 class="text-sm md:text-base font-light text-gray-500">
                      {{ $article->created_at->format('j M Y') }}</h5>
              </div>
          </div>

          <div
              class="w-[80%] text-start md:text-lg break-words max-w-full max-h-96 overflow-hidden bg-white my-1 ">
              {!! $article->body !!}
          </div>

          {{-- card view for article --}}
          <div class="container mtg mb-5 mx-auto">
              <div class="w-[80%] flex justify-between items-center mt-20 md:mb-16 mx-auto">
                  <h1 class="font-bold text-2xl md:text-6xl relative pb-2">
                      Latest Post
                      <span class="absolute left-0 right-0 bottom-0 h-1 bg-[#F2C808]"></span>
                  </h1>
                  <a href="{{ route('articles.index') }}"
                      class="inline-flex justify-center items-center md:p-3 text-base font-medium text-center text-[#14477A] rounded-lg bg-[#F2C808] border-2 border-[#F2C808] button-lihat">
                      Lihat Semua
                  </a>
              </div>
          </div>
      </div>
      <div class="grid grid-cols-1 w-[80%] mx-auto justify-items-center md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 md:gap-10"
  data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500">
  @forelse ($articles as $article)
          <div class="max-w-md w-full mb-6 border border-gray-200 rounded-lg shadow-lg transition-transform transform hover:-translate-y-2">
              <div class="overflow-hidden rounded-t-lg aspect-[4/3] bg-center bg-cover bg-no-repeat">
                  <a href="{{ route('articles.show', $article->slug) }}">
                      <img class="w-full h-full object-cover" src="{{ asset('storage/' . $article->image) }}"
                          alt="{{ $article->title }} Image" />
                  </a>
              </div>
              <div class="p-5">
                  <div class="flex items-center gap-3 text-gray-500">
                      <box-icon type="solid" name="calendar" color="#61677A"></box-icon>
                      <p class="text-sm">{{ $article->created_at->format('j M Y') }}</p>
                  </div>
                  <a href="{{ route('articles.show', $article->slug) }}">
                      <h5
                          class="mt-3 mb-2 md:text-xl lg:text-2xl font-bold transition-colors duration-300 break-words hover:text-[#F2C808]">
                          {{ $article->title }}
                      </h5>
                  </a>
                  <p class="mb-4 text-sm text-gray-700 dark:text-gray-400 break-words ">
                      <code>{!! $article->excerpt !!}</code>
                  </p>
                  <div class="flex justify-between items-center">
                      <div class="flex-1">
                      </div>
                      <a href="{{ route('articles.show', $article->slug) }}" class="button-lihat">
                          Selengkapnya
                      </a>
                  </div>
              </div>
          </div>
              @empty
                  <div class="w-full flex justify-center">
                      <div class="px-6 py-4 bg-gray-100 rounded-lg shadow-md dark:bg-gray-700 flex items-center">
                          <svg viewBox="0 0 40 40" class="w-8 h-8 mr-3 fill-current text-gray-500">
                              <path
                                  d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                              </path>
                          </svg>
                          <p class="text-lg text-gray-500 dark:text-gray-300">Tidak ada artikel yang dipublikasikan</p>
                      </div>
                  </div>
              @endempty
              </div>
          </div>
      </div>
  </section>
</x-mainUser>
