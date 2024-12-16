<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mapel extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'mapel';

    // Tentukan kolom yang bisa diisi secara mass-assignment
    protected $fillable = ['nama_mapel', 'slug'];

    // Relasi dengan model Soal
    public function soal()
    {
        return $this->hasMany(Soal::class, 'mapel_id');
    }

    // Tambahkan event untuk membuat slug otomatis saat data baru dibuat
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($mapel) {
            if (empty($mapel->slug)) {
                $mapel->slug = Str::slug($mapel->nama_mapel, '-');
            }
        });

        static::updating(function ($mapel) {
            if ($mapel->isDirty('nama_mapel')) {
                $mapel->slug = Str::slug($mapel->nama_mapel, '-');
            }
        });
    }
}