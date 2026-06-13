<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Artikel extends Model
{
    protected $table = 'artikel';
    public $timestamps = false;
    protected $fillable = [
        'id_penulis',
        'id_kategori',
        'judul',
        'isi',
        'gambar',
        'hari_tanggal',
    ];
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }
    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori');
    }

    // Accessor: Tanggal saja (e.g., "12 Juni 2026")
    public function getTanggalOnlyAttribute()
    {
        if (!$this->hari_tanggal) return '';
        $parts = explode(', ', $this->hari_tanggal);
        $dateTimePart = $parts[1] ?? $this->hari_tanggal;
        $subParts = explode(' | ', $dateTimePart);
        return $subParts[0] ?? '';
    }

    // Accessor: Tanggal lengkap dengan jam WIB (e.g., "12 Juni 2026 • 11:16 WIB")
    public function getTanggalWibAttribute()
    {
        if (!$this->hari_tanggal) return '';
        $parts = explode(', ', $this->hari_tanggal);
        $dateTimePart = $parts[1] ?? $this->hari_tanggal;
        $subParts = explode(' | ', $dateTimePart);
        $date = $subParts[0] ?? '';
        $time = $subParts[1] ?? '';
        return $time ? "{$date} • {$time} WIB" : $date;
    }

    // Accessor: Tanggal pendek dengan singkatan bulan (e.g., "12 Jun 2026")
    public function getTanggalShortAttribute()
    {
        $dateStr = $this->tanggal_only;
        if (!$dateStr) return '';

        $months = [
            'Januari' => 'Jan', 'Februari' => 'Feb', 'Maret' => 'Mar', 'April' => 'Apr',
            'Mei' => 'Mei', 'Juni' => 'Jun', 'Juli' => 'Jul', 'Agustus' => 'Agu',
            'September' => 'Sep', 'Oktober' => 'Okt', 'November' => 'Nov', 'Desember' => 'Des'
        ];

        foreach ($months as $full => $short) {
            if (strpos($dateStr, $full) !== false) {
                return str_replace($full, $short, $dateStr);
            }
        }
        return $dateStr;
    }
}



