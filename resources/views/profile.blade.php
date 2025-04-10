<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Saya</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Pendaftaran</a>
            <div>
                <a href="/status" class="nav-link d-inline">Status</a>
                <a href="/" class="nav-link d-inline">Home</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Profil Saya</h2>

        <!-- Data Akun -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <strong>Data Akun</strong>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            </div>
        </div>

        <!-- Data Pendaftaran -->
        @if($pendaftaran)
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <strong>Data Pendaftaran</strong>
                </div>
                <div class="card-body">
                    <p><strong>NISN:</strong> {{ $pendaftaran->NISN }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $pendaftaran->Jenis_Kelamin }}</p>
                    <p><strong>Alamat:</strong> {{ $pendaftaran->alamat }}</p>
                    <p><strong>Sekolah Asal:</strong> {{ $pendaftaran->Sekolah_Asal }}</p>
                    <p><strong>Status Pendaftaran:</strong>
                        <span class="badge
                            @if($pendaftaran->Status_Pendaftaran == 'Diterima') bg-success
                            @elseif($pendaftaran->Status_Pendaftaran == 'Cadangan') bg-warning
                            @else bg-danger
                            @endif">
                            {{ $pendaftaran->Status_Pendaftaran }}
                        </span>
                    </p>
                </div>
            </div>
        @else
            <div class="alert alert-info mt-4">
                Kamu belum melakukan pendaftaran.
            </div>
        @endif
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
