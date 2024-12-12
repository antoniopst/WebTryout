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

    <nav class="flex justify-between items-center py-4 px-8 bg-gradient-to-r from-green-400 to-green-500 shadow-lg sticky top-0 z-10">
        <div class="flex items-center">
            <img src="/images/logo.png" alt="Logo" class="h-10 mr-3 transform transition duration-300 hover:scale-110">
            <span class="text-white text-3xl font-extrabold">SKILLCHECK</span>
        </div>
        <div class="hidden md:flex space-x-10 ml-10 mr-auto">
            <a href="/" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Beranda</a>
            <a href="/soal" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Soal</a>
            <a href="#" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Tentang Kami</a>
        </div>
        <div class="flex space-x-6">
            <a href="/daftar" class="bg-white text-green-600 text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Daftar</a>
            <a href="/masuk" class="text-white text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Masuk</a>
        </div>
    </nav>    

    <main class="bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="container mx-auto text-center px-6 md:px-12">
            <div class="flex flex-col md:flex-row items-center justify-center gap-12">
                <div class="md:w-1/2 text-left">
                    <h1 class="text-5xl font-extrabold text-gray-800 leading-tight">Latihan Online: SD SMP SMA UTBK SBMPTN STAN CPNS</h1>
                    <p class="mt-6 text-lg text-gray-600">Khawatir gagal ujian? Atau butuh persiapan tes masuk kerja? <span class="font-semibold">Kami solusinya.</span></p>
                    <p class="mt-4 text-lg text-gray-600">Kami membantu Anda berlatih dan mempersiapkan diri menghadapi berbagai jenis ujian, <span class="font-semibold">SD SMP SMA SMK SBMPTN STAN UTBK CPNS KEBIDANAN PERBANKAN, dan lainnya.</span></p>
                    <p class="mt-4 text-lg font-semibold text-gray-700">SKILLCHECK menyediakan banyak soal untuk membantu Anda sukses dalam ujian.</p>
                    <p class="mt-6 text-gray-600">Semangat belajar dan raih sukses Anda!</p>
                    <a href="/soal" class="btn-green mt-6 inline-block">Mulai Sekarang</a>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/imgBeranda.svg" alt="Illustration" class="w-full max-w-md mx-auto transition-all transform hover:scale-105">
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-green-500 py-6">
        <div class="container mx-auto text-center text-white">
            <p class="text-sm">© 2024 SKILLCHECK. UNIVERSITAS MERCU BUANA.</p>
        </div>
    </footer>

</body>
</html>