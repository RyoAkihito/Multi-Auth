<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin');

    }

    function Petugas(){
        return view('Dashboard');

    }
    function user(){
        return view('home');
    }
}


