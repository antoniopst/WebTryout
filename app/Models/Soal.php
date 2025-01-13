<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';

    protected $fillable = [
<<<<<<< HEAD
        'question_text', // Tambahkan nama kolom sesuai dengan database
        'correct_answer',
        'options',
        'mapel_id', // Jika Anda menggunakan relasi ke Mapel
=======
        'mapel_id', // Tambahkan ini untuk memungkinkan mass assignment
        'kategori_id', // Tambahkan ini untuk memungkinkan mass assignment
        'question',
        'options',
        'correct_answer',
>>>>>>> elang/main
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
<<<<<<< HEAD
}

=======

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
>>>>>>> elang/main
