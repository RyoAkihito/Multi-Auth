<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md max-w-lg w-full">
        <h2 class="text-2xl font-bold mb-6">Status Pendaftaran</h2>

        @if($siswa)
            <p><strong>Nama:</strong> {{ $siswa->name }}</p>
            <p><strong>NISN:</strong> {{ $siswa->NISN }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $siswa->Jenis_Kelamin }}</p>
            <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
            <p><strong>Sekolah Asal:</strong> {{ $siswa->Sekolah_Asal }}</p>
            <p><strong>Status Pendaftaran:</strong>
                <span class="font-semibold text-indigo-600">{{ $siswa->Status_Pendaftaran }}</span>
            </p>
        @else
            <p class="text-red-500">Kamu belum mendaftar.</p>
        @endif
    </div>
</body>
</html>
