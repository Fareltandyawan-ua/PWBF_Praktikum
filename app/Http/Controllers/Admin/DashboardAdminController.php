<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Iluminate\Http\Request;

class DashboardAdminController extends  Controller 
{
    public function index()
    {
        return view('admin.dashboard-admin');
    }

}

?>