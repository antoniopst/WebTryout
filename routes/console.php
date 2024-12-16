<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use App\Models\Mapel;

Artisan::command('fix:slug', function () {
    Mapel::all()->each(function ($mapel) {
        $mapel->slug = Str::slug($mapel->nama_mapel, '-'); // Buat slug dari nama_mapel
        $mapel->save();
    });

    $this->info('Slug berhasil ditambahkan ke tabel mapel.');
});