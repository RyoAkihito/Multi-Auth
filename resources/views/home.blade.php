<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-indigo-600">Pendaftaran</div>
            <div>
                <a href="/status" class="text-sm text-gray-700 hover:text-indigo-600">Status</a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="flex flex-1">
        <!-- Kiri: Quote -->
        <div class="hidden md:flex w-1/2 bg-gray-200 justify-center items-center p-12">
            <div class="max-w-md text-center">
                <h2 class="text-3xl font-bold mb-4 text-gray-700">Selamat datang pada web pendaftaran siswa baru</h2>
                <p class="text-sm text-gray-500">Silakan isi formulir di samping untuk mendaftarkan diri.</p>
            </div>
        </div>

        <!-- Kanan: Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-center mb-6">Form Pendaftaran Siswa</h2>
                @if (session('success'))
                    <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
                        <div class="flex items-center gap-2">
                            <!-- Icon -->
                            <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="font-medium">Berhasil:</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif


                <form method="POST" action="{{ route('siswa.store') }}">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium">Nama Lengkap</label>
                        <input type="text" name="name"
                            class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            required>
                    </div>

                    <!-- NISN -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium">NISN</label>
                        <input type="text" name="NISN"
                            class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            required>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium">Jenis Kelamin</label>
                        <select name="Jenis_Kelamin"
                            class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium">Alamat</label>
                        <textarea name="alamat" rows="3"
                            class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" required></textarea>
                    </div>

                    <!-- Sekolah Asal -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium">Sekolah Asal</label>
                        <input type="text" name="Sekolah_Asal"
                            class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            required>
                    </div>

                    <!-- Status Pendaftaran (Disembunyikan) -->
                    <input type="hidden" name="Status_Pendaftaran" value="Cadangan">

                    <!-- Tombol -->
                    <button type="submit"
                        class="w-full py-3 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                        Daftar Sekarang
                    </button>
                </form>

                <p class="text-center text-sm mt-4 text-gray-600">
                    Sudah punya akun?
                    <a href="/login" class="text-indigo-500 hover:underline">Login</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
