<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiPemilikController extends Controller
{
    public function index()
    {
        return view('resepsionis.registrasi-pemilik.index');
    }
}
