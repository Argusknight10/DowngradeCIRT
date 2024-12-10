<x-mainAdmin>
    <x-slot:title>Reports</x-slot:title>

    <div class="p-6 sm:ml-64 my-20">
        <h1 class="text-4xl text-[#14477A] mb-4">Laporan Pengaduan</h1>
        {{-- toas --}}
        @if (session('success'))
            <div id="toast-success"
                class="flex items-center w-full p-4 mb-4 text-green-500 bg-green-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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
        <div class="flex justify-between items-center">
            <div class="border flex justify-center items-center gap-3 rounded-md text-sm">
                <a href="{{ request()->fullUrlWithQuery(['status' => 'belum']) }}" class="cursor-pointer px-2 text-[#14477A] {{ request('status') === 'belum' || !request('status') ? 'active' : '' }}">Belum ditangani</a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'sudah']) }}" class="cursor-pointer px-2 text-[#14477A] {{ request('status') === 'sudah' ? 'active' : '' }}">Sudah ditangani</a>
            </div>
            <form class="flex items-center sm:w-80" method="GET" action="{{ route('admin.reports.index') }}">
                <label for="simple-search" class="sr-only">Search</label>
                <input type="text" name="p" id="simple-search" value="{{ request('p') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full max-w-[400px] py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Reports">
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-[#14477A] bg-[#F2C808] rounded-lg border border-[#F2C808]">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>

        {{-- Table View --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#14477A] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center dark:text-white">
                                {{ $report->name }}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $report->email }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($report->is_solved == 0)
                                    <span
                                        class="flex justify-center items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                            class="flex w-2.5 h-2.5 bg-red-500 rounded-full mr-1.5 flex-shrink-0"></span>Belum
                                        ditangani</span>
                                @else
                                    <span
                                        class="flex justify-center items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                            class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>Sudah
                                        ditangani</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex justify-center items-start gap-2">
                                <!-- Tombol untuk membuka modal show -->
                                <a href="#" 
                                data-modal-target="show-modal-toggle{{ $report->id }}" 
                                data-modal-toggle="show-modal-toggle{{ $report->id }}" 
                                class="show-modal-toggle" 
                                data-id="show-modal-toggle{{ $report->id }}">
                                <div class="bg-[#0D6EFD] hover:bg-gray-400 p-2 rounded-lg w-fit">
                                    <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
                                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                </div>
                                </a>

                                <!-- Tombol untuk membuka modal edit -->
                                <a href="#" 
                                data-modal-target="edit-modal-toggle{{ $report->id }}" 
                                data-modal-toggle="edit-modal-toggle{{ $report->id }}" 
                                class="edit-modal-toggle" 
                                data-id="edit-modal-toggle{{ $report->id }}">
                                <div class="bg-yellow-300 hover:bg-gray-400 p-2 rounded-lg w-fit">
                                    <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                        <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                    </svg>
                                </div>
                                </a>
                                <form action="{{ route('admin.reports.destroy', $report->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Anda yakin ingin mengarsipkan data ini?')">
                                        <div class="bg-red-500 hover:bg-gray-400 p-2 rounded-lg w-fit">
                                            <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data laporan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex justify-center sm:justify-end">
            {{ $reports->links() }}

        </div>
    </div>


    {{-- modal show --}}
    @foreach ($reports as $report)
    {{-- {{ dd($report); }} --}}
    <div id="show-modal-toggle{{ $report->id }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-xl max-h-full"> <!-- Ubah max-w-md menjadi max-w-lg atau max-w-xl -->
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Detail Laporan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="show-modal-toggle{{ $report->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="max-w-full px-4 py-2 overflow-hidden">
                    <table class="w-full table-fixed text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                    Nama
                                </th>
                                <td class="px-6 py-4">
                                    <strong>{{ $report->name }}</strong>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                    Email
                                </th>
                                <td class="px-6 py-4">
                                    <strong>{{ $report->email }}</strong>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                    No. Whatsapp
                                </th>
                                <td class="px-6 py-4">
                                    <strong>{{ $report->phone_number }}</strong>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                    Topik
                                </th>
                                <td class="px-6 py-4 break-words whitespace-normal">
                                    <ul class="break-words">
                                        <li>{!! $report->formattedTopics !!}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                    Deskripsi
                                </th>
                                <td class="px-6 py-4 break-words whitespace-normal">
                                    <strong>{{ $report->description }}</strong>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                    Foto
                                </th>
                                <td class="px-6 py-4">
                                    {{-- {{ dd($report->image) }} --}}
                                    <img src="{{ $report->image ? Storage::url($report->image) : Storage::url('NoImg.jpg') }}" class="w-full max-w-xs" alt="Report Image">
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- modal show end --}}

    {{-- modal edit --}}
    @foreach ($reports as $report)
        {{-- {{ dd($report); }} --}}
        <div id="edit-modal-toggle{{ $report->id }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-modal-toggle{{ $report->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Pengaduan</h3>
                        <form class="space-y-6" action="{{ route('admin.reports.update', $report) }}" method="post">
                            <input type="hidden" name="name" id="name" value="{{ old('name', $report->name) }}">
                            <input type="hidden" name="email" id="email" value="{{ old('email', $report->email) }}">
                            @foreach (old('topics', $report->topics->pluck('id')->toArray()) as $selectedTopic)
                                <input type="hidden" name="topics[]" value="{{ $selectedTopic }}">
                            @endforeach
                            <input type="hidden" name="description" id="description" value="{{ old('description', $report->description) }}">
                            @csrf
                            @method('PUT')
                            <div>
                                <p>{{ $report->id }}</p>
                                {{-- {{ dd($report->topics) }} --}}
                                <label for="is_solved"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="is_solved" name="is_solved"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $report->is_solved }}" hidden>
                                        @if ($report->is_solved == 0)
                                            Belum ditangani
                                        @else
                                            Sudah ditangani
                                        @endif
                                    </option>
                                    <option value="0">Belum ditangani</option>

                                    <option value="1">Sudah ditangani</option>
                                </select>
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
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- script sweet alert --}}
    {{-- script filter --}}
    <script>
        const options = document.querySelectorAll('#filter');
        const options2 = document.querySelectorAll('#filter2');

        options.forEach(option => {
            option.addEventListener('click', () => {
                // Hapus kelas "aktif" dari semua elemen

                options2.forEach(opt => {
                    opt.classList.remove('active2');
                });

                // Tambahkan kelas "aktif" ke elemen yang diklik
                option.classList.add('active');
            });
        });

        options2.forEach(option => {
            option.addEventListener('click', () => {
                // Hapus kelas "aktif" dari semua elemen

                options.forEach(opt => {
                    opt.classList.remove('active');
                });

                // Tambahkan kelas "aktif" ke elemen yang diklik
                option.classList.add('active2');
            });
        });
    </script>
@endsection
