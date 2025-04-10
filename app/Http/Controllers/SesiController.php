<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $infologin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];


        if (Auth::attempt($infologin)) {
            $user = Auth::user();

            if ($user->role == 'user') {
                return redirect()->route('home'); // Redirect ke home
            } elseif ($user->role == 'admin') {
                return redirect()->route('admin'); // Redirect ke admin
            }
        } else {
            return redirect()->route('login')->withErrors('Login gagal')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


    // ...

    public function register()
    {
        return view('register'); // return halaman register
    }

    public function registerAction(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }


}
