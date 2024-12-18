@extends('layouts.admin')

@section('content')
    <h1>Edit Mapel</h1>
    <form action="{{ route('admin.mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $mapel->name }}" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $mapel->slug }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
