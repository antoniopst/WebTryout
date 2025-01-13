<<<<<<< HEAD
=======
<<<<<<< HEAD
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
=======
>>>>>>> 7e6e4db50ee003f5ce36e121374272154efdc1e9
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Mata Pelajaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @include('components.sidebar')

    <!-- Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-700 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Daftar Mata Pelajaran</h1>
            <p class="mt-2 text-sm font-light">Kelola data mata pelajaran dengan mudah</p>
        </div>

        <!-- Tabel -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Tombol Tambah -->
            <div class="mb-4">
                <a href="{{ route('admin.mapel.create') }}" 
                class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition">
                    Tambah Mata Pelajaran
                </a>
            </div>

            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-sm uppercase tracking-wide">
                        <th class="border-b border-gray-300 px-6 py-3 text-left">ID</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Nama Mata Pelajaran</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($mapel as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->nama_mapel }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ url('/admin/mapel/edit/' . $item->id) }}" 
                                class="inline-block bg-blue-500 text-white px-4 py-2 text-sm font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form action="{{ url('/admin/mapel/delete/' . $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-4 py-2 text-sm font-semibold rounded-lg shadow-md hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> elang/main
>>>>>>> 7e6e4db50ee003f5ce36e121374272154efdc1e9
