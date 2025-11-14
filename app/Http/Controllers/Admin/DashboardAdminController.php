<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Iluminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\JenisHewan;
use App\Models\RasHewan;

class DashboardAdminController extends  Controller 
{
    public function index()
{
    return view('admin.dashboard-admin', [
        'totalUser' => User::count(),
        'totalPet' => Pet::count(),
        'totalJenisHewan' => JenisHewan::count(),
        'totalRas' => RasHewan::count(),
    ]);
}
}

?>