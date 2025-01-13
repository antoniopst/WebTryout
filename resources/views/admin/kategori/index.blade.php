<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @include('components.sidebar')

    <!-- Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-500 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Daftar Kategori</h1>
            <p class="mt-2 text-sm font-light">Kelola kategori yang tersedia di sistem</p>
        </div>

        <!-- Tabel -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Tombol Tambah -->
            <div class="mb-4">
                <a href="{{ route('admin.kategori.create') }}" 
                   class="inline-block bg-purple-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-purple-600 transition">
                    Tambah Kategori
                </a>
            </div>

            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-sm uppercase tracking-wide">
                        <th class="border-b border-gray-300 px-6 py-3 text-left">ID</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Mata Pelajaran</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Nama Kategori</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($kategori as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->mapel->nama_mapel }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->nama_kategori }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ url('/admin/kategori/edit/' . $item->id) }}" 
                                    class="inline-block bg-blue-500 text-white px-4 py-2 text-sm font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form action="{{ url('/admin/kategori/delete/' . $item->id) }}" method="POST" class="inline-block">
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
</html>