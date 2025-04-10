<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">

        <!-- Kanan: Form Register -->
        <div class="flex w-full md:w-1/2 justify-center items-center bg-white p-8">
            <div class="w-full max-w-md bg-white shadow-md rounded-2xl p-10 space-y-8">
                <h1 class="text-3xl font-bold text-center text-gray-800">Daftar Akun</h1>

                <!-- Validasi Error -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('register.action') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required
                            class="mt-2 block w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Alamat Email</label>
                        <input type="email" id="email" name="email" required
                            class="mt-2 block w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Masukkan email">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
                        <input type="password" id="password" name="password" required
                            class="mt-2 block w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Masukkan kata sandi">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Konfirmasi
                            Kata Sandi</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="mt-2 block w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Ulangi kata sandi">
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition">Daftar
                        Sekarang</button>
                </form>

                <p class="text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a>
                </p>
            </div>
        </div>

        <!-- Kiri: Welcome Message -->
        <div class="hidden md:flex w-1/2 bg-white justify-center items-center">
            <h2 class="text-3xl font-bold text-blue-600">Bergabung Sekarang</h2>
        </div>


    </div>
</body>

</html>
