<x-mainAdmin>
    <x-slot:title>Create Articles</x-slot:title>

    <div class="mx-auto px-5 mb-20 sm:px-10 md:px-20">
        <div class="flex gap-2 items-center mt-20 mb-10 mx-auto w-[80%]">
            <a href="{{ route('admin.articles.index') }}" class="text-xl flex font-thin items-center gap-2 text-[#14477A] transition-all duration-300 ease-in-out hover:font-bold">
                <svg class="w-5 h-5 text-yellow-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
                <p>Master Artikel</p>
            </a>
            <span class="mx-2 text-3xl text-yellow-400">/</span>
            <p class="text-[#14477A] font-medium text-xl">Buat Artikel</p>
        </div>
        <form action="{{ route('admin.articles.store') }}" class="mx-auto w-[80%]" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-4 gap-5">
                <div class="col-span-3">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                        Artikel</label>
                    <div class="">
                        <input type="text" name="title" value="{{ old('title') }}" id="title"
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
                        <option value="0">Draft</option>
                        <option value="1">Publish</option>
                    </select>
                </div>
                <div class="col-span-3 flex flex-col space-y-2 mt-5">
                    <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                        Artikel</label>
                    <textarea id="editor" name="body">{{ old('body') }}</textarea>
                    @error('body')
                        <span class="w-full text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Gambar Cover (Landscape)</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="image" type="file" multiple onchange="loadFile(event)">
                        @error('image')
                            <span class="w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <img src="" id="output" class="mt-5 w-full mx-auto rounded-lg" alt="">
                </div>
                <div class="">
                    <button id="post"
                        class="py-3 px-10 w-full h-fit bg-[#1751A5] text-white rounded-md md:w-fit mt-5">Buat
                        Artikel</button>
                </div>
            </div>




        </form>
    </div>
    @section('js')
        <script src="{{ asset('asset/tinymce/tinymce.min.js') }}"></script>

        <script>
            tinymce.init({
                selector: '#editor',
                plugins: 'advlist autolink lists link image charmap preview anchor',
                toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image',
            });
            var loadFile = function(event) {
                var output = document.getElementById('output');
                if (event.target.files.length > 0) {
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.style.display = 'block';
                } else {
                    output.src = '';
                    output.style.display = 'none';
                }
            }
        </script>
    @endsection
</x-mainAdmin>


