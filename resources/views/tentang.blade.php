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

    @include('components.navbar')
    
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
            <p class="mt-6 text-lg text-gray-600">SKILLCHECK adalah platform latihan online yang dirancang khusus untuk membantu Anda mempersiapkan ujian SMA dan ujian seleksi masuk perguruan tinggi (UTBK dan lainnya) dengan lebih baik.</p>
            <p class="mt-4 text-lg text-gray-600">Kami menyediakan soal latihan yang relevan untuk ujian SMA dan ujian masuk perguruan tinggi, seperti <span class="font-semibold">UTBK, SBMPTN, dan lainnya, serta latihan soal untuk ujian masuk perguruan tinggi negeri.</span></p>
            
            <div class="mt-12 bg-white rounded-lg shadow-lg p-8 border-t-4 border-green-600">
                <h2 class="text-3xl font-bold text-gray-700">Mengapa Memilih SKILLCHECK?</h2>
                <ul class="mt-6 text-left text-gray-600 space-y-4">
                    <li class="flex items-start">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-4 shadow-lg"></span>
                        <span>Pilihan soal latihan yang lengkap dan terus diperbarui untuk ujian SMA dan seleksi perguruan tinggi.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-4 shadow-lg"></span>
                        <span>Pemahaman konsep melalui pembahasan soal yang mendalam, membantu Anda memahami materi ujian dengan lebih baik.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-4 shadow-lg"></span>
                        <span>Latihan berbasis komputer untuk simulasi ujian yang lebih nyata, memberikan pengalaman ujian yang sesungguhnya.</span>
                    </li>
                </ul>
            </div>
    
            <p class="mt-12 text-gray-600">Dengan SKILLCHECK, sukses dalam ujian SMA dan seleksi perguruan tinggi bukan hanya impian. Bersama kami, persiapkan diri Anda untuk masa depan yang lebih cerah!</p>
        </div>
    </main>    

    @include('components.footer')

</body>
</html>