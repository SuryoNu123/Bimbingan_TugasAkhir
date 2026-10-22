<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\CatatanController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])
    ->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])
    ->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])
    ->name('mahasiswa.destroy');
Route::get('/dosen', [DosenController::class, 'index'])
    ->name('dosen.index');

Route::get('/jadwal', [JadwalController::class, 'index'])
    ->name('jadwal.index');

Route::get('/catatan', [CatatanController::class, 'index'])
    ->name('catatan.index');
Route::get('/catatan/{id}', [CatatanController::class, 'show'])
    ->name('catatan.view');

Route::get('/pengajuan', [PengajuanController::class, 'index'])
    ->name('pengajuan.index');

Route::get('/pengajuan/ajukan', [PengajuanController::class,'ajukan'])
    ->name('pengajuan.ajukan');

Route::get('/pengajuan/riwayat', [PengajuanController::class,'riwayat'])
    ->name('pengajuan.riwayat');
Route::post(
    '/pengajuan/store', [PengajuanController::class,'store']
)->name('pengajuan.store');
// Edit
Route::get('/pengajuan/{id}/edit', [PengajuanController::class, 'edit'])
    ->name('pengajuan.edit');
// Update
Route::put('/pengajuan/{id}', [PengajuanController::class, 'update'])
    ->name('pengajuan.update');
// Delete
Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy'])
    ->name('pengajuan.destroy');