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

    @include('components.navbar')   

    <main class="h-[1500px] bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="container mx-auto px-6 md:px-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">KELOMPOK <span class="text-green-500">SOAL</span></h1>
            <ul class="space-y-6">
                @foreach ($mapel as $item)
                    <li class="p-4 bg-white shadow-lg rounded-md hover:bg-green-100 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <a href="soal/{{ strtolower(str_replace(' ', '-', $item->nama_mapel)) }}" class="flex items-center justify-between cursor-pointer">
                            <div class="flex items-center">
                                <div class="text-green-500 mr-4">
                                    <i class="fas fa-book"></i>
                                </div>
                                <span class="text-lg font-semibold text-gray-800">{{ $item->nama_mapel }}</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-500"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>    

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    @include('components.footer')

</body>
</html>