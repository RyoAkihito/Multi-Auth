<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-blue-900 text-white p-5 space-y-4">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <ul class="space-y-2">
                <li><a href="/dashboard" class="block p-2 hover:bg-blue-700 rounded">Dashboard</a></li>
                <li><a href="/admin/user" class="block p-2 hover:bg-blue-700 rounded">Kelola User</a></li>
                <li><a href="/logout" class="block p-2 hover:bg-red-700 rounded">Logout</a></li>
            </ul>
        </nav>

        <!-- Konten utama -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-semibold mb-4">Dashboard Admin</h1>

            <!-- Statistik Laporan -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="p-4 bg-white shadow rounded-lg">
                    <h2 class="text-lg font-semibold">Total Laporan</h2>
                    <p class="text-2xl font-bold">120</p>
                </div>
                <div class="p-4 bg-white shadow rounded-lg">
                    <h2 class="text-lg font-semibold">Laporan Selesai</h2>
                    <p class="text-2xl font-bold text-green-600">90</p>
                </div>
                <div class="p-4 bg-white shadow rounded-lg">
                    <h2 class="text-lg font-semibold">Laporan Dalam Proses</h2>
                    <p class="text-2xl font-bold text-yellow-600">30</p>
                </div>
            </div>

            <!-- Tabel Laporan -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Laporan Terbaru</h2>
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Judul</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border">
                            <td class="border p-2">1</td>
                            <td class="border p-2">Laporan AC Rusak</td>
                            <td class="border p-2 text-yellow-600">Pending</td>
                        </tr>
                        <tr class="border">
                            <td class="border p-2">2</td>
                            <td class="border p-2">Laporan Lampu Mati</td>
                            <td class="border p-2 text-green-600">Selesai</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>