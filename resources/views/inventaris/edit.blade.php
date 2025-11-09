@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Inventaris</h1>
                <p class="text-gray-600">Update data inventaris: {{ $inventaris->nama_barang }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('inventaris.index') }}" class="inline-flex items-center gap-2 rounded-lg bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('inventaris.update', $inventaris) }}" method="POST" x-data="{ kategori: '{{ old('kategori', $inventaris->kategori) }}' }">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Barang -->
                <div class="md:col-span-2">
                    <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-2">Nama Barang *</label>
                    <input 
                        type="text" 
                        name="nama_barang" 
                        id="nama_barang" 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200 @error('nama_barang') border-red-300 @enderror" 
                        value="{{ old('nama_barang', $inventaris->nama_barang) }}" 
                        required
                    >
                    @error('nama_barang')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kode Inventaris -->
                <div>
                    <label for="kode_inventaris" class="block text-sm font-medium text-gray-700 mb-2">Kode Inventaris *</label>
                    <input 
                        type="text" 
                        name="kode_inventaris" 
                        id="kode_inventaris" 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200 @error('kode_inventaris') border-red-300 @enderror" 
                        value="{{ old('kode_inventaris', $inventaris->kode_inventaris) }}" 
                        required
                    >
                    @error('kode_inventaris')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select 
                        name="kategori" 
                        id="kategori" 
                        x-model="kategori"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200"
                    >
                        <option value="">Pilih Kategori</option>
                        <option value="Elektronik" {{ old('kategori', $inventaris->kategori) == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                        <option value="Furniture" {{ old('kategori', $inventaris->kategori) == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                        <option value="Alat Tulis" {{ old('kategori', $inventaris->kategori) == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis</option>
                        <option value="Kendaraan" {{ old('kategori', $inventaris->kategori) == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                        <option value="Lainnya" {{ old('kategori', $inventaris->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Unit -->
                <div>
                    <label for="unit_id" class="block text-sm font-medium text-gray-700 mb-2">Unit</label>
                    <select 
                        name="unit_id" 
                        id="unit_id" 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200"
                    >
                        <option value="">Pilih Unit</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ old('unit_id', $inventaris->unit_id) == $unit->id ? 'selected' : '' }}>
                                {{ $unit->nama_unit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Ruangan -->
                <div>
                    <label for="room_id" class="block text-sm font-medium text-gray-700 mb-2">Ruangan</label>
                    <select 
                        name="room_id" 
                        id="room_id" 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200"
                    >
                        <option value="">Pilih Ruangan</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id', $inventaris->room_id) == $room->id ? 'selected' : '' }}>
                                {{ $room->nama_ruangan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Kondisi Barang -->
                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="kondisi_baik" class="block text-sm font-medium text-gray-700 mb-2">Kondisi Baik</label>
                        <input 
                            type="number" 
                            name="kondisi_baik" 
                            id="kondisi_baik" 
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200" 
                            value="{{ old('kondisi_baik', $inventaris->kondisi_baik) }}" 
                            min="0"
                        >
                    </div>
                    <div>
                        <label for="kondisi_rusak_ringan" class="block text-sm font-medium text-gray-700 mb-2">Rusak Ringan</label>
                        <input 
                            type="number" 
                            name="kondisi_rusak_ringan" 
                            id="kondisi_rusak_ringan" 
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200" 
                            value="{{ old('kondisi_rusak_ringan', $inventaris->kondisi_rusak_ringan) }}" 
                            min="0"
                        >
                    </div>
                    <div>
                        <label for="kondisi_rusak_berat" class="block text-sm font-medium text-gray-700 mb-2">Rusak Berat</label>
                        <input 
                            type="number" 
                            name="kondisi_rusak_berat" 
                            id="kondisi_rusak_berat" 
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200" 
                            value="{{ old('kondisi_rusak_berat', $inventaris->kondisi_rusak_berat) }}" 
                            min="0"
                        >
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                    <textarea 
                        name="keterangan" 
                        id="keterangan" 
                        rows="3" 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200"
                    >{{ old('keterangan', $inventaris->keterangan) }}</textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col-reverse md:flex-row gap-3 md:justify-end">
                <a href="{{ route('inventaris.index') }}" class="inline-flex justify-center rounded-lg bg-gray-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Inventaris
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
