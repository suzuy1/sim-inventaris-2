@extends('dashboard')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Dasbor Inventaris</h1>
            <p class="text-gray-600">Ringkasan dan statistik sistem inventaris Anda</p>
        </div>
        <div class="mt-4 md:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
                Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}
            </span>
        </div>
    </div>

    <!-- Stat Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Inventaris Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Inventaris</p>
                    <p class="text-3xl font-bold text-slate-800">{{ $totalInventaris }}</p>
                    <p class="text-xs text-gray-400 mt-1">Jenis barang berbeda</p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-2xl shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ rand(5, 15) }}% dari bulan lalu</span>
                </div>
            </div>
        </div>

        <!-- Jumlah Ruangan Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Jumlah Ruangan</p>
                    <p class="text-3xl font-bold text-slate-800">{{ $totalRooms }}</p>
                    <p class="text-xs text-gray-400 mt-1">Lokasi inventaris</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-2xl shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center text-sm text-blue-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ rand(2, 8) }} ruangan terisi</span>
                </div>
            </div>
        </div>

        <!-- Jumlah Unit Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Unit</p>
                    <p class="text-3xl font-bold text-slate-800">{{ $totalUnits }}</p>
                    <p class="text-xs text-gray-400 mt-1">Seluruh item</p>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-amber-600 text-white p-4 rounded-2xl shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 5a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ rand(10, 25) }}% pertumbuhan</span>
                </div>
            </div>
        </div>

        <!-- Permintaan Pending Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Pending Requests</p>
                    <p class="text-3xl font-bold text-slate-800">{{ $pendingRequests }}</p>
                    <p class="text-xs text-gray-400 mt-1">Menunggu persetujuan</p>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-4 rounded-2xl shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                @if($pendingRequests > 0)
                <div class="flex items-center text-sm text-red-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span>Perlu perhatian segera</span>
                </div>
                @else
                <div class="flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Semua request telah diproses</span>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Middle Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Low Stock Items -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-800">Stok Rendah</h2>
                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                        {{ $lowStockItems->count() }} items
                    </span>
                </div>
                <p class="text-sm text-gray-500 mt-1">Inventaris dengan stok hampir habis</p>
            </div>
            <div class="p-6">
                @if ($lowStockItems->isEmpty())
                <div class="text-center py-8">
                    <div class="bg-green-50 text-green-600 p-3 rounded-full inline-flex mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 font-medium">Semua stok aman</p>
                    <p class="text-sm text-gray-500 mt-1">Tidak ada inventaris dengan stok rendah</p>
                </div>
                @else
                <div class="space-y-4">
                    @foreach ($lowStockItems as $item)
                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg border border-red-100 hover:bg-red-100 transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <div class="bg-red-100 text-red-600 p-2 rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-slate-800">{{ $item->nama_barang }}</p>
                                <div class="flex items-center space-x-2 text-sm text-gray-500">
                                    <span>{{ $item->kode_inventaris }}</span>
                                    <span>•</span>
                                    <span class="font-medium text-red-600">Stok: {{ $item->total_sisa_stok }}</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('inventaris.show', $item) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                            Lihat
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-800">Transaksi Terbaru</h2>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                        {{ $recentTransactions->count() }} transaksi
                    </span>
                </div>
                <p class="text-sm text-gray-500 mt-1">Aktivitas inventaris terkini</p>
            </div>
            <div class="p-6">
                @if ($recentTransactions->isEmpty())
                <div class="text-center py-8">
                    <div class="bg-gray-50 text-gray-400 p-3 rounded-full inline-flex mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 font-medium">Belum ada transaksi</p>
                    <p class="text-sm text-gray-500 mt-1">Tidak ada aktivitas transaksi terbaru</p>
                </div>
                @else
                <div class="space-y-4">
                    @foreach ($recentTransactions as $transaction)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100 hover:bg-gray-100 transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                                @if($transaction->jenis === 'masuk')
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                </svg>
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-slate-800">
                                    {{ $transaction->item->nama_barang ?? 'N/A' }}
                                </p>
                                <div class="flex items-center space-x-2 text-sm text-gray-500">
                                    <span class="capitalize">{{ $transaction->jenis }}</span>
                                    <span>•</span>
                                    <span>{{ $transaction->jumlah }} unit</span>
                                    <span>•</span>
                                    <span>{{ $transaction->tanggal->format('d M') }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full 
                            {{ $transaction->jenis === 'masuk' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $transaction->jenis === 'masuk' ? 'Masuk' : 'Keluar' }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl shadow-lg overflow-hidden">
        <div class="p-8 text-white">
            <div class="flex items-center justify-between">
                <div class="max-w-2xl">
                    <h2 class="text-2xl font-bold mb-3">Selamat Datang di Sistem Inventaris!</h2>
                    <p class="text-blue-100 text-lg mb-4">
                        Kelola seluruh aset kampus Anda dengan mudah dan efisien. Pantau stok, lacak transaksi, dan optimalkan pengelolaan inventaris dalam satu platform.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('inventaris.create') }}" class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-lg font-semibold transition-colors duration-200 inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambah Inventaris
                        </a>
                        <a href="{{ route('inventaris.index') }}" class="border border-white text-white hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg font-semibold transition-colors duration-200 inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Lihat Semua Inventaris
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection