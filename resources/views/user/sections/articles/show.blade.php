@extends('user.main')

@section('title')
  {{ $article->title }}
@endsection

@section('content')
<section class="container mx-auto px-5 my-36 sm:px-10 md:px-20">
    <a href="{{route('home')}}" class="flex justify-start items-center my-10 gap-2">
      <svg class="w-5 h-5 text-yellow-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
      </svg>
      <p class="text-xl">Kembali</p>
    </a>
    <div class="flex flex-col justify-center items-center gap-5 md:gap-10">
      <h1 class="text-center text-2xl md:text-5xl font-medium">{{ $article->title }}</h1>
      <div class="flex flex-col gap-1 items-center">
        <h4 class="text-sm md:text-2xl">{{ $article->user->name }}</h4>
        <h5 class="text-xs md:text-xl font-light">{{ $article->created_at->format('j M Y') }}</h5>
      </div>
      <div class="w-[75%] h-[60%] lg:w-[820px] lg:h-[500px] rounded-lg mx-auto">
        <img src="{{ asset('storage/' . $article->image) }}" class="rounded-lg w-full h-full"
          alt="{{ $article->title }} Image">
      </div>
      <p class="w-[80%] text-start text-2xl">{!! $article->body !!}</p>
    </div>
    </div>
  </section>
@endsection
