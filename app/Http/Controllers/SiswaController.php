<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'NISN' => 'required|unique:siswa,NISN',
            'Jenis_Kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat' => 'required|string',
            'Sekolah_Asal' => 'required|string',
        ]);

        Siswa::create([
            'name' => $request->name,
            'NISN' => $request->NISN,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'alamat' => $request->alamat,
            'Sekolah_Asal' => $request->Sekolah_Asal,
            'Status_Pendaftaran' => 'Cadangan', // Default value
        ]);

        return redirect('/')->with('success', 'Pendaftaran berhasil!');
    }
}
