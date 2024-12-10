@extends('admin.main')

@section('title')
    Dashboard
@endsection

@section('content')
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
                <p class="cursor-pointer px-2 text-[#14477A] active" id="filter">Belum ditangani</p>
                <p class="cursor-pointer px-2 text-[#14477A]" id="filter2">Sudah ditangani</p>
            </div>
            <form class="flex items-center sm:w-80">
                <label for="simple-search" class="sr-only">Search</label>
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full max-w-[400px] py-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Laporan">
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
                                <a href="#" data-modal-target="show-report-modal" class="show-report-modal-toggle"
                                    data-modal-toggle="show-report-modal" data-id="{{ $report->id }}">
                                    <div class="bg-[#0D6EFD] hover:bg-gray-400 p-2 rounded-lg w-fit">
                                        <svg class="w-5 h-5 text-gray-200" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2">
                                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                                <a href="#" data-modal-target="{{ $report->id }}"
                                    data-modal-toggle="{{ $report->id }}" class="edit-modal-toggle"
                                    data-id="{{ $report->id }}">
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

    {{-- modal view --}}
    <div id="show-report-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Detail Laporan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="show-report-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="show-report-modal-body">
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nama
                            </th>
                            <td class="px-6 py-4">
                                <strong class="name"></strong>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Email
                            </th>
                            <td class="px-6 py-4">
                                <strong class="email"></strong>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No. Whatsapp
                            </th>
                            <td class="px-6 py-4">
                                <strong class="phone_number"></strong>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Topik
                            </th>
                            <td class="px-6 py-4">
                                <strong class="topic"></strong>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Deskripsi
                            </th>
                            <td class="px-6 py-4">
                                <strong class="description"></strong>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Foto
                            </th>
                            <td class="px-6 py-4">
                                <img src="" class="image w-96" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($reports as $report)
        <div id="{{ $report->id }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="{{ $report->id }}">
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
                            @csrf
                            @method('PUT')
                            <div>
                                <p>{{ $report->id }}</p>
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
@endsection
@section('js')
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- script sweet alert --}}
    {{-- script filter --}}
    <script>
        const modalToggles = document.querySelectorAll('.show-report-modal-toggle');

        modalToggles.forEach(el => {
            el.addEventListener('click', async function(event) {
                const APP_URL = {!! json_encode(url('/')) !!}
                const modalBody = document.querySelector('#show-report-modal-body');

                const response = await fetch(`${APP_URL}/dashboard/reports/${this.dataset.id}`);
                const data = await response.json();

                const report = data.report;


                modalBody.querySelector('.name').innerHTML = report.name;
                modalBody.querySelector('.email').innerHTML = report.email;
                modalBody.querySelector('.phone_number').innerHTML = report.phone_number;
                modalBody.querySelector('.topic').innerHTML = report.topic;
                modalBody.querySelector('.description').innerHTML = report.description;

                // check if image null
                if (report.image) {
                // modalBody.querySelector('.image').src = URL.createObjectURL();
                    modalBody.querySelector('.image').src = `${APP_URL}/storage/${report.image}`;
                }
            });
        });


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
