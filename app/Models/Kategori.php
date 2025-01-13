<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'mapel_id', // Untuk relasi dengan tabel mapel
        'nama_kategori', // Nama kategori
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function soal()
    {
        return $this->hasMany(Soal::class, 'kategori_id');
    }
}