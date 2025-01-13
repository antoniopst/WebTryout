<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout Page</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn-green {
            @apply bg-green-600 text-white py-3 px-6 rounded-full shadow-lg transition-transform transform hover:scale-105 hover:bg-green-700;
        }
        .btn-green:hover {
            @apply bg-green-700;
        }
        .btn-outline {
            @apply border border-green-600 text-green-600 px-6 py-3 rounded-full shadow-md transition-all transform hover:bg-green-600 hover:text-white;
        }
        .btn-outline:hover {
            @apply bg-green-600 text-white;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">

    @include('components.navbar')
    
    <script>
        function alertLogin() {
            @if (!Auth::check())
                alert('Harap login terlebih dahulu untuk mengakses soal!');
            @else
                window.location.href = '/soal';
            @endif
        }
    </script>                

    <main class="bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="container mx-auto text-center px-6 md:px-12">
            <div class="flex flex-col md:flex-row items-center justify-center gap-12">
                <div class="md:w-1/2 text-left">
                    <h1 class="text-5xl font-extrabold text-gray-800 leading-tight">Latihan Online: Tryout Ujian SMA untuk Jenjang Kuliah</h1>
                    <p class="mt-6 text-lg text-gray-600">Khawatir menghadapi ujian SMA? Atau butuh persiapan untuk ujian yang akan membawa Anda ke perguruan tinggi? <span class="font-semibold">Kami solusinya.</span></p>
                    <p class="mt-4 text-lg text-gray-600">Kami membantu Anda berlatih dan mempersiapkan diri untuk ujian SMA, <span class="font-semibold">termasuk ujian nasional dan ujian seleksi masuk perguruan tinggi (UTBK dan lainnya).</span></p>
                    <p class="mt-4 text-lg font-semibold text-gray-700">SKILLCHECK menyediakan banyak soal yang relevan untuk membantu Anda sukses menghadapi ujian dan menempuh jenjang kuliah.</p>
                    <p class="mt-6 text-gray-600">Semangat belajar dan raih impian Anda untuk kuliah!</p>
                    <a href="/soal" class="btn-green mt-6 inline-block">Mulai Sekarang</a>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/imgBeranda.svg" alt="Illustration" class="w-full max-w-md mx-auto transition-all transform hover:scale-105">
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')

</body>
</html>