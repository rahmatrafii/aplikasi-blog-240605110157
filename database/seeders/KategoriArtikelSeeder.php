<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'olahraga', 'keterangan' => 'berbicara tentang olahraga'],
            ['nama_kategori' => 'teknologi', 'keterangan' => 'membahas tentang teknologi terkini'],
            ['nama_kategori' => 'kesehatan', 'keterangan' => 'membahas info kesehatan, diet, dan tips hidup sehat'],
            ['nama_kategori' => 'hiburan', 'keterangan' => 'berita seputar musik, film, dan tren hiburan terkini'],
            ['nama_kategori' => 'kuliner', 'keterangan' => 'resep makanan, kuliner tradisional, dan modern'],
            ['nama_kategori' => 'edukasi', 'keterangan' => 'artikel edukasi, ilmu pengetahuan, dan tips belajar'],
        ];
        foreach ($categories as $category) {
            DB::table('kategori_artikel')->updateOrInsert(
                ['nama_kategori' => $category['nama_kategori']],
                ['keterangan' => $category['keterangan']]
            );
        }
    }
}
