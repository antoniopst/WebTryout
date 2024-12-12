<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
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

        function validateForm(event) {
            const name = document.getElementById('name').value.trim();
            const school = document.getElementById('school').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (!name || !school || !phone || !email || !password || password !== confirmPassword) {
                event.preventDefault();
                alert('Semua input harus diisi dan password harus sesuai!');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

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
        <div class="p-8 min-h-screen">
            <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg mx-auto">
                <form action="#" method="POST" onsubmit="return validateForm(event)">
                    <!-- Form Detail Profil -->
                    <div id="form-detail-profil">
                        <h2 class="text-2xl font-semibold mb-6">Detail Profil</h2>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Nama lengkap">
                        </div>
                        <div class="mb-4">
                            <label for="school" class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
                            <input type="text" id="school" name="school" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Nama sekolah">
                        </div>
                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select id="gender" name="gender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                            <select id="province" name="province" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Provinsi</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">Kabupaten / Kota</label>
                            <select id="city" name="city" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Kabupaten / Kota</option>
                                <option value="Tangerang">Tangerang</option>
                                <option value="Jakarta Barat">Jakarta Barat</option>
                                <option value="Pekalongan">Pekalongan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon / Hp</label>
                            <input type="text" id="phone" name="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Minimal 10 angka. Contoh: 08123456789">
                        </div>
                        <button type="button" onclick="showDetailLogin()" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Next</button>
                    </div>
    
                    <!-- Form Detail Login -->
                    <div id="form-detail-login" style="display: none;">
                        <h2 class="text-2xl font-semibold mb-6">Detail Login</h2>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Masukkan email">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" placeholder="Minimal 7 karakter" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <p class="text-sm text-red-500">* Semua inputan harus diisi.</p>
                        <div class="flex justify-between">
                            <button type="button" onclick="showDetailProfil()" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-700">Kembali</button>
                            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Daftar Sekarang</button>
                        </div>
                    </div>
                </form>
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