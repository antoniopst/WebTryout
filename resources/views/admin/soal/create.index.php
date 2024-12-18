@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Soal</h1>

    <form action="{{ route('soal.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="question_text">Soal</label>
            <input type="text" class="form-control" id="question_text" name="question_text" required>
        </div>

        <div class="form-group">
            <label for="correct_answer">Jawaban Benar</label>
            <input type="text" class="form-control" id="correct_answer" name="correct_answer" required>
        </div>

        <div class="form-group">
            <label for="options">Pilihan Jawaban (format JSON)</label>
            <textarea class="form-control" id="options" name="options" required></textarea>
            <small>Contoh: ["Jawaban A", "Jawaban B", "Jawaban C", "Jawaban D"]</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Soal</button>
    </form>
</div>
@endsection
