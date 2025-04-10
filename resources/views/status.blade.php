<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Status Pendaftaran Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-indigo-600">Status Pendaftaran</div>
            <div>
                <a href="/" class="text-sm text-gray-700 hover:text-indigo-600">Home</a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="flex flex-1 flex-col md:flex-row">
        <!-- Kiri: Formulir Pencarian -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-center mb-6">Formulir Pencarian NISN</h2>

                <!-- Pesan Sukses atau Kesalahan -->
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
                @elseif (session('error'))
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800">
                        <div class="flex items-center gap-2">
                            <!-- Icon -->
                            <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span class="font-medium">Kesalahan:</span>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Formulir Pencarian -->
                <form method="POST" action="{{ route('status.searchByNISN') }}">
                    @csrf

                    <!-- NISN -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium">NISN</label>
                        <input type="text" name="nisn"
                            class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            required>
                    </div>

                    <!-- Tombol -->
                    <button type="submit"
                        class="w-full py-3 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                        Cari Status
                    </button>
                </form>
            </div>
        </div>

        <!-- Kanan: Hasil Pencarian -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            @isset($siswa)
                <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
                    <h3 class="text-xl font-semibold mb-4">Detail Siswa</h3>
                    <p><strong>Nama:</strong> {{ $siswa->name }}</p>
                    <p><strong>NISN:</strong> {{ $siswa->NISN }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $siswa->Jenis_Kelamin }}</p>
                    <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
                    <p><strong>Sekolah Asal:</strong> {{ $siswa->Sekolah_Asal }}</p>
                    <p><strong>Status Pendaftaran:</strong>
                        <span class="font-semibold text-indigo-600">{{ $siswa->Status_Pendaftaran }}</span>
                    </p>
                </div>
            @else
                <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
                    <p class="text-red-500">Silakan masukkan NISN Anda untuk mengetahui status pendaftaran.</p>
                </div>
            @endisset
        </div>
    </div>
</body>

</html>
