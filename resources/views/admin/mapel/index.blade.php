@extends('layouts.admin')

@section('content')
    <h1>Daftar Mapel</h1>
    <a href="{{ route('admin.mapel.create') }}" class="btn btn-primary">Tambah Mapel</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Slug</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapels as $mapel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mapel->name }}</td>
                    <td>{{ $mapel->slug }}</td>
                    <td>
                        <a href="{{ route('admin.mapel.edit', $mapel->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.mapel.destroy', $mapel->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Hapus mapel ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $mapels->links() }}
@endsection
