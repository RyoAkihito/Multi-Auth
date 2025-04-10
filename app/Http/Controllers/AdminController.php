<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;



class AdminController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin', compact('siswa'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'Status_Pendaftaran' => 'required|in:Diterima,Cadangan,Tidak DiTerima',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->Status_Pendaftaran = $request->Status_Pendaftaran;
        $siswa->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }
    function user()
    {
        return view('home');
    }

    // AdminController.php
    public function showStatus($status)
    {
        $valid = ['Diterima', 'Cadangan', 'Tidak DiTerima'];
        if (!in_array($status, $valid)) {
            abort(404);
        }

        $siswa = Siswa::where('Status_Pendaftaran', $status)->get();
        return view('admin', compact('siswa', 'status'));
    }
    public function listUsers()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function showSiswa($id)
    {
        $siswa = Siswa::findOrFail($id); // BUKAN ->get()
        return view('admin.siswa-detail', compact('siswa'));
    }



}
