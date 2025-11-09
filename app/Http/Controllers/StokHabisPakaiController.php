<?php

namespace App\Http\Controllers;

use App\Models\StokHabisPakai;
use App\Models\Inventaris; // Penting untuk relasi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Jika Anda perlu transaksi

class StokHabisPakaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Gunakan Eager Loading 'inventaris' untuk mengambil data relasi
        $query = StokHabisPakai::with('inventaris');

        if ($search) {
            $query->where(function ($q) use ($search) {
                // Cari di tabel 'stok_habis_pakais'
                $q->where('satuan', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%")
                  // Cari di relasi 'inventaris'
                  ->orWhereHas('inventaris', function($inventarisQuery) use ($search) {
                      $inventarisQuery->where('nama_barang', 'like', "%{$search}%")
                                      ->orWhere('kode_inventaris', 'like', "%{$search}%");
                  });
            });
        }

        $stokBarang = $query->orderBy('id', 'desc')->paginate(15);

        // Arahkan ke view baru yang akan kita buat di langkah 3
        return view('stok.index', compact('stokBarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data inventaris yang relevan (misal, yang kategorinya ATK)
        // $inventarisItems = Inventaris::where('kategori', 'ATK')->get(); 
        // return view('stok.create', compact('inventarisItems'));
        
        // Atau jika Anda ingin buat barang baru sekaligus stoknya
        return view('stok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            // 'inventaris_id' => 'required|exists:inventaris,id', // Jika memilih barang yang ada
            'nama_barang' => 'required|string|max:255', // Jika input baru
            'kode_inventaris' => 'required|string|unique:inventaris,kode_inventaris', // Jika input baru
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // SANGAT DIREKOMENDASIKAN pakai DB Transaction
        // karena Anda menyentuh 2 tabel (inventaris & stok)
        try {
            DB::beginTransaction();

            // 1. Buat data di tabel 'inventaris' dulu
            // Perhatikan: Model Inventaris Anda akan auto-generate kode unik jika 'kode_inventaris' tidak diisi
            // Tapi untuk BHP, kodenya mungkin diinput manual
            $itemInventaris = Inventaris::create([
                'nama_barang' => $request->nama_barang,
                'kode_inventaris' => $request->kode_inventaris, // Pastikan ini unik
                'kategori' => 'Barang Habis Pakai', // atau 'ATK' atau sesuai kebutuhan
                'pemilik' => $request->pemilik ?? 'UBBG', // Sesuaikan
                'sumber_dana' => $request->sumber_dana ?? 'UBBG', // Sesuaikan
                'tahun_beli' => $request->tahun_beli ?? date('Y'),
                'kondisi_baik' => 0, // BHP tidak pakai kondisi ini
                'kondisi_rusak_ringan' => 0,
                'kondisi_rusak_berat' => 0,
                // 'unit_id' => ... (Opsional)
                // 'room_id' => ... (Opsional, misal gudang ATK)
            ]);

            // 2. Buat data di tabel 'stok_habis_pakais'
            $stok = new StokHabisPakai();
            $stok->inventaris_id = $itemInventaris->id; // Hubungkan ke inventaris
            $stok->jumlah = $request->jumlah;
            $stok->satuan = $request->satuan;
            $stok->keterangan = $request->keterangan;
            $stok->save();

            DB::commit(); // Simpan perubahan jika sukses

            return redirect()->route('stok.index')->with('success', 'Stok barang habis pakai berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan jika ada error
            // Tampilkan pesan error
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StokHabisPakai $stok)
    {
        // $stok sudah otomatis di-load berdasarkan ID
        $stok->load('inventaris'); // Pastikan data inventaris ter-load
        return view('stok.show', compact('stok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StokHabisPakai $stok)
    {
        // $stok sudah otomatis di-load berdasarkan ID
        $stok->load('inventaris'); // Load relasi
        return view('stok.edit', compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StokHabisPakai $stok)
    {
        // Validasi
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);
        
        try {
            DB::beginTransaction();
            
            // 1. Update tabel 'inventaris'
            $stok->inventaris->update([
                'nama_barang' => $request->nama_barang,
                // Anda mungkin ingin update field lain di inventaris juga
            ]);

            // 2. Update tabel 'stok_habis_pakais'
            $stok->update([
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
            ]);

            DB::commit();

            return redirect()->route('stok.index')->with('success', 'Stok barang berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StokHabisPakai $stok)
    {
        try {
            DB::beginTransaction();
            
            // Hapus stok dulu
            $stok->delete();
            
            // Hapus juga data inventaris-nya
            // Jika Anda ingin data inventaris tetap ada, hapus baris ini
            $stok->inventaris->delete(); 
            
            DB::commit();

            return redirect()->route('stok.index')->with('success', 'Stok barang berhasil dihapus.');
        
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('stok.index')->with('error', 'Gagal menghapus stok: ' . $e->getMessage());
        }
    }
}