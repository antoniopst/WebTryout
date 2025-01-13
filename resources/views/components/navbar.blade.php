<nav class="flex justify-between items-center py-4 px-8 bg-gradient-to-r from-green-800 to-green-600 shadow-lg sticky top-0 z-10">
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