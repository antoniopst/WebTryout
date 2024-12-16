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
            <a href="/" class="text-white text-3xl font-extrabold">SKILLCHECK</a>
        </div>
        <div class="hidden md:flex space-x-10 ml-10 mr-auto">
            <a href="/" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Beranda</a>
            <a href="#" onclick="alertLogin();" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Soal</a>
            <a href="/tentang" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Tentang Kami</a>
        </div>
        <div class="flex space-x-6">
            @guest
                <a href="/daftar" class="bg-white text-green-600 text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Daftar</a>
                <a href="/masuk" class="text-white text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Masuk</a>
            @endguest
    
            @auth
                <!-- Show 'Keluar' button when the user is authenticated -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white text-lg px-6 py-3 rounded-full border border-red-500 bg-red-500 hover:bg-red-600 hover:border-red-600 transition-all duration-300 ease-in-out transform hover:scale-110">
                        Keluar
                    </button>
                </form>
            @endauth
        </div>
    </nav>
    
    <script>
        function alertLogin() {
            @if (!Auth::check())
                alert('Harap login terlebih dahulu untuk mengakses soal!');
            @else
                window.location.href = '/soal';
            @endif
        }
    </script> 

    <!-- Main Content -->
    <main class="bg-gradient-to-b from-green-100 to-gray-50 py-16 relative">
        <div class="absolute top-0 left-0 w-32 h-32 bg-green-300 rounded-full opacity-50 animate-bounce"></div>
        <div class="absolute bottom-0 right-0 w-48 h-48 bg-green-200 rounded-full opacity-50"></div>

        <div class="container mx-auto text-center px-6 md:px-12 relative">
            <h1 class="text-5xl font-extrabold text-gray-800 leading-tight animate-fade-in">Tentang SKILLCHECK</h1>
            <p class="mt-6 text-lg text-gray-600">SKILLCHECK adalah platform latihan online yang dirancang untuk membantu Anda mempersiapkan berbagai jenis ujian dengan lebih baik.</p>
            <p class="mt-4 text-lg text-gray-600">Kami menyediakan soal latihan untuk semua jenjang pendidikan, mulai dari <span class="font-semibold">SD, SMP, SMA, hingga ujian masuk perguruan tinggi seperti SBMPTN, UTBK, serta persiapan tes CPNS dan STAN.</span></p>
            
            <div class="mt-12 bg-white rounded-lg shadow-lg p-8 border-t-4 border-green-600">
                <h2 class="text-3xl font-bold text-gray-700">Mengapa Memilih Kami?</h2>
                <ul class="mt-6 text-left text-gray-600 space-y-4">
                    <li class="flex items-start">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-4 shadow-lg"></span>
                        <span>Pilihan soal latihan yang lengkap dan terus diperbarui.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-4 shadow-lg"></span>
                        <span>Pemahaman konsep melalui pembahasan soal yang mendalam.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-4 shadow-lg"></span>
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
            <p class="text-sm">&copy; 2024 SKILLCHECK. UNIVERSITAS MERCU BUANA.</p>
        </div>
    </footer>

</body>
</html>