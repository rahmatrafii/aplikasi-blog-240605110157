<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PengunjungController extends Controller
{
    /**
     * Menampilkan Halaman Utama (Beranda) Pengunjung
     */
    public function index(Request $request)
    {
        // Mendapatkan ID kategori untuk penyaringan (jika ada)
        $kategoriParam = $request->query('kategori');
        $selectedKategoriIds = [];

        if ($kategoriParam) {
            if (is_array($kategoriParam)) {
                $selectedKategoriIds = $kategoriParam;
            } elseif (str_contains($kategoriParam, ',')) {
                $selectedKategoriIds = explode(',', $kategoriParam);
            } else {
                $selectedKategoriIds = [$kategoriParam];
            }
            // Bersihkan dan pastikan integer
            $selectedKategoriIds = array_filter(array_map('intval', $selectedKategoriIds));
        }

        // Query artikel beserta relasi penulis dan kategori
        $query = Artikel::with(['penulis', 'kategori']);

        // Jika kategori dipilih, saring artikel
        if (!empty($selectedKategoriIds)) {
            $query->whereIn('id_kategori', $selectedKategoriIds);
        }

        // Ambil artikel terbaru dengan pagination (5 per halaman)
        $artikel = $query->latest('id')->paginate(5)->withQueryString();

        // Ambil semua kategori untuk widget sidebar beserta jumlah artikelnya (Eager Load Count)
        $kategori = KategoriArtikel::withCount('artikel')->get();

        // Menyediakan $kategoriId untuk backward compatibility (jika ada file lain yang merujuk)
        $kategoriId = count($selectedKategoriIds) === 1 ? $selectedKategoriIds[0] : null;

        return view('pengunjung.index', compact('artikel', 'kategori', 'kategoriId', 'selectedKategoriIds'));
    }

    /**
     * Menampilkan Halaman Detail Artikel
     */
    public function show($id)
    {
        // Ambil detail artikel atau return 404 jika tidak ditemukan
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);

        // Ambil 5 artikel terkait dari kategori sejenis (kecuali artikel yang sedang dibaca)
        $artikelTerkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->latest('id')
            ->take(5)
            ->get();

        return view('pengunjung.show', compact('artikel', 'artikelTerkait'));
    }
}
