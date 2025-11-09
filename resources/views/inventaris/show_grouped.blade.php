@extends('dashboard') {{-- ATAU SESUAIKAN DENGAN FILE LAYOUT UTAMA KAMU --}}

@section('content')
    <div class="p-4 sm:p-6 lg:p-8">
        <!-- Header Section yang Diperbaiki -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center gap-3 mb-2">
                        <a href="{{ route('inventaris.index') }}" class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Kembali ke Daftar
                        </a>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Detail Inventaris</h1>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            {{ $inventarisDetails->total() }} Unit
                        </span>
                        <span class="text-sm text-gray-600">•</span>
                        <p class="text-sm text-gray-600">Barang: <span class="font-semibold text-gray-800">{{ $namaBarang }}</span></p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('inventaris.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Unit
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistik Ringkas untuk Detail -->
        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
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
                        <p class="text-sm font-medium text-gray-500">Total Baik</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $inventarisDetails->sum('kondisi_baik') }}</p>
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
                        <p class="text-2xl font-semibold text-gray-900">{{ $inventarisDetails->sum('kondisi_rusak_ringan') }}</p>
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
                        <p class="text-2xl font-semibold text-gray-900">{{ $inventarisDetails->sum('kondisi_rusak_berat') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Detail yang Diperbaiki -->
        <div class="overflow-hidden rounded-xl shadow border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">No</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Kode Inventaris</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Lokasi</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Kondisi</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Keterangan</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($inventarisDetails as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-150 group">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ $loop->iteration + ($inventarisDetails->currentPage() - 1) * $inventarisDetails->perPage() }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    <div class="font-mono font-medium text-gray-900 bg-gray-50 px-2 py-1 rounded border text-xs inline-block">
                                        {{ $item->kode_inventaris }}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $item->room->nama_ruangan ?? 'N/A' }}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    <div class="flex flex-col gap-1">
                                        @if($item->kondisi_baik > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 w-fit">
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-400 mr-1"></span>
                                                Baik: {{ $item->kondisi_baik }}
                                            </span>
                                        @endif
                                        @if($item->kondisi_rusak_ringan > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 w-fit">
                                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-400 mr-1"></span>
                                                Ringan: {{ $item->kondisi_rusak_ringan }}
                                            </span>
                                        @endif
                                        @if($item->kondisi_rusak_berat > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 w-fit">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-400 mr-1"></span>
                                                Berat: {{ $item->kondisi_rusak_berat }}
                                            </span>
                                        @endif
                                        @if($item->kondisi_baik == 0 && $item->kondisi_rusak_ringan == 0 && $item->kondisi_rusak_berat == 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                Tidak Ada Data
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 max-w-xs">
                                    <div class="truncate" title="{{ $item->keterangan }}">
                                        {{ $item->keterangan ?: '-' }}
                                    </div>
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <a href="{{ route('inventaris.show', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('inventaris.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-900 transition-colors duration-200" title="Ubah">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="whitespace-nowrap px-3 py-8 text-sm text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6" />
                                        </svg>
                                        <p class="text-lg font-medium text-gray-900">Tidak ada data unit</p>
                                        <p class="text-gray-500 mt-1">Belum ada unit untuk barang ini</p>
                                        <a href="{{ route('inventaris.create') }}" class="mt-4 inline-flex items-center gap-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                            Tambah Unit Pertama
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
        @if($inventarisDetails->hasPages())
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Menampilkan 
                    <span class="font-medium">{{ $inventarisDetails->firstItem() }}</span>
                    sampai
                    <span class="font-medium">{{ $inventarisDetails->lastItem() }}</span>
                    dari
                    <span class="font-medium">{{ $inventarisDetails->total() }}</span>
                    unit
                </div>
                <div class="flex justify-end">
                    {{ $inventarisDetails->links() }}
                </div>
            </div>
        @endif
    </div>

    <!-- Modal Konfirmasi Hapus (Opsional) -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Hapus Data</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                            Hapus
                        </button>
                    </form>
                    <button type="button" onclick="document.getElementById('deleteModal').classList.add('hidden')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(form) {
            document.getElementById('deleteForm').action = form.action;
            document.getElementById('deleteModal').classList.remove('hidden');
            return false;
        }
    </script>
@endsection