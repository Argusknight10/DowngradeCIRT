@extends('user.main')

@section('title')
  Home
@endsection

@section('content')
  <section class="bg-center pt-36 bg-[#14477A]">
    <div class="container mx-auto">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="px-5 sm:px-10 text-center lg:text-start lg:max-w-[65%] mx-auto py-24 lg:py-56">
          <h1 class="mb-4 text-4xl font-extrabold tracking-tight md:leading-snug text-white md:text-5xl lg:text-6xl">
            Jaga Keamanan Digital Bersama Tim Respons Insiden Siber Kami
          </h1>
          <p class="mb-8 text-lg font-normal text-white lg:text-xl">
            Jaga Keamanan Bersama Kami! Keamanan siber adalah tanggung jawab kita semua. Dengan pengetahuan, kesadaran,
            dan kerjasama, kita dapat menghadapi ancaman siber dan menjaga dunia maya kita tetap aman.
          </p>
          <div class="flex flex-col space-y-4 sm:flex-row justify-center lg:justify-start sm:space-y-0 sm:space-x-4">
            <a href="/reports"
              class="inline-flex justify-center items-center p-5 text-base font-medium text-center transition duration-300 ease-in-out hover:scale-105 text-[#F2C808] rounded-lg hover:bg-[#F2C808] hover:border-[#F2C808] hover:text-[#14477A] border-2 border-[#F2C808]">
              Laporkan Sekarang
            </a>
          </div>
        </div>
        <img src="img/ilustrasi1.svg" class="hidden lg:block px-10 mx-auto max-w-[50%] h-full" alt="">
      </div>
    </div>
  </section>

  {{-- card view for article --}}
  <div class="container mx-auto px-5 sm:px-10 md:px-20">
    <h1 class="text-center my-20 font-bold text-5xl md:text-6xl">Artikel</h1>
    <div class="grid grid-cols-1 w-fit mx-auto md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-10">
      @forelse ($articles as $article)
        <div class="max-w-md border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="max-w-96 h-[300px] bg-center bg-cover bg-no-repeat">
            <a href="{{ route('articles.show', $article->slug) }}">
              <img class="rounded-t-lg h-auto mx-auto" src="{{ asset('storage/' . $article->image) }}"
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
              class="inline-flex items-center text-sm font-medium text-center text-[#14477A] hover:text-[#F2C808] hover:underline">
              Baca selengkapnya
            </a>
          </div>
        </div>
      @empty
        <h1 class="text-center">Tidak ada artikel yang dipublikasikan</h1>
      @endforelse
    </div>
    <div class="flex justify-end my-14 mx-auto sm:mx-5 md:mx-10">
      <a href="{{ route('articles.index') }}"
        class="p-5 text-base font-medium text-center transition duration-300 ease-in-out hover:scale-110 text-[#14477A] rounded-lg bg-[#F2C808]">
        Lihat Artikel Lainnya
      </a>
    </div>

    {{-- misi view section --}}
    <div class="container mx-auto my-20 px-5 sm:px-10">
      <div class="md:w-[80%] mx-auto">
        <h1 class="text-center my-20 font-bold text-5xl md:text-6xl">Misi CIRT</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 mx-auto gap-5 md:gap-10">
          <div
            class="container hover:scale-105 transition duration-200 ease-in-out flex flex-col items-center justify-center p-10 gap-10 bg-[#1751A5] rounded-lg">
            <img src="img/misi1.svg" class="w-full h-44" alt="">
            <h2 class="text-center text-white max-w-sm text-xl">Mengelola sistem keamanan siber di Politeknik Elektronika
              Negeri Surabaya.</h2>
          </div>
          <div
            class="container hover:scale-105 transition duration-200 ease-in-out flex flex-col items-center justify-center p-10 gap-10 bg-[#1751A5] rounded-lg">
            <img src="img/misi2.svg" class="w-full h-44" alt="">
            <h2 class="text-center text-white max-w-sm text-xl">Membangun kerja sama dalam menangani insiden keamanan
              siber.</h2>
          </div>
          <div
            class="container hover:scale-105 transition duration-200 ease-in-out flex flex-col items-center justify-center p-10 gap-10 bg-[#1751A5] rounded-lg">
            <img src="img/misi3.svg" class="w-full h-44" alt="">
            <h2 class="text-center text-white max-w-sm text-xl">Meningkatkan kapasitas sumber daya untuk mengatasi insiden
              keamanan siber.</h2>
          </div>
          <div
            class="container hover:scale-105 transition duration-200 ease-in-out flex flex-col items-center justify-center p-10 gap-10 bg-[#1751A5] rounded-lg">
            <img src="img/misi4.svg" class="w-full h-44" alt="">
            <h2 class="text-center text-white max-w-sm text-xl">Menjadi wadah untuk pelaporan masalah keamanan siber.</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
