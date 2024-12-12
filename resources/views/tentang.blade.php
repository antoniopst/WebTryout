<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - SKILLCHECK</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    <nav class="flex justify-between items-center py-4 px-8 bg-gradient-to-r from-green-400 to-green-500 shadow-lg sticky top-0 z-10">
        <div class="flex items-center">
            <img src="/images/logo.png" alt="Logo" class="h-10 mr-3 transform transition duration-300 hover:scale-110">
            <span class="text-white text-3xl font-extrabold">SKILLCHECK</span>
        </div>
        <div class="hidden md:flex space-x-10 ml-10 mr-auto">
            <a href="/" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Beranda</a>
            <a href="/soal" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Soal</a>
            <a href="/tentang" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Tentang Kami</a>
        </div>
        <div class="flex space-x-6">
            <a href="/daftar" class="bg-white text-green-600 text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Daftar</a>
            <a href="/masuk" class="text-white text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Masuk</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="container mx-auto text-center px-6 md:px-12">
            <h1 class="text-5xl font-extrabold text-gray-800 leading-tight">Tentang SKILLCHECK</h1>
            <p class="mt-6 text-lg text-gray-600">SKILLCHECK adalah platform latihan online yang dirancang untuk membantu Anda mempersiapkan berbagai jenis ujian dengan lebih baik.</p>
            <p class="mt-4 text-lg text-gray-600">Kami menyediakan soal latihan untuk semua jenjang pendidikan, mulai dari <span class="font-semibold">SD, SMP, SMA, hingga ujian masuk perguruan tinggi seperti SBMPTN, UTBK, serta persiapan tes CPNS dan STAN.</span></p>
            <div class="mt-12">
                <h2 class="text-3xl font-bold text-gray-700">Mengapa Memilih Kami?</h2>
                <ul class="mt-6 text-left text-gray-600 space-y-4">
                    <li class="flex items-start">
                        <span class="w-6 h-6 bg-green-600 text-white rounded-full flex items-center justify-center mr-4">✔</span>
                        <span>Pilihan soal latihan yang lengkap dan terus diperbarui.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-6 h-6 bg-green-600 text-white rounded-full flex items-center justify-center mr-4">✔</span>
                        <span>Pemahaman konsep melalui pembahasan soal yang mendalam.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-6 h-6 bg-green-600 text-white rounded-full flex items-center justify-center mr-4">✔</span>
                        <span>Latihan berbasis komputer untuk simulasi ujian yang nyata.</span>
                    </li>
                </ul>
            </div>
            <p class="mt-12 text-gray-600">Dengan SKILLCHECK, sukses dalam ujian bukan hanya impian. Bersama kami, jadilah yang terbaik!</p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-500 py-6">
        <div class="container mx-auto text-center text-white">
            <p class="text-sm">© 2024 SKILLCHECK. UNIVERSITAS MERCU BUANA.</p>
        </div>
    </footer>

</body>
</html>
