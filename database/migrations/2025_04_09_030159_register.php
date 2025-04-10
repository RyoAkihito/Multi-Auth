<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('NISN')->unique();
            $table->enum('Jenis_Kelamin', ['Laki-Laki', 'Perempuan'])->default('Laki-Laki');
            $table->text('alamat');
            $table->string('Sekolah_Asal');
            $table->enum('Status_Pendaftaran', ['Diterima', 'Cadangan', 'Tidak DiTerima'])->default('Cadangan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
