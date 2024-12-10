<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // Menyembunyikan kolom 'password' agar tidak ditampilkan pada array atau JSON
    protected $hidden = [
        'password',
    ];

    // Menentukan kolom-kolom yang berupa timestamp
    protected $dates = ['created_at', 'updated_at'];

    // Enkripsi password sebelum menyimpan data
    public static function boot()
    {
        parent::boot();

        // Meng-hash password saat membuat data baru
        static::creating(function ($user) {
            if ($user->password) {
                $user->password = Hash::make($user->password); // Enkripsi password
            }
        });

        // Meng-hash password saat memperbarui data
        static::updating(function ($user) {
            if ($user->password) {
                $user->password = Hash::make($user->password); // Enkripsi password
            }
        });
    }

    // Relasi dengan tabel 'results'
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    // Relasi dengan tabel 'answers'
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Akses untuk mendapatkan role dalam format yang lebih mudah dibaca
    public function getRoleAttribute($value)
    {
        return ucfirst($value);  // Menampilkan role dengan kapital pertama
    }
}
