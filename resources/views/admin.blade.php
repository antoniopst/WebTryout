<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">
    
    @include('components.sidebar')

    <!-- Content Area -->
    <div class="flex-1 p-8">
        <h2 class="text-xl font-semibold text-gray-800">Selamat datang di Admin Dashboard</h2>
        <p class="text-gray-600 mt-2">
            Pilih salah satu menu di sebelah kiri untuk mulai mengelola data.
        </p>
    </div>
</body>
</html>