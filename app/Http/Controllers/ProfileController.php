<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendaftaran = $user->pendaftaran;

        return view('profile', compact('user', 'pendaftaran')); // ← DI SINI view-nya 'profile'
    }

}
