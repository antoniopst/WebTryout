<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header, footer { background: #333; color: #fff; text-align: center; padding: 1em; }
        main { padding: 2em; }
        nav { background: #444; padding: 0.5em; text-align: center; }
        nav a { color: white; margin: 0 10px; text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>

    <nav>
        <a href="{{ url('/admin') }}">Dashboard</a>
        <a href="{{ url('/admin/users') }}">Kelola User</a>
        <a href="{{ url('/admin/soal') }}">Kelola Soal</a>
        <a href="{{ url('/admin/mapel') }}">Kelola Mapel</a> <!-- Tautan baru untuk Kelola Mapel -->
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Web Tryout - Admin Panel
    </footer>
</body>
</html>
