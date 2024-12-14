<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showDetailLogin() {
            document.getElementById('form-detail-profil').style.display = 'none';
            document.getElementById('form-detail-login').style.display = 'block';
        }
        
        function showDetailProfil() {
        document.getElementById('form-detail-login').style.display = 'none';
        document.getElementById('form-detail-profil').style.display = 'block';
        }
    </script>
</head>

<body>

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
            <a href="/daftar" class="bg-white text-green-600 text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Daftar</a>
            <a href="/masuk" class="text-white text-lg px-6 py-3 rounded-full border border-white hover:bg-green-600 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-110">Masuk</a>
        </div>
    </nav>    

    <main class="bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="flex items-center justify-center h-screen">
            <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-sm">
                <div class="text-center mb-6">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c2.21 0 4-1.79 4-4S14.21 3 12 3 8 4.79 8 7s1.79 4 4 4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold text-gray-700 mt-4">Masuk</h1>
                </div>
        
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Alamat E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Alamat E-mail" class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        </div>
                    </div>
        
                    <div class="mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="recaptcha" name="recaptcha" class="mr-2" required>
                            <label for="recaptcha" class="text-sm text-gray-600">Saya bukan robot</label>
                        </div>
                    </div>
        
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg font-semibold hover:bg-green-600">Masuk</button>
                </form>
        
                <div class="text-center mt-4">
                    <a href="#" class="text-sm text-green-500 hover:underline">Lupa password?</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-green-500 py-6">
        <div class="container mx-auto text-center text-white">
            <p class="text-sm">&copy; 2024 SKILLCHECK. UNIVERSITAS MERCU BUANA.</p>
        </div>
    </footer>
    
</body>
</html>