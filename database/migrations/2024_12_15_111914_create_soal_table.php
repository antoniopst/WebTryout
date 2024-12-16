<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment
            $table->foreignId('mapel_id')->constrained('mapel')->onDelete('cascade'); // Foreign key ke tabel mapel
            $table->text('question'); // Pertanyaan
            $table->json('options'); // Opsi jawaban (format JSON)
            $table->integer('correct_answer'); // Indeks jawaban benar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal');
    }
};