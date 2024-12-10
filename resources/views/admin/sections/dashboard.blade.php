<x-mainAdmin>
  <x-slot:title>Dashboard</x-slot:title>

  <div class="p-6 sm:ml-64 my-20">
      <h1 class="text-4xl text-[#14477A] mb-16">Dashboard</h1>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
          <div class="border shadow-lg rounded-lg md:w-80 p-5">
              <img src="/img/dashboard1.png" alt="">
              <h3 class="text-[#14477A] mt-2 font-medium">Laporan Ditangani</h3>
              <h2 class="text-[#14477A] font-semibold text-3xl">{{ $reportsHandled }}</h2>
          </div>
          <div class="border shadow-lg rounded-lg md:w-80 p-5">
              <img src="/img/dashboard2.png" alt="">
              <h3 class="text-[#14477A] mt-2 font-medium">Jumlah Laporan</h3>
              <h2 class="text-[#14477A] font-semibold text-3xl">{{ $totalReports }}</h2>
          </div>
          <div class="border shadow-lg rounded-lg md:w-80 p-5">
              <img src="/img/dashboard3.png" alt="">
              <h3 class="text-[#14477A] mt-2 font-medium">Jumlah Pelapor</h3>
              <h2 class="text-[#14477A] font-semibold text-3xl">{{ $totalReporters }}</h2>
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
                          Tanggal Laporan
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($reports as $report)
                      <tr
                          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <th scope="row"
                              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center dark:text-white">
                              {{ $report->name }}
                          </th>
                          <td class="px-6 py-4 text-center">
                              {{ $report->email }}
                          </td>
                          <td class="px-6 py-4 text-center">
                              @if ($report->is_solved)
                                  <span
                                      class="flex justify-center items-center text-sm font-medium text-gray-900 dark:text-white">
                                      <span
                                          class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>
                                      Sudah ditangani
                                  </span>
                              @else
                                  <span
                                      class="flex justify-center items-center text-sm font-medium text-gray-900 dark:text-white">
                                      <span
                                          class="flex w-2.5 h-2.5 bg-red-500 rounded-full mr-1.5 flex-shrink-0"></span>
                                      Belum ditangani
                                  </span>
                              @endif
                          </td>
                          <td class="px-6 py-4 text-center">
                              {{ date('d-m-Y H:i', strtotime($report->created_at)) }}
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>

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
                  series: [{
                      name: "New users",
                      data: [12, 3, 2, 0, 5, 76, 2],
                      color: "#1A56DB",
                  }, ],
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
                  // console.log(chart);
                  chart.render();
              }
          });
      </script>
  @endsection 
</x-mainAdmin>
