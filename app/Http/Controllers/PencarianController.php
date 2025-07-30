<?php

// app/Http/Controllers/PencarianController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori; // <-- TAMBAHKAN INI
use App\Models\ProdukHukum; // <-- Pastikan nama model sudah benar

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input dari form pencarian dan filter kategori
        $query = $request->input('search');
        $selectedKategoriId = $request->input('kategori');

        // Ambil semua kategori untuk ditampilkan sebagai filter
        $kategori = Kategori::orderBy('nama')->get();

        $results = ProdukHukum::query()
            // Eager load relasi 'kategori' untuk optimasi
            ->with('kategori')
            // Terapkan filter berdasarkan keyword pencarian
            ->when($query, function ($q, $query) {
                return $q->where('tentang', 'like', "%{$query}%")
                         ->orWhere('nomor_peraturan', 'like', "%{$query}%")
                         ->orWhere('konten', 'like', "%{$query}%")
                         ->orWhere('tahun', 'like', "%{$query}%");
            })
            // Terapkan filter berdasarkan ID kategori yang dipilih
            ->when($selectedKategoriId, function ($q, $kategoriId) {
                return $q->where('kategori_id', $kategoriId);
            })
            ->latest() // Tampilkan yang terbaru dulu
            ->paginate(10);

        // Kirim semua data yang dibutuhkan ke view
        return view('welcome', [
            'results' => $results,
            'query' => $query,
            'kategori' => $kategori,
            'selectedKategoriId' => $selectedKategoriId
        ]);
    }
}
