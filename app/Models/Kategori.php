<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama', // Nama kategori, contoh: "Peraturan Pemerintah", "Undang-Undang"
    ];
}
