@extends('admin.main')

@section('title')
    Create Article
@endsection

@section('content')
    <div class="mx-auto px-5 mb-20 sm:px-10 md:px-20">
        <div class="flex gap-2 items-center mt-20 mb-10 mx-auto w-[80%]">
            <a href="{{ route('admin.articles.index') }}" class="text-xl flex items-center gap-2 text-[#14477A] font-medium">
                <svg class="w-5 h-5 text-yellow-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
                <p>Master Artikel</p>
            </a>
            <span class="mx-2 text-3xl text-yellow-400">/</span>
            <p class="text-[#14477A] text-xl">Edit Artikel</p>
        </div>

        @if (session('success'))
            <div id="toast-success"
                class="flex items-center my-2 w-[80%] mx-auto p-4 mb-4 text-green-500 bg-green-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <form action="{{ route('admin.articles.update', $article) }}" class="mx-auto w-[80%]" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-4 gap-5">
                <div class="col-span-3">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                        Artikel</label>
                    <div class="">
                        <input type="text" name="title" value="{{ old('title', $article->title) }}" id="title"
                            class="rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Judul Artikel">
                        @error('title')
                            <span class="w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="is_published"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="is_published" name="is_published"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $article->is_published }}" hidden>
                            @if ($article->is_published == 0)
                                Draft
                            @else
                                Publish
                            @endif
                        </option>
                        <option value="0">Draft</option>
                        <option value="1">Publish</option>
                    </select>
                </div>
                <div class="col-span-3 flex flex-col space-y-2 mt-5">
                    <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                        Artikel</label>
                    <textarea id="editor" name="body">{{ old('body', $article->body) }}</textarea>
                    @error('body')
                        <span class="w-full text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Gambar
                            Cover</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="image" type="file" multiple onchange="previewImage()">
                        @error('image')
                            <span class="w-full text-sm
                            text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <img src="{{ asset('storage/' . $article->image) }}" id="output"
                        class="mt-5 w-full mx-auto rounded-lg" alt="">
                </div>
                <div class="">
                    <button id="post"
                        class="py-3 px-10 w-full h-fit bg-[#1751A5] text-white rounded-md md:w-fit mt-5">Edit
                        Artikel</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('asset/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'advlist autolink lists link image charmap preview anchor',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image',
        });
        //    var loadFile = function(event) {
        //      var output = document.getElementById('output');
        //    if (event.target.files.length > 0) {
        //      output.src = URL.createObjectURL(event.target.files[0]);
        //    output.style.display = 'block';
        // } else {
        //   output.src = '';
        // output.style.display = 'none';
        // }
        // }

        function previewImage() {

            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#output');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

            console.log(oFReader);
        }
    </script>
@endsection
