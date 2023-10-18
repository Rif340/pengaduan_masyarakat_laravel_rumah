<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home',[pengaduanController::class,'index',]);
Route::get('/masyarakat',[MasyarakatController::class,'index',]);
Route::get('/petugas',[PetugasController::class,'index',]);

Route::get('/isi-pengaduan',[pengaduanController::class,'tampil_pengaduan',]);
Route::post('/isi-pengaduan',[pengaduanController::class,'proses_tambah_pengaduan',]);

Route::get('/isi-masyarakat',[MasyarakatController::class,'tampil_masyarakat',]);
Route::post('/isi-masyarakat',[MasyarakatController::class,'proses_tambah_masyarakat',]);

Route::get('/isi-petugas',[PetugasController::class,'tampil_petugas',]);
Route::post('/isi-petugas',[PetugasController::class,'proses_tambah_petugas',]);

// pengaduan CRUD
Route::get('/hapus-pengaduan/{id}',[pengaduanController::class,'hapus',]);
Route::get('/detail-pengaduan/{id}',[pengaduanController::class,'detail_pengaduan',]);

Route::post('/update-pengaduan/{id}',[pengaduanController::class,'proses_update_pengaduan',]);
Route::get('/update-pengaduan/{id}',[pengaduanController::class,'update_pengaduan',]);

// masyarakat CRUD
Route::get('/hapus-masyarakat/{nik}',[MasyarakatController::class,'hapus',]);
Route::get('/detail-masyarakat/{nik}',[MasyarakatController::class,'detail_Masyarakat',]);

Route::post('/update-masyarakat/{nik}',[MasyarakatController::class,'proses_update_masyarakat',]);
Route::get('/update-masyarakat/{nik}',[MasyarakatController::class,'update_masyarakat',]);

// petugas CRUD
Route::get('/hapus-petugas/{id}',[PetugasController::class,'hapus',]);
Route::get('/detail-petugas/{id}',[PetugasController::class,'detail_petugas',]);

Route::post('/update-petugas/{id}',[PetugasController::class,'proses_update_petugas',]);
Route::get('/update-petugas/{id}',[PetugasController::class,'update_petugas',]);

// register
Route::post('/register',[AuthController::class,'register',]);
Route::get('/register',[AuthController::class,'tampil_register',]);
Route::get('/login',[AuthController::class,'tampil_login',]);
?>