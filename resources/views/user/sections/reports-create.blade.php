<x-mainUser>
  <x-slot:title>Report</x-slot:title>

  <div class="container w-full mx-auto my-36 px-5 sm:px-10">
    @if (session()->has('success'))
      <div id="alert-3"
        class="max-w-[980px] mx-auto flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">{{ session('success') }}</div>
        <button type="button"
          class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
          data-dismiss-target="#alert-3" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
        </button>
      </div>
    @endif

    {{-- flex justify-start items-center my-10 gap-2 --}}
    <div class="flex flex-col items-center ">
      <!-- Tombol Kembali -->
      <a href="{{ route('home') }}" 
         class="flex items-center order-1 md:order-none self-start" 
         data-aos="fade-down" 
         data-aos-easing="linear" 
         data-aos-duration="500">
        <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
        <p class="text-xl">Kembali</p>
      </a>
    
      <div class="text-center mb-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
        <h1 class="font-bold text-5xl md:text-6xl relative pb-2 inline-block"> 
          Alur Pelaporan 
          <span class="block h-1 bg-[#F2C808]"></span>
      </h1>
    </div>
    </div>

    <form action="{{ route('reports.store') }}" enctype="multipart/form-data" method="post"
      class="flex flex-col gap-5 max-w-3xl mx-auto my-20" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
      @csrf
      <div class="flex flex-col">
        <label class="text-[#1751A5] mb-2" for="name">Nama</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama"
          class="rounded-md border border-[#1751A5] p-3" required>
        @error('name')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col">
        <label class="text-[#1751A5] mb-2" for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="example@gmail.com"
          class="rounded-md border border-[#1751A5] p-3" required>
        @error('email')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col">
        <label class="text-[#1751A5] mb-2" for="phone_number">Nomor Whatsapp</label>
        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
          placeholder="08xxxxxxxxx" class="rounded-md border border-[#1751A5] p-3" required>
        @error('phone_number')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col">
        <label class="text-[#1751A5] mb-2" for="topics">Pilih Topik Permasalahanmu</label>
          <select name="topics[]" multiple="multiple" id="topicdropdown" class="w-full form-control form-select rounded-md border-[#1751A5] p-3">
              @foreach ($topics as $topic)
                  @if ($topic->id != 5)
                    <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                  @endif
              @endforeach
              @php
                  $lainnya = $topics->where('id', 5)->first();
              @endphp
              @if ($lainnya)
                  <option value="{{ $lainnya->id }}">{{ $lainnya->topic }}</option>
              @endif
          </select>
          @error('topics')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
          @enderror
      </div>
      <div class="flex flex-col">
        <label class="text-[#1751A5] mb-2" for="description">Deskripsi Masalah</label>
        <textarea name="description" id="description" rows="10" class="rounded-md border border-[#1751A5] p-3">{{ old('description') }}</textarea>
        @error('description')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex flex-col mb-3">
        <label class="text-[#1751A5] mb-2" for="image">Foto Bagian Error (Opsional)</label>
        <input type="file" name="image" id="image" class="border rounded-md border-[#1751A5]"
          onchange="loadFile(event)">
        @error('image')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="w-full flex flex-col sm:flex-row items-end justify-between gap-10">
        {{-- <img id="output" class="border-none rounded-lg mx-auto md:m-0 w-[300px]"> --}}
        <button type="submit" class="py-3 px-10 w-full md:w-[500] lg:w-[300] h-fit text-white rounded-md ml-auto" style="background-color: #1751A5;">Kirim Laporan</button>
      </div>
    </form>
  </div>

  <script>
    var loadFile = function(event) {
        const output = document.getElementById('output');
        if (event.target.files.length > 0) {
          output.src = URL.createObjectURL(event.target.files[0]);
          output.style.display = 'block';
        }else{
          output.src = '';
          output.style.display = 'none';
        }
    }
  </script>
  <script>
      $(document).ready(function() {
          $('#topicdropdown').select2({
              placeholder: "Pilih Topik Laporan",
              allowClear: true,
              width: '100%'
          });
    });
  </script>
</x-mainUser>
