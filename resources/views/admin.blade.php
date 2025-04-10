<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <nav class="w-64 bg-blue-900 text-white p-5 space-y-4">
            <h1 class="text-xl font-bold mb-6">Admin Panel</h1>
            <ul class="space-y-2">
                <li><a href="/admin" class="block p-2 hover:bg-blue-700 rounded">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}" class="block p-2 hover:bg-blue-700 rounded">User</a></li>
                <li><a href="/logout" class="block p-2 hover:bg-red-700 rounded">Logout</a></li>
            </ul>
        </nav>

        <!-- Konten Utama -->
        <main class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-2xl font-semibold mb-6">Daftar Pendaftar</h1>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-blue-800 text-white">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">NISN</th>
                            <th class="px-6 py-3">Sekolah Asal</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($siswa as $index => $data)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $data->name }}</td>
                                <td class="px-6 py-4">{{ $data->NISN }}</td>
                                <td class="px-6 py-4">{{ $data->Sekolah_Asal }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.updateStatus', $data->id) }}" method="POST">
                                        @csrf
                                        <select name="Status_Pendaftaran" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                                            <option value="Diterima" {{ $data->Status_Pendaftaran == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                            <option value="Cadangan" {{ $data->Status_Pendaftaran == 'Cadangan' ? 'selected' : '' }}>Cadangan</option>
                                            <option value="Ditolak" {{ $data->Status_Pendaftaran == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.siswa.show', $data->id) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data pendaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
