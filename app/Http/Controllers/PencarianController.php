<?php

// app/Http/Controllers/PencarianController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori; // <-- TAMBAHKAN INI
use App\Models\ProdukHukum; // <-- Pastikan nama model sudah benar

class PencarianController extends Controller
{
// app/Http/Controllers/PencarianController.php

    public function index(Request $request)
    {
        $query = $request->input('search');
        $selectedKategoriId = $request->input('kategori');

        $kategoris = Kategori::orderBy('nama')->get();

        $results = ProdukHukum::query()
            ->with('kategori')
            
            // ---- PERUBAHAN UTAMA ADA DI BLOK INI ----
            ->when($query, function ($q, $query) {
                // Mengelompokkan semua kondisi pencarian teks dalam satu grup
                return $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('tentang', 'like', "%{$query}%")
                            ->orWhere('nomor_peraturan', 'like', "%{$query}%")
                            ->orWhere('konten', 'like', "%{$query}%")
                            ->orWhere('tahun', 'like', "%{$query}%");
                });
            })
            // ------------------------------------------

            ->when($selectedKategoriId, function ($q, $kategoriId) {
                return $q->where('kategori_id', $kategoriId);
            })
            
            ->latest()
            ->paginate(10);

        return view('welcome', [
            'results' => $results,
            'query' => $query,
            'kategoris' => $kategoris,
            'selectedKategoriId' => $selectedKategoriId
        ]);
    }
}
