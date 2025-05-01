<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UnitpsController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\Respon4Controller;
use App\Models\Unitps;
use Symfony\Component\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/input-nilai', function () {
    return view('dashboard.admin.input_nilai');
})->name('nilai.form');

Route::post('/nilai/store', [Respon4Controller::class, 'Respon4Controller@tambah_nilai_tugas'])->name('nilai.store');

Route::get('/hasil', function () {
    return view('dashboard.admin.hasil');
})->name('nilai.form');

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('landing.index');
    });
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login-acces', [MailController::class, 'login_acces'])->name('login-acces');
    Route::get('/register', function () {
        return view('auth.register');
    });
    Route::post('/send-register-otp', [MailController::class, 'sendOtp'])->name('send-otp');
    Route::post('/check-register-otp', [MailController::class, 'checkotp'])->name('check-otp');
    Route::get('/verify', function () {
        return view('auth.verifikasi');
    });
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

// -------------------------------------- DASHBOARD ADMIN --------------------------------------
Route::middleware(['auth'])->group(function () { //admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/unitps', [UnitpsController::class, 'index'])->name('unitps');
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');

    Route::get('/pelanggan/tambah', [PelangganController::class, 'tambah'])->name('pelanggan.tambah');
    Route::post('/pelanggan/submit', [PelangganController::class, 'submit'])->name('pelanggan.submit');
    Route::get('pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('pelanggan/edit/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::post('pelanggan/delete/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');
    Route::get('/pelanggan/search', [PelangganController::class, 'search'])->name('pelanggan.search');
    Route::get('/pelanggan/cetak', [PelangganController::class, 'cetak'])->name('pelanggan.cetak');

    Route::get('/unit/tambah', [UnitpsController::class, 'tambah'])->name('unit.tambah');
    Route::post('/unit/submit', [UnitpsController::class, 'submit'])->name('unit.submit');
    Route::get('/unit/edit/{id}', [UnitpsController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitpsController::class, 'update'])->name('unit.update');
    Route::post('/unit/delete/{id}', [UnitpsController::class, 'delete'])->name('unit.delete');
    Route::get('/unit/search', [UnitpsController::class, 'search'])->name('unit.search');
    Route::get('/unit/cetak', [UnitpsController::class, 'cetak'])->name('unit.cetak');

    Route::get('/pesanan/tambah', [PesananController::class, 'tambah'])->name('pesanan.tambah');
    Route::post('/pesanan/submit', [PesananController::class, 'submit'])->name('pesanan.submit');
    Route::get('/pesanan/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::post('/pesanan/update/{id}', [PesananController::class, 'update'])->name('pesanan.update');
    Route::post('/pesanan/delete/{id}', [PesananController::class, 'delete'])->name('pesanan.delete');
    Route::get('/pesanan/search', [PesananController::class, 'search'])->name('pesanan.search');
    Route::get('/pesanan/konfirmasi/{id}', [PesananController::class, 'konfirmasi'])->name('pesanan.konfirmasi');
    Route::get('/pesanan/cetak', [PesananController::class, 'cetak'])->name('pesanan.cetak');
});

Route::get('/logout', [MailController::class, 'logout']);

// -------------------------------------- DASHBOARD USER --------------------------------------
Route::get('/dashboardu', function () {
    return view('dashboard.admin.user.dashboard.dashboard');
});

Route::get('/pelangganu', function () {
    return view('dashboard.admin.user.pelanggan.pelanggan');
});

Route::get('unitpsu', function () {
    return view('dashboard.admin.user.unitps.unitps');
});

Route::get('pesananu', function () {
    return view('dashboard.admin.user.pesanan.pesanan');
});

Route::get('/udashboard', [DashboardController::class, 'userd'])->name('udashboard');
Route::get('/upelanggan', [PelangganController::class, 'user'])->name('upelanggan');
Route::get('/uunitps', [UnitpsController::class, 'user'])->name('uunitps');
Route::get('/upesanan', [PesananController::class, 'user'])->name('upesanan');

Route::post('/upesanan/submit', [PesananController::class, 'submitu'])->name('pelanggan.submitu');


// -------------------------------------- DASHBOARD Pimpinan --------------------------------------
Route::get('laporan', function () {
    return view('dashboard.pimpinan.laporan');
});

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/cetak', [laporanController::class, 'cetak'])->name('laporan.cetak');


// Route::get('/', function () {
//     return view('landing.index');
// });

// Route::get('/login', function(){
//     return view('auth.login');
// })->name('login');

// Route::post('/login-acces',[MailController::class,'login_acces'])->name('login-acces');

// Route::get('/register', function(){
//     return view('auth.register');
// });

// Route::post('/send-register-otp',[MailController::class,'sendOtp'])->name('send-otp');
// Route::post('/check-register-otp',[MailController::class,'checkotp'])->name('check-otp');

// Route::get('/verify', function(){
//     return view('auth.verifikasi');
// });

// Route::get('/dashboard', function(){
//     return view('dashboard.admin.dashboard');
// });

// Route::get('/pelanggan', function(){
//     return view('dashboard.admin.pelanggan');
// });

// Route::get('/unitps', function(){
//     return view('dashboard.admin.unitps');
// });

// Route::get('/pesanan', function(){
//     return view('dashboard.admin.pesanan');
// });

// Route::get('/tambahpelanggan', function() {
//     return view('dashboard.admin.tambahpelanggan');
// });

// Route::get('/tambahunit', function() {
//     return view('dashboard.admin.tambahunit');
// });

// Route::get('/tambahpesanan', function() {
//     return view('dashboard.admin.tambahpesanan');
// });

// Route::get('/laporann', function() {
//     return view('dashboard.admin.laporan');
// });

// -------------------------------------- DASHBOARD ADMIN --------------------------------------
// Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
// Route::get('/pelanggan',[PelangganController::class, 'index'])->name('pelanggan');
// Route::get('/unitps',[UnitpsController::class, 'index'])->name('unitps');
// Route::get('/pesanan',[PesananController::class, 'index'])->name('pesanan');


// Route::get('/pelanggan/tambah',[PelangganController::class, 'tambah'])->name('pelanggan.tambah');
// Route::post('/pelanggan/submit',[PelangganController::class, 'submit'])->name('pelanggan.submit');
// Route::get('pelanggan/edit/{id}',[PelangganController::class, 'edit'])->name('pelanggan.edit');
// Route::post('pelanggan/edit/{id}',[PelangganController::class, 'update'])->name('pelanggan.update');
// Route::post('pelanggan/delete/{id}',[PelangganController::class, 'delete'])->name('pelanggan.delete');
// Route::get('/pelanggan/search',[PelangganController::class, 'search'])->name('pelanggan.search');
// Route::get('/pelanggan/cetak',[PelangganController::class, 'cetak'])->name('pelanggan.cetak');

// Route::get('/unit/tambah',[UnitpsController::class, 'tambah'])->name('unit.tambah');
// Route::post('/unit/submit',[UnitpsController::class, 'submit'])->name('unit.submit');
// Route::get('/unit/edit/{id}',[UnitpsController::class, 'edit'])->name('unit.edit');
// Route::post('/unit/update/{id}',[UnitpsController::class, 'update'])->name('unit.update');
// Route::post('/unit/delete/{id}',[UnitpsController::class, 'delete'])->name('unit.delete');
// Route::get('/unit/search',[UnitpsController::class, 'search'])->name('unit.search');
// Route::get('/unit/cetak',[UnitpsController::class, 'cetak'])->name('unit.cetak');

// Route::get('/pesanan/tambah',[PesananController::class, 'tambah'])->name('pesanan.tambah');
// Route::post('/pesanan/submit',[PesananController::class, 'submit'])->name('pesanan.submit');
// Route::get('/pesanan/edit/{id}',[PesananController::class, 'edit'])->name('pesanan.edit');
// Route::post('/pesanan/update/{id}',[PesananController::class, 'update'])->name('pesanan.update');
// Route::post('/pesanan/delete/{id}',[PesananController::class, 'delete'])->name('pesanan.delete');
// Route::get('/pesanan/search',[PesananController::class, 'search'])->name('pesanan.search');
// Route::get('/pesanan/konfirmasi/{id}',[PesananController::class, 'konfirmasi'])->name('pesanan.konfirmasi');
// Route::get('/pesanan/cetak',[PesananController::class, 'cetak'])->name('pesanan.cetak');
