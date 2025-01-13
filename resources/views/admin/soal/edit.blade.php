<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @include('components.sidebar')

    <!-- Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-yellow-500 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Edit Soal</h1>
            <p class="mt-2 text-sm font-light">Masukkan informasi soal yang akan diperbarui</p>
        </div>

        <!-- Form Edit -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.soal.update', $soal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Mata Pelajaran (Non-editable) -->
                <div class="mb-4">
                    <label for="mapel_id" class="block text-gray-700 font-semibold mb-2">Mata Pelajaran</label>
                    <input type="text" id="mapel_id" name="mapel_id" 
                           value="{{ $soal->mapel->nama_mapel }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-200 cursor-not-allowed" 
                           readonly>
                </div>

                <!-- Kategori -->
                <div class="mb-4">
                    <label for="kategori_id" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                    <select id="kategori_id" name="kategori_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                            required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" 
                                    data-mapel-id="{{ $item->mapel_id }}"
                                    {{ $soal->kategori_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Pertanyaan -->
                <div class="mb-4">
                    <label for="question" class="block text-gray-700 font-semibold mb-2">Pertanyaan</label>
                    <textarea id="question" name="question" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                              placeholder="Masukkan pertanyaan" rows="4" required>{{ $soal->question }}</textarea>
                </div>

                <!-- Input Pilihan Jawaban -->
                <div class="mb-4">
                    <label for="options" class="block text-gray-700 font-semibold mb-2">Pilihan Jawaban</label>
                    @foreach (json_decode($soal->options) as $index => $option)
                        <input type="text" 
                            id="options_{{ $index }}" 
                            name="options[]" 
                            value="{{ $option }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg @if($index > 0) mt-2 @endif focus:outline-none focus:ring focus:ring-yellow-200"
                            placeholder="Pilihan {{ $index + 1 }}" required>
                    @endforeach
                </div>

                <!-- Input Jawaban Benar -->
                <div class="mb-4">
                    <label for="correct_answer" class="block text-gray-700 font-semibold mb-2">Jawaban Benar</label>
                    <select id="correct_answer" name="correct_answer" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                            required>
                        <option value="">Pilih Jawaban Benar</option>
                        @for ($i = 1; $i <= count(json_decode($soal->options)); $i++)
                            <option value="{{ $i }}" 
                                    {{ $soal->correct_answer + 1 == $i ? 'selected' : '' }}>
                                Pilihan {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end gap-4">
                    <a href="{{ url('/admin/soal') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>

    <!-- Optional Script -->
    <script>
        const mapelId = "{{ $soal->mapel_id }}";
        const kategoriOptions = document.querySelectorAll('#kategori_id option');

        kategoriOptions.forEach(option => {
            if (option.dataset.mapelId !== mapelId && option.value !== '') {
                option.style.display = 'none';
            }
        });
    </script>
</body>
</html>