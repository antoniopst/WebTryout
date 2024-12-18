@extends('layouts.admin')

@section('title', 'Edit Soal')

@section('content')
    <h2>Edit Soal</h2>
    <form action="{{ route('admin.soal.update', $soal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="question">Pertanyaan:</label>
            <input type="text" id="question" name="question" value="{{ $soal->question }}" required>
        </div>
        <div>
            <label for="options">Pilihan (JSON format):</label>
            <textarea id="options" name="options" required>{{ $soal->options }}</textarea>
        </div>
        <div>
            <label for="correct_answer">Jawaban Benar (Index):</label>
            <input type="number" id="correct_answer" name="correct_answer" value="{{ $soal->correct_answer }}" required>
        </div>
        <div>
            <label for="mapel_id">Mata Pelajaran:</label>
            <select id="mapel_id" name="mapel_id">
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}" {{ $mapel->id == $soal->mapel_id ? 'selected' : '' }}>
                        {{ $mapel->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
