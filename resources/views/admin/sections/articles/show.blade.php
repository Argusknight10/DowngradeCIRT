@extends('admin.main')

@section('title')
    Preview
@endsection

@section('content')
    <section class="container mx-auto md:my-20 px-5 sm:px-10 md:px-20">
        <div class="flex items-center justify-between mt-10 mb-20">
            <div class="flex md:gap-2 items-center">
                <a href="{{ route('admin.articles.index') }}" class="text-sm flex items-center gap-2 md:text-xl text-[#14477A] font-medium">
                    <svg class="md:w-5 md:h-5 h-3 w-3 text-yellow-400 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                    <p>Master Artikel</p>
                </a>
                <span class="mx-2 text-sm md:text-3xl text-yellow-400">/</span>
                <p class="text-[#14477A] text-sm md:text-xl">Detail Artikel</p>
            </div>
        </div>
        <img src="/img/preview.png" class="absolute right-0 top-0 max-w-[5rem] xl:w-fit" alt="">
        <div class="flex flex-col mx-auto items-center gap-5 md:gap-10">
            <h1 class="text-center text-2xl md:text-5xl font-medium">{{ $article->title }}</h1>
            <div class="flex flex-col gap-1 items-center">
                <h4 class="text-sm md:text-2xl">{{ $article->user->name }}</h4>
                <h5 class="text-xs md:text-xl font-light">{{ $article->created_at->format('j M Y') }}</h5>
            </div>
            <div class="w-[75%] h-[60%] lg:w-[820px] lg:h-[500px] rounded-lg mx-auto">

                <img src={{ asset('storage/' . $article->image) }} alt="{{ $article->title }} Image" class="rounded-lg w-full h-full">
            </div>
            <p class="text-start mb-4 text-base md:text-2xl">{!! $article->body !!}</p>
        </div>
    @endsection
