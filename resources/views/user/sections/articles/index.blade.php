@extends('user.main')

@section('title')
  Article
@endsection

@section('content')
  {{-- section artikel --}}
  <div class="container mx-auto px-5 my-36 sm:px-10 md:px-20">
    <h1 class="text-center font-medium text-4xl md:text-5xl text-[#14477A]">Semua Artikel</h1>
    {{-- search bar --}}
    <div class="flex justify-center my-20">
      <form class="flex items-center justify-center w-full" method="GET" action="">
        <label for="simple-search" class="sr-only">Search</label>
        <input type="text" id="simple-search" name="q" value="{{ request('q') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full max-w-[400px] py-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Cari Artikel">
        <button type="submit"
          class="p-2.5 ml-2 text-sm font-medium text-[#14477A] bg-[#F2C808] rounded-lg border border-[#F2C808]">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
          <span class="sr-only">Search</span>
        </button>
      </form>
    </div>
    <div class="grid grid-cols-1 w-fit my-20 mx-auto md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-10">
      @forelse ($articles as $article)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="max-w-96 h-[300px] bg-cover">
            <a href="{{ route('articles.show', $article->slug) }}">
              <img class="rounded-t-lg h-full" src="{{ asset('storage/' . $article->image) }}"
                alt="{{ $article->title }} Image" />
            </a>
          </div>
          <div class="p-5">
            <div class="flex gap-3">
              <box-icon type='solid' name='calendar' color="#61677A"></box-icon>
              <p class="font-normal mb-2">{{ $article->created_at->format('j M Y') }}</p>
            </div>
            <a href="{{ route('articles.show', $article->slug) }}">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $article->excerpt }}</p>
            <a href="{{ route('articles.show', $article->slug) }}"
              class="inline-flex items-center text-sm font-medium text-center text-[#14477A] hover:text-[#F2C808] hover:underline">Baca
              selengkapnya</a>
          </div>
        </div>
      @empty
        <div class="flex justify-center items-center mx-auto">
          <p class="text-center text-xl">Tidak ada Artikel yang dipublikasikan</p>
        </div>
      @endforelse
    </div>
    <div class="flex justify-center md:justify-end lg:mx-10">
      {{ $articles->links() }}
    </div>
  </div>
@endsection
