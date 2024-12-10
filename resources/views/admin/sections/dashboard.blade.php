@extends('admin.main')

@section('title')
  Dashboard
@endsection

@section('content')
<div class="p-6 sm:ml-64 my-20">
  <h1 class="text-4xl text-[#14477A] mb-16">Dashboard</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    <div class="border shadow-lg rounded-lg md:w-80 p-5">
        <img src="/img/dashboard1.png" alt="">
        <h3 class="text-[#14477A] mt-2 font-medium">Laporan Ditangani</h3>
        <h2 class="text-[#14477A] font-semibold text-3xl">120</h2>
    </div>
    <div class="border shadow-lg rounded-lg md:w-80 p-5">
        <img src="/img/dashboard2.png" alt="">
        <h3 class="text-[#14477A] mt-2 font-medium">Jumlah Laporan</h3>
        <h2 class="text-[#14477A] font-semibold text-3xl">120</h2>
    </div>
    <div class="border shadow-lg rounded-lg md:w-80 p-5">
        <img src="/img/dashboard3.png" alt="">
        <h3 class="text-[#14477A] mt-2 font-medium">Jumlah Pelapor</h3>
        <h2 class="text-[#14477A] font-semibold text-3xl">120</h2>
    </div>
  </div>

  {{-- chart --}}

<div class="mt-16 w-full border bg-white rounded-lg shadow-lg dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between">
      <div>
        <h5 class="leading-none text-xl md:text-3xl font-bold text-gray-900 dark:text-white pb-2">Statistik Laporan Per Bulan</h5>
      </div>
    </div>
    <div id="area-chart"></div>
    <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
      <div class="flex justify-between items-center pt-5">
        <!-- Dropdown menu -->
      </div>
    </div>
  </div>

  {{-- table --}}
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center dark:text-white">
                    Namamamama
                </th>
                <td class="px-6 py-4 text-center">
                    AKOAKSOKSA
                </td>
                <td class="px-6 py-4">

                        <span class="flex justify-center items-center text-sm font-medium text-gray-900 dark:text-white"><span class="flex w-2.5 h-2.5 bg-red-500 rounded-full mr-1.5 flex-shrink-0"></span>Belum ditangani</span>

                        <span class="flex justify-center items-center text-sm font-medium text-gray-900 dark:text-white"><span class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>Sudah ditangani</span>

                </td>
                <td class="px-6 py-4 flex justify-center items-center gap-2">
                    <a href="#" data-modal-target="DetailReport" class="show_detail_report" data-modal-toggle="default-modal">
                        <div class="bg-[#0D6EFD] hover:bg-gray-400 p-2 rounded-lg w-fit">
                        <svg class="w-5 h-5 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        </div>
                    </a>
                    <a href="#">
                        <div class="bg-yellow-300 hover:bg-gray-400 p-2 rounded-lg w-fit">
                          <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                          </svg>
                        </div>
                      </a>

                      <a href="" onclick="">
                        <div class="bg-red-500 hover:bg-gray-400 p-2 rounded-lg w-fit">
                          <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                          </svg>
                        </div>
                      </a>
                </td>
            </tr>
        </tbody>

  @endsection
@section('js')
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
      let options = {
        chart: {
          height: "100%",
          maxWidth: "100%",
          type: "area",
          fontFamily: "Inter, sans-serif",
          dropShadow: {
            enabled: false,
          },
          toolbar: {
            show: false,
          },
        },
        tooltip: {
          enabled: true,
          x: {
            show: true,
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
          },
        },
        dataLabels: {
          enabled: true,
        },
        stroke: {
          width: 6,
        },
        grid: {
          show: false,
          strokeDashArray: 4,
          padding: {
            left: 2,
            right: 2,
            top: 0
          },
        },
        series: [
          {
            name: "New users",
            data: [12, 3, 2, 0, 5, 76, 2],
            color: "#1A56DB",
          },
        ],
        xaxis: {
          categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          labels: {
            show: true,
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: true,
          },
        },
        yaxis: {
          show: false,
        },
      }

      if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("area-chart"), options);
        chart.render();
      }
    });
  </script>
  </div>
@endsection
