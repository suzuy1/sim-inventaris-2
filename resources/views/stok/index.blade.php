@extends('dashboard') {{-- ATAU SESUAIKAN DENGAN FILE LAYOUT UTAMA KAMU --}}

@section('content')
    <div class="p-4 sm:p-6 lg:p-8">
        <!-- Header Section yang Diperbaiki -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Manajemen Inventaris</h1>
                    <p class="mt-2 text-sm text-gray-600 max-w-2xl">
                        Kelola dan pantau semua barang inventaris Anda dalam satu tempat. Data dikelompokkan berdasarkan nama barang untuk kemudahan analisis.
                    </p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('inventaris.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Inventaris
                    </a>
                    <button onclick="document.getElementById('importModal').classList.remove('hidden')" class="inline-flex items-center gap-2 rounded-lg bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        Impor Data
                    </button>
                    <a href="{{ route('inventaris.export') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Ekspor Data
                    </a>
                    <a href="{{ route('inventaris.print_all') }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg bg-gray-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                        </svg>
                        Cetak Semua
                    </a>
                </div>
            </div>
        </div>

        <!-- Pencarian yang Diperbaiki -->
        <div class="mb-6">
            <form action="{{ route('inventaris.index') }}" method="GET" class="flex gap-2">
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari nama barang..." 
                        class="block w-full rounded-lg border-gray-300 pl-10 pr-4 py-2.5 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors duration-200"
                        value="{{ request('search') }}"
                    >
                </div>
                <button type="submit" class="rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 transition-colors duration-200">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('inventaris.index') }}" class="rounded-lg bg-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-300 transition-colors duration-200">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Statistik Ringkas -->
        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-lg bg-white p-4 shadow border border-gray-100">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-green-100 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Barang Baik</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $inventaris->sum('total_baik') }}</p>
                    </div>
                </div>
            </div>
            <div class="rounded-lg bg-white p-4 shadow border border-gray-100">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-yellow-100 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Rusak Ringan</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $inventaris->sum('total_rusak_ringan') }}</p>
                    </div>
                </div>
            </div>
            <div class="rounded-lg bg-white p-4 shadow border border-gray-100">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-red-100 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Rusak Berat</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $inventaris->sum('total_rusak_berat') }}</p>
                    </div>
                </div>
            </div>
            <div class="rounded-lg bg-white p-4 shadow border border-gray-100">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-blue-100 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Jenis Barang</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $inventaris->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel yang Diperbaiki -->
        <div class="overflow-hidden rounded-xl shadow border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" rowspan="2" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">No</th>
                            <th scope="col" rowspan="2" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nama Inventaris</th>
                            <th scope="col" colspan="3" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-200">Kondisi Barang</th>
                            <th scope="col" rowspan="2" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Keterangan</th>
                            <th scope="col" rowspan="2" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                <span class="inline-flex items-center">
                                    <span class="h-2 w-2 rounded-full bg-green-400 mr-1"></span>
                                    Baik
                                </span>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                <span class="inline-flex items-center">
                                    <span class="h-2 w-2 rounded-full bg-yellow-400 mr-1"></span>
                                    Rusak Ringan
                                </span>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                <span class="inline-flex items-center">
                                    <span class="h-2 w-2 rounded-full bg-red-400 mr-1"></span>
                                    Rusak Berat
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($inventaris as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $loop->iteration + ($inventaris->currentPage() - 1) * $inventaris->perPage() }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    <div class="font-semibold text-gray-900">{{ $item->nama_barang }}</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $item->total_baik }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        {{ $item->total_rusak_ringan }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        {{ $item->total_rusak_berat }}
                                    </span>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $item->keterangan ?: '-' }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{ route('inventaris.show_grouped', ['nama_barang' => $item->nama_barang]) }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="whitespace-nowrap px-3 py-8 text-sm text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6" />
                                        </svg>
                                        <p class="text-lg font-medium text-gray-900">Tidak ada data inventaris</p>
                                        <p class="text-gray-500 mt-1">Mulai dengan menambahkan inventaris baru</p>
                                        <a href="{{ route('inventaris.create') }}" class="mt-4 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                            Tambah Inventaris
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination yang Diperbaiki -->
        @if($inventaris->hasPages())
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Menampilkan 
                    <span class="font-medium">{{ $inventaris->firstItem() }}</span>
                    sampai
                    <span class="font-medium">{{ $inventaris->lastItem() }}</span>
                    dari
                    <span class="font-medium">{{ $inventaris->total() }}</span>
                    hasil
                </div>
                <div class="flex justify-end">
                    {{ $inventaris->links() }}
                </div>
            </div>
        @endif
    </div>

    <!-- Modal Impor yang Diperbaiki -->
    <div id="importModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('importModal').classList.add('hidden')"></div>
            
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div>
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Impor Data Inventaris</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Unggah file Excel (.xlsx, .xls) yang berisi data inventaris. Pastikan format file sesuai dengan template yang tersedia.
                            </p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('inventaris.import') }}" method="POST" enctype="multipart/form-data" class="mt-5 sm:mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Pilih File</label>
                        <input 
                            type="file" 
                            name="file" 
                            id="file"
                            accept=".xlsx,.xls"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                            required
                        >
                        <p class="mt-1 text-xs text-gray-500">Format yang didukung: .xlsx, .xls</p>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                        <button 
                            type="submit" 
                            class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2"
                        >
                            Impor Data
                        </button>
                        <button 
                            type="button" 
                            onclick="document.getElementById('importModal').classList.add('hidden')"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0"
                        >
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection