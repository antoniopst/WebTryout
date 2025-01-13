<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @include('components.sidebar')

    <!-- Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-500 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Edit Kategori</h1>
            <p class="mt-2 text-sm font-light">Masukkan informasi kategori yang akan diperbarui</p>
        </div>

        <!-- Form Edit -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Mata Pelajaran (Non-editable display) -->
                <div class="mb-4">
                    <label for="mapel_id_display" class="block text-gray-700 font-semibold mb-2">Mata Pelajaran</label>
                    <input type="text" id="mapel_id_display" 
                           value="{{ $kategori->mapel->nama_mapel }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-200 cursor-not-allowed" 
                           readonly>
                </div>
                <input type="hidden" name="mapel_id" value="{{ $kategori->mapel_id }}">

                <!-- Nama Kategori (Editable) -->
                <div class="mb-4">
                    <label for="nama_kategori" class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" 
                           value="{{ $kategori->nama_kategori }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-purple-200" 
                           required>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end gap-4">
                    <a href="{{ url('/admin/kategori') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="bg-purple-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-purple-600 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>