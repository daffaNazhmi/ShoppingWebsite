<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ROUTE USER
Route::get('/',  [App\Http\Controllers\UserController::class, 'index'])->name('Home'); 
Route::get('/detailBarang',  [App\Http\Controllers\UserController::class, 'index2'])->name('Detail');
Route::get('/orderBarang',  [App\Http\Controllers\UserController::class, 'index3'])->name('Order');
Route::get('/detail/show/{id}', [UserController::class, 'show'])->name('ShowBarang');


Auth::routes();

// ROUTE INDEX PESANAN, BARANG, KATEGORI
Route::get('/dashboard', [DashboardController::class, 'index'])->name('indexDashboard');
Route::get('/indexadmin', [BarangController::class, 'index'])->name('indexAdmin');
Route::get('/kategori', [KategoriController::class, 'index'])->name('indexKategori');

// ROUTE CRUD PESANAN
Route::post('/pesanan/store', [PesananController::class, 'store'])->name('StorePesanan');

// ROUTE CRUD KATEGORI
Route::get('/kategori/tambah', [KategoriController::class, 'nambah'])->name('TambahKategori');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('TambahStore');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('EditKategori');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('EditUpdate');
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'delete'])->name('HapusKategori');

// ROUTE CRUD BARANG
Route::get('/barang/tambah', [BarangController::class, 'nambah'])->name('TambahBarang');
Route::post('/barang/store', [BarangController::class, 'store'])->name('BarangStore');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('EditBarang');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('UpdateBarang');
Route::get('/barang/hapus/{id}', [BarangController::class, 'destroy'])->name('HapusBarang');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
