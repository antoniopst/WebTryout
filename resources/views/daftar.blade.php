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
    </script>
</head>

<body>

    <nav class="flex justify-between items-center py-4 px-8 bg-gradient-to-r from-green-400 to-green-500 font-sans">
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 mr-3">
            <span class="text-white text-2xl font-bold">TRYOUT</span>
        </div>
        <div class="flex space-x-6 ml-10 mr-auto">
            <a href="#" class="text-white text-lg hover:underline">Beranda</a>
            <a href="#" class="text-white text-lg hover:underline">Tryout</a>
            <a href="#" class="text-white text-lg hover:underline">Tentang Kami</a>
        </div>
        <div class="flex space-x-4">
            <a href="/daftar" class="bg-white text-green-600 text-lg px-4 py-2 rounded-full border border-white hover:opacity-80">Daftar</a>
            <a href="/masuk" class="text-white text-lg px-4 py-2 rounded-full border border-white hover:opacity-80">Masuk</a>
        </div>
    </nav>

    <div class="bg-gray-100 p-8 h-[800px]">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg mx-auto">
            <!-- Form Detail Profil -->
            <div id="form-detail-profil">
                <h2 class="text-2xl font-semibold mb-6">Detail Profil</h2>
                <form action="#" method="POST">
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
                            <option>Pilih Jenis Kelamin</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <select id="province" name="province" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <option>Pilih Provinsi</option>
                            <option>Jawa Barat</option>
                            <option>DKI Jakarta</option>
                            <option>Jawa Timur</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-sm font-medium text-gray-700">Kabupaten / Kota</label>
                        <select id="city" name="city" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <option>Tangerang</option>
                            <option>Jakarta Barat</option>
                            <option>Pekalongan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon / Hp</label>
                        <input type="text" id="phone" name="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Minimal 10 angka. Contoh: 08123456789">
                    </div>
                    <button type="button" onclick="showDetailLogin()" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Next</button>
                </form>
            </div>

            <!-- Form Detail Login -->
            <div id="form-detail-login" style="display: none;">
                <h2 class="text-2xl font-semibold mb-6">Detail Login</h2>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Masukkan email">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
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
                </form>
            </div>
        </div>
    </div>
</body>
</html>