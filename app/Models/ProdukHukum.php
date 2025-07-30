<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukHukum extends Model
{
    protected $table = 'produk_hukum';

    protected $fillable = [
        'nomor_peraturan',
        'tentang',
        'tahun',
        'konten',
        'nama_file',
        'path_file',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}

