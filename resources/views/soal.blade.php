<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok Soal</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <nav class="flex justify-between items-center py-4 px-8 bg-gradient-to-r from-green-400 to-green-500 shadow-lg sticky top-0 z-10">
        <div class="flex items-center">
            <img src="/images/logo.png" alt="Logo" class="h-10 mr-3 transform transition duration-300 hover:scale-110">
            <a href="/" class="text-white text-3xl font-extrabold">SKILLCHECK</a>
        </div>
        <div class="hidden md:flex space-x-10 ml-10 mr-auto">
            <a href="/" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Beranda</a>
            <a href="/soal" class="text-white text-lg font-medium hover:text-green-100 hover:underline transform transition duration-300 ease-in-out hover:scale-110">Soal</a>
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

    <main class="h-screen bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="container mx-auto px-6 md:px-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">KELOMPOK <span class="text-green-500">SOAL</span></h1>
            <ul class="space-y-6">
                <!-- Matematika -->
                <li class="p-4 bg-white shadow-lg rounded-md hover:bg-green-100 hover:shadow-xl transition-all duration-300 ease-in-out">
                    <a href="soal/matematika" class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center">
                            <div class="text-orange-500 mr-4">
                                <i class="fas fa-book"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Matematika</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-500"></i>
                    </a>
                </li>
    
                <!-- Bahasa Indonesia -->
                <li class="p-4 bg-white shadow-lg rounded-md hover:bg-green-100 hover:shadow-xl transition-all duration-300 ease-in-out">
                    <a href="soal/bahasa-indonesia" class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center">
                            <div class="text-green-500 mr-4">
                                <i class="fas fa-book"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Bahasa Indonesia</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-500"></i>
                    </a>
                </li>
    
                <!-- Bahasa Inggris -->
                <li class="p-4 bg-white shadow-lg rounded-md hover:bg-green-100 hover:shadow-xl transition-all duration-300 ease-in-out">
                    <a href="soal/bahasa-inggris" class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center">
                            <div class="text-blue-500 mr-4">
                                <i class="fas fa-book"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Bahasa Inggris</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-500"></i>
                    </a>
                </li>
            </ul>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <footer class="bg-green-500 py-6">
        <div class="container mx-auto text-center text-white">
            <p class="text-sm">&copy; 2024 SKILLCHECK. UNIVERSITAS MERCU BUANA.</p>
        </div>
    </footer>

</body>
</html>