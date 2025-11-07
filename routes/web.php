<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;

// Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create']);
// Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('site/home');
});

Route::get('/login', function () {
    return view('site/login');
});

Route::get('/cek-koneksi', [SiteController::class,'cekKoneksi'])->name('site.cek-koneksi');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication Routes
Auth::routes();

// Akses Administrator
Route::middleware('isAdministrator')->group(function () {
    Route::get('/admin/dashboard-admin', [App\Http\Controllers\Admin\DashboardAdminController::class, 'index'])->name('admin.dashboard-admin');
    Route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
    Route::get('/admin/jenis-hewan/create', [App\Http\Controllers\Admin\JenisHewanController::class, 'create'])->name('admin.jenis-hewan.create');
    Route::post('/admin/jenis-hewan/store', [App\Http\Controllers\Admin\JenisHewanController::class, 'store'])->name('admin.jenis-hewan.store');

    Route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori/create', [App\Http\Controllers\Admin\KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::get('/admin/kategori/store', [App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('admin.kategori.store');

    Route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
    Route::get('/admin/kategori-klinis/create', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'create'])->name('admin.kategori-klinis.create');
    Route::get('/admin/kategori-klinis/store', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'store'])->name('admin.kategori-klinis.store');

    Route::get('/admin/kode-tindakan-terapi', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
    Route::get('/admin/kode-tindakan-terapi/create', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'create'])->name('admin.kode-tindakan-terapi.create');
    Route::get('/admin/kode-tindakan-terapi/store', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'store'])->name('admin.kode-tindakan-terapi.store');

    Route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
    Route::get('/admin/pemilik/create', [App\Http\Controllers\Admin\PemilikController::class, 'create'])->name('admin.pemilik.create');
    Route::get('/admin/pemilik/store', [App\Http\Controllers\Admin\PemilikController::class, 'store'])->name('admin.pemilik.store');

    Route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/admin/pet/create', [App\Http\Controllers\Admin\PetController::class, 'create'])->name('admin.pet.create');
    Route::get('/admin/pet/store', [App\Http\Controllers\Admin\PetController::class, 'store'])->name('admin.pet.store');

    Route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    Route::get('/admin/ras-hewan/create', [App\Http\Controllers\Admin\RasHewanController::class, 'create'])->name('admin.ras-hewan.create');
    Route::get('/admin/ras-hewan/store', [App\Http\Controllers\Admin\RasHewanController::class, 'store'])->name('admin.ras-hewan.store');

    Route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/admin/role/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.role.create');
    Route::get('/admin/role/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');

    Route::get('/admin/role-user', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('admin.role-user.index');
    Route::get('/admin/role-user/create', [App\Http\Controllers\Admin\RoleUserController::class, 'create'])->name('admin.role-user.create');
    Route::get('/admin/role-user/store', [App\Http\Controllers\Admin\RoleUserController::class, 'store'])->name('admin.role-user.store');

    Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
    Route::get('/admin/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
});

// Akses Resepsionis
Route::middleware('isResepsionis')->group(function () {
    Route::get('/resepsionis/dashboard-resepsionis', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard-resepsionis');
    Route::get('/resepsionis/registrasi-pemilik', [App\Http\Controllers\Resepsionis\RegistrasiPemilikController::class, 'index'])->name('resepsionis.registrasi-pemilik.index');
    Route::get('/resepsionis/registrasi-pet', [App\Http\Controllers\Resepsionis\RegistrasiPetController::class, 'index'])->name('resepsionis.registrasi-pet.index');
    Route::get('/resepsionis/temu-dokter', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'index'])->name('resepsionis.temu-dokter.index');
});

// Akses Perawat
Route::middleware('isPerawat')->group(function () {
    Route::get('/perawat/dashboard-perawat', [App\Http\Controllers\Perawat\DashboardPerawatController::class, 'index'])->name('perawat.dashboard-perawat');
    Route::get('/perawat/rekam-medis', [App\Http\Controllers\Perawat\RekamMedisController::class, 'index'])->name('perawat.rekam-medis.index');
});

// Akses Dokter
Route::middleware('isDokter')->group(function () {
    Route::get('/dokter/dashboard-dokter', [App\Http\Controllers\Dokter\DashboardDokterController::class, 'index'])->name('dokter.dashboard-dokter');
    Route::get('/dokter/rekam-medis', [App\Http\Controllers\Dokter\RekamMedisController::class, 'index'])->name('dokter.rekam-medis.index');
});

// Akses Pemilik
Route::middleware('isPemilik')->group(function () {
    Route::get('/pemilik/dashboard-pemilik', [App\Http\Controllers\Pemilik\DashboardPemilikController::class, 'index'])->name('pemilik.dashboard-pemilik');
});





