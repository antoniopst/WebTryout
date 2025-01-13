<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Admin Soal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .button-transition {
            transition: all 0.3s ease-in-out;
        }
        .button-transition:hover {
            transform: scale(1.05);
        }
        .button-transition:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Daftar Soal</h1>
        <a href="{{ route('admin.soal.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 button-transition">Tambah Soal</a>

        @if($soals->isEmpty())
            <p class="text-gray-700">Tidak ada soal yang tersedia.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Pertanyaan</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soals as $soal)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $soal->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $soal->question }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.soal.edit', $soal->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('admin.soal.destroy', $soal->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
=======
    <title>Admin - Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @include('components.sidebar')

    <!-- Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-yellow-500 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Daftar Soal</h1>
            <p class="mt-2 text-sm font-light">Kelola data soal dengan mudah</p>
        </div>

        <!-- Tabel -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Tombol Tambah -->
            <div class="mb-4">
                <a href="{{ route('admin.soal.create') }}" 
                   class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition">
                    Tambah Soal
                </a>
            </div>

            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-sm uppercase tracking-wide">
                        <th class="border-b border-gray-300 px-6 py-3 text-left">ID</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Mata Pelajaran</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Kategori</th> <!-- Kolom kategori ditambahkan -->
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Pertanyaan</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($soal as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->mapel->nama_mapel }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->kategori->nama_kategori }}</td> <!-- Menampilkan nama kategori -->
                            <td class="px-6 py-4 text-gray-700">{{ Str::limit($item->question, 50, '...') }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ url('/admin/soal/edit/' . $item->id) }}" 
                                   class="inline-block bg-blue-500 text-white px-4 py-2 text-sm font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form action="{{ url('/admin/soal/delete/' . $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-4 py-2 text-sm font-semibold rounded-lg shadow-md hover:bg-red-600 transition">
                                        Hapus
                                    </button>
>>>>>>> elang/main
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
<<<<<<< HEAD
        @endif
    </div>

</body>
</html>
=======
        </div>
    </div>
</body>
</html>
>>>>>>> elang/main
