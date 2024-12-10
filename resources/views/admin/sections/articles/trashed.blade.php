<x-mainAdmin>
  <x-slot:title>Trash Articles</x-slot:title>

  <div class="p-6 sm:ml-64 my-20">
    <h1 class="text-4xl text-[#14477A] mb-4">Sampah Artikel</h1>
    {{-- toast --}}
    @if (session('success'))
      <div id="toast-success"
        class="flex items-center my-2 w-full p-4 mb-4 text-green-500 bg-green-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
          class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 rounded-lg dark:bg-green-800 dark:text-green-200">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
        </button>
      </div>
    @endif
    {{-- end toast --}}

    {{-- search --}}
    <div class="flex items-center justify-end">
      <form class="flex items-center sm:w-80">
        <label for="simple-search" class="sr-only">Search</label>
        <input type="text" name="q" id="simple-search" value="{{ request('q') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full max-w-[400px] py-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Cari Artikel">
        <button type="submit"
          class="p-2.5 ml-2 text-sm font-medium text-[#14477A] bg-[#F2C808] rounded-lg border border-[#F2C808]">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
          <span class="sr-only">Search</span>
        </button>
      </form>
    </div>
    {{-- end search input --}}

    {{-- table view --}}
    <div class="relative overflow-x-auto border shadow-xl sm:rounded-lg my-10">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-[#14477A] text-center dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              Judul Artikel
            </th>
            <th scope="col" class="px-6 py-3">
              Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse($articles as $article)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td class="px-6 max-w-xs text-gray-900 font-medium py-4 text-center">
                {{ $article->title }}
              </td>
              <td class="px-6 max-w-xs text-gray-900 py-4 text-center">
                {{ $article->published_at }}
              </td>
              <td class="py-4 px-6 max-w-xs">
                @if ($article->is_published == 0)
                  <span
                    class="flex items-center w-fit justify-center text-sm font-medium text-gray-900 dark:text-white"><span
                      class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full mr-1.5 flex-shrink-0"></span>Draft</span>
                @else
                  <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                      class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>Publish</span>
                @endif
              </td>
              <td class="px-6 py-4 flex justify-center items-start gap-2">
                <form action="{{ route('admin.trashed.articles.restore', $article->slug) }}" method="post">
                  @csrf
                  <button type="submit" onclick="return confirm('Anda yakin ingin mengembalikan artikel ini?')">
                    <div class="bg-[#198754] hover:bg-gray-400 p-2 rounded-lg w-fit">
                      <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                          d="M13.606 3.748V2.53a1.542 1.542 0 0 0-.872-1.431 1.352 1.352 0 0 0-1.472.2L6.155 5.552a1.6 1.6 0 0 0 0 2.415l5.108 4.25a1.355 1.355 0 0 0 1.472.2 1.546 1.546 0 0 0 .872-1.428v-1.09a4.721 4.721 0 0 1 3.7 2.868 1.186 1.186 0 0 0 1.08.73 1.225 1.225 0 0 0 1.213-1.286v-1.33a6.923 6.923 0 0 0-5.994-7.133Z" />
                        <path
                          d="m2.434 6.693 5.517-4.95A1 1 0 0 0 6.615.257L1.1 5.205a2.051 2.051 0 0 0-.01 3.035l5.61 5.088a1 1 0 1 0 1.344-1.482l-5.61-5.153Z" />
                      </svg>
                    </div>
                  </button>
                </form>

                <form action="{{ route('admin.trashed.articles.force', $article->slug) }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="return confirm('Anda yakin ingin menghapus permanen artikel ini?')">
                    <div class="bg-red-500 hover:bg-gray-400 p-2 rounded-lg w-fit">
                      <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                      </svg>
                    </div>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">
                <p class="text-center">Tidak Ada Artikel</p>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    {{-- pagination --}}
    <div class="flex justify-center sm:justify-end">
      {{ $articles->links() }}
    </div>
  </div>
</x-mainAdmin>

@section('js')
@endsection
