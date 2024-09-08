<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
//use App\Http\Controllers\BarangController;
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

// Route::get('/',[BarangController::class,'index']);

// Route::get('/barang',[BarangController::class,'semuaBarang'] );

// Route::get('/kategori',[BarangController::class,'semuaKategori'] );

// //Route::get('/barang/tambah',[BarangController::class,'TambahBarang']);
// Route::post('/barang/store',[BarangController::class,'barangStore']);

// Route::get('/barang/edit/{id}',[BarangController::class,'editBarang']);
// Route::put('/barang/update',[BarangController::class,'updateBarang']);

// Route::get('/barang/hapus/{idd}',[BarangController::class,'HapusBarang']);

// Route::get('/kategori/tambah',[BarangController::class,'TambahKategori']);
// Route::post('/kategori/store',[BarangController::class,'KategoriStore']);

// Route::get('/kategori/edit/{id}',[BarangController::class,'EditKategori']);   
// Route::post('/kategori/update',[BarangController::class,'UpdateKategori']);

// Route::get('/kategori/hapus/{iddd}',[BarangController::class,'HapusKategori']);


// COBA
Route::get('/',[BarangController::class,'index']);

Route::get('/barang',[BarangController::class,'SemuaBarang'] );

Route::get('/kategori',[BarangController::class,'SemuaKategori'] );

Route::get('/barang/tambah',[BarangController::class,'TambahBarang']);
Route::post('/barang/store',[BarangController::class,'BarangStore']);

Route::get('/barang/edit/{id}',[BarangController::class,'EditBarang']);   
Route::post('/barang/update',[BarangController::class,'UpdateBarang']);

Route::get('/barang/hapus/{idd}',[BarangController::class,'HapusBarang']);

Route::get('/kategori/tambah',[BarangController::class,'TambahKategori']);
Route::post('/kategori/store',[BarangController::class,'KategoriStore']);

Route::get('/kategori/edit/{id}',[BarangController::class,'EditKategori']);   
Route::post('/kategori/update',[BarangController::class,'UpdateKategori']);

Route::get('/kategori/hapus/{iddd}',[BarangController::class,'HapusKategori']);

Route::get('/test', function () {
    return view('welcome');
});
