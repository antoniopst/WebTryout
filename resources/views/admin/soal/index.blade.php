<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
