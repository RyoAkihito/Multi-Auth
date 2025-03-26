<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">WebsiteKu</h1>
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:underline">Home</a></li>
                <li><a href="#" class="hover:underline">Tentang</a></li>
                <li><a href="#" class="hover:underline">Kontak</a></li>
            </ul>
            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white font-semibold">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-center py-20 bg-blue-500 text-white">
        <h2 class="text-4xl font-bold">Selamat Datang di WebsiteKu</h2>
        <p class="mt-4 text-lg">Tempat terbaik untuk mendapatkan informasi terkini</p>
        <a href="#" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">
            Pelajari Lebih Lanjut
        </a>
    </section>

    <!-- Konten -->
    <section class="container mx-auto p-6">
        <h3 class="text-2xl font-bold text-center">Fitur Utama</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white p-4 shadow rounded-lg text-center">
                <h4 class="text-lg font-semibold">Cepat & Responsif</h4>
                <p class="mt-2 text-gray-600">Website ini dirancang untuk kecepatan dan kemudahan akses.</p>
            </div>
            <div class="bg-white p-4 shadow rounded-lg text-center">
                <h4 class="text-lg font-semibold">Desain Modern</h4>
                <p class="mt-2 text-gray-600">Menggunakan teknologi terbaru dengan tampilan menarik.</p>
            </div>
            <div class="bg-white p-4 shadow rounded-lg text-center">
                <h4 class="text-lg font-semibold">Mudah Digunakan</h4>
                <p class="mt-2 text-gray-600">Navigasi yang simpel untuk pengalaman pengguna terbaik.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <p>&copy; 2025 WebsiteKu. Semua Hak Dilindungi.</p>
    </footer>

</body>
</html>
