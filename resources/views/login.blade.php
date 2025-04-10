<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="min-h-screen flex">
    <!-- Kiri: Welcome Message -->
    <div class="hidden md:flex w-1/2 bg-white justify-center items-center">
      <h2 class="text-3xl font-bold text-blue-600">Selamat Datang Kembali</h2>
    </div>

    <!-- Kanan: Form Login -->
    <div class="flex w-full md:w-1/2 justify-center items-center bg-white p-8">
      <div class="w-full max-w-md bg-white shadow-md rounded-2xl p-10 space-y-8">
        <h1 class="text-3xl font-bold text-center text-gray-800">Login</h1>

        <!-- Error Message (Laravel style) -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="" method="POST" class="space-y-6">
          @csrf
          <div>
            <label for="name" class="block text-sm font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" required
              class="mt-2 block w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              placeholder="Masukkan nama">
          </div>

          <div>
            <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
              class="mt-2 block w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              placeholder="Masukkan email">
          </div>

          <div>
            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
            <input type="password" name="password" required
              class="mt-2 block w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              placeholder="Masukkan password">
          </div>

          <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition">Login</button>
        </form>

        <p class="text-center text-sm text-gray-600">
          Belum punya akun?
          <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register di sini</a>
        </p>
      </div>
    </div>
  </div>
</body>

</html>
