<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function homeindex()
    {
        return view('home');
    }

    public function welcome() {
        return view('welcome');
    }

    public function cekKoneksi()
    {
        try {
            \DB::connection()->getPdo();
            return 'Koneksi ke database berhasil';
        } catch (\Exception $e) {
            return 'Koneksi ke database gagal' . $e->getMessage();
        }
    }
}
