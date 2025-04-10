<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-blue-900 text-white p-5 space-y-4">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <ul class="space-y-2">
                <li><a href="/admin" class="block p-2 hover:bg-blue-700 rounded">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}" class="block p-2 bg-blue-700 rounded">User</a></li>
                <li><a href="/logout" class="block p-2 hover:bg-red-700 rounded">Logout</a></li>
            </ul>
        </nav>

        <!-- Konten Utama -->
        <main class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-2xl font-semibold mb-4">Data Pengguna</h1>

            <!-- Flash message -->
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel User -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Daftar Pengguna</h2>

                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Role</th>
                            <th class="border p-2">Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr>
                                <td class="border p-2 text-center">{{ $index + 1 }}</td>
                                <td class="border p-2">{{ $user->name }}</td>
                                <td class="border p-2">{{ $user->email }}</td>
                                <td class="border p-2 capitalize">{{ $user->role }}</td>
                                <td class="border p-2">{{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4">Belum ada pengguna terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
