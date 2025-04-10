<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-blue-900 text-white p-5 space-y-4">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <ul class="space-y-2">
                <li><a href="/admin" class="block p-2 hover:bg-blue-700 rounded">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}" class="block p-2 hover:bg-blue-700 rounded">User</a></li>
                <li><a href="/logout" class="block p-2 hover:bg-red-700 rounded">Logout</a></li>
            </ul>
        </nav>

        <!-- Konten Utama -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="mb-6">
                <a href="{{ url()->previous() }}"
                    class="inline-block bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded text-sm">&larr;
                    Kembali</a>
            </div>

            <h1 class="text-2xl font-semibold mb-6">Detail Pendaftar</h1>

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Nama Lengkap</p>
                        <p class="font-semibold text-lg">{{ $siswa->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">NISN</p>
                        <p class="font-semibold text-lg">{{ $siswa->NISN }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Jenis Kelamin</p>
                        <p class="font-semibold text-lg">{{ $siswa->Jenis_Kelamin }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Alamat</p>
                        <p class="font-semibold text-lg">{{ $siswa->alamat }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Sekolah Asal</p>
                        <p class="font-semibold text-lg">{{ $siswa->Sekolah_Asal }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-1">Status Pendaftaran</p>
                        <!-- Dropdown untuk ubah status -->
                        <form action="{{ route('admin.updateStatus', $siswa->id) }}" method="POST">
                            @csrf
                            <select name="Status_Pendaftaran" onchange="this.form.submit()"
                                class="border rounded p-1 w-full
                                @if ($siswa->Status_Pendaftaran == 'Diterima') text-green-600
                                @elseif ($siswa->Status_Pendaftaran == 'Cadangan') text-yellow-600
                                @else text-red-600 @endif">
                                <option value="Diterima" {{ $siswa->Status_Pendaftaran == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Cadangan" {{ $siswa->Status_Pendaftaran == 'Cadangan' ? 'selected' : '' }}>Cadangan</option>
                                <option value="Tidak DiTerima" {{ $siswa->Status_Pendaftaran == 'Tidak DiTerima' ? 'selected' : '' }}>Tidak Diterima</option>
                            </select>
                        </form>
                    </div>
                </div>

                <!-- Tombol Cetak PDF -->
                <div class="mt-8">
                    <a href="{{ route('admin.exportPDF', $siswa->id) }}" target="_blank"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Cetak PDF
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
