<x-mainAdmin>
    <x-slot:title>Topics</x-slot:title>

    <div class="p-6 sm:ml-64 my-20">
        <h1 class="text-4xl text-[#14477A] mb-4">Master Topic</h1>
        {{-- toast --}}
        @if (session('success'))
            <div id="toast-success"
                class="flex items-center my-2 w-full p-4 mb-4 text-green-500 bg-green-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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
        {{-- end toast --}}

        <div class="flex items-center justify-between gap-2">
            <a href="#" data-modal-target="tambah-topik-modal" data-modal-toggle="tambah-topik-modal"
                class="text-white rounded-full md:rounded-md bg-[#379237] p-2">
                <svg class="w-4 h-4 text-white md:hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
                <p class="hidden md:block">Tambah Topik</p>
            </a>
        </div>


        <?php $id = 1; ?>
        <div class="relative overflow-x-auto border shadow-xl sm:rounded-lg my-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#14477A] text-center dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            topik
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>


              

                <tbody>
                    @forelse ($topics as $topic)
                        @if ($topic->id != 5)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 max-w-xs text-gray-900 font-medium py-4 text-center">
                                {{ $id++ }}
                            </td>
                            <td class="px-6 max-w-xs text-gray-900 font-medium py-4 text-center">
                                {{ $topic->topic }}
                            </td>
                            
                            <td class="px-6 py-4 flex justify-center items-start gap-2">
                                <a href="#" data-modal-target="{{ $topic->id }}"
                                    data-modal-toggle="{{ $topic->id }}" class="edit-modal-toggle"
                                    data-id="{{ $topic->id }}">
                                    <div class="bg-yellow-300 hover:bg-gray-400 p-2 rounded-lg w-fit">
                                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                        </svg>
                                    </div>
                                </a>

                                <form action="{{ route('admin.topics.destroy', $topic->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Anda yakin ingin mengarsip Topik ini?')">
                                        <div class="bg-red-500 hover:bg-gray-400 p-2 rounded-lg w-fit">
                                            <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4">
                                <p class="text-center">Tidak ada Topik</p>
                            </td>
                        </tr>
                    @endforelse

                    @php
                        $lainnya = $topics->where('id', 5)->first();
                    @endphp
                    @if ($lainnya)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 max-w-xs text-gray-900 font-medium py-4 text-center">
                                    {{ $id++ }}
                            </td>
                            <td class="px-6 max-w-xs text-gray-900 font-medium py-4 text-center">
                                {{ $lainnya->topic }}
                            </td>
                            
                            <td class="px-6 py-4 flex justify-center items-start gap-2">
                                <a href="#" data-modal-target="{{ $lainnya->id }}"
                                    data-modal-toggle="{{ $lainnya->id }}" class="edit-modal-toggle"
                                    data-id="{{ $lainnya->id }}">
                                    <div class="bg-yellow-300 hover:bg-gray-400 p-2 rounded-lg w-fit">
                                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                        </svg>
                                    </div>
                                </a>

                                <form action="{{ route('admin.topics.destroy', $lainnya->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Anda yakin ingin mengarsip Topik ini?')">
                                        <div class="bg-red-500 hover:bg-gray-400 p-2 rounded-lg w-fit">
                                            <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex justify-center sm:justify-end">
            {{ $topics->links() }}
        </div>
        {{-- modal delete --}}
    </div>


    {{-- Modal Tambah Topik --}}
    <div id="tambah-topik-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="tambah-topik-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Topik</h3>
                    <form class="space-y-6" action="{{ route('admin.topics.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div>
                            <input type="text" name="topic" id="topic" value="{{ old('topic') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan nama topik" required>
                            @error('topic')
                                <span class="w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Tambah End --}}

    {{-- modal edit --}}
    @foreach ($topics as $topic)
        {{-- {{ dd($topic->topic) }} --}}
        <div id="{{ $topic->id }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="{{ $topic->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Pengaduan</h3>
                        <form class="space-y-6" action="{{ route('admin.topics.update', $topic) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <p>Topik ke-{{ $topic->id }}</p>
                                <input type="text" name="topic" value="{{ old('topic', $topic->topic) }}" id="topic" class="rbg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul Artikel">
                                @error('topic')
                                    <span class="w-full text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal edit end --}}
</x-mainAdmin>
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        const modalToggles = document.querySelectorAll('.show-topic-modal-toggle');

        modalToggles.forEach(el => {
            el.addEventListener('click', async function(event) {
                const APP_URL = {!! json_encode(url('/')) !!}
                const modalBody = document.querySelector('#show-topic-modal-body');

                const response = await fetch(`${APP_URL}/dashboard/topics/${this.dataset.id}`);
                const data = await response.json();

                const topic = data.topic;

                modalBody.querySelector('.topic').innerHTML = topic.topic;
            });
        });
    </script>
@endsection
