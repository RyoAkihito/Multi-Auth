<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'user_id', 'name', 'NISN', 'Jenis_Kelamin', 'alamat', 'Sekolah_Asal', 'Status_Pendaftaran',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
