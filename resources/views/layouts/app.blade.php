<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout</title>
</head>
<body>
    <nav>
        <!-- Navigasi atau menu bisa ditambahkan di sini -->
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('tryout.index') }}">Daftar Tryout</a>
    </nav>

    <div class="container">
        @yield('content')  <!-- Konten halaman spesifik akan dimasukkan di sini -->
    </div>

</body>
</html>
