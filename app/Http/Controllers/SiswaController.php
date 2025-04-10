<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    // Menampilkan form pendaftaran
    public function showForm()
    {
        return view('pendaftaran'); // Ganti dengan nama view form pendaftaran kamu
    }

    // Menyimpan data pendaftaran siswa
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'NISN' => 'required|numeric|unique:siswa',
            'Jenis_Kelamin' => 'required',
            'alamat' => 'required',
            'Sekolah_Asal' => 'required',
        ]);

        // Pastikan user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Simpan data siswa ke database
        Siswa::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'NISN' => $request->NISN,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'alamat' => $request->alamat,
            'Sekolah_Asal' => $request->Sekolah_Asal,
            'Status_Pendaftaran' => $request->Status_Pendaftaran ?? 'Cadangan',
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }

    // Menampilkan form status pencarian
    public function showStatusForm()
    {
        return view('status');
    }

    // Mencari siswa berdasarkan NISN
    public function searchByNISN(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:10',
        ]);

        $siswa = Siswa::where('NISN', $request->nisn)->first();

        if (!$siswa) {
            return redirect()->route('status.form')->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('status', compact('siswa'));
    }

    // Menampilkan semua data siswa (opsional untuk admin)
    public function index()
    {
        $siswa = Siswa::all();
        return view('semua_siswa', compact('siswa')); // Ganti view sesuai kebutuhan
    }

    // Menampilkan data profil user + pendaftarannya
    public function showProfile()
    {
        $user = Auth::user();
        $pendaftaran = $user->pendaftaran;

        return view('profile', compact('user', 'pendaftaran'));
    }
}
