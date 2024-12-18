@extends('layouts.admin')

@section('title', 'Tambah Soal')

@section('content')
    <h2>Tambah Soal</h2>
    <form action="{{ route('admin.soal.store') }}" method="POST">
        @csrf
        <div>
            <label for="question">Pertanyaan:</label>
            <input type="text" id="question" name="question" required>
        </div>
        <div>
            <label for="options">Pilihan (JSON format):</label>
            <textarea id="options" name="options" required></textarea>
        </div>
        <div>
            <label for="correct_answer">Jawaban Benar (Index):</label>
            <input type="number" id="correct_answer" name="correct_answer" required>
        </div>
        <div>
            <label for="mapel_id">Mata Pelajaran:</label>
            <select id="mapel_id" name="mapel_id">
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
