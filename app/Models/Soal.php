<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';

    protected $fillable = [
        'question_text', // Tambahkan nama kolom sesuai dengan database
        'correct_answer',
        'options',
        'mapel_id', // Jika Anda menggunakan relasi ke Mapel
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}

