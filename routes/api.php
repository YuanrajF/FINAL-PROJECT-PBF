<?php

use App\Http\Controllers\AturpesananController;
use App\Http\Controllers\UserControll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DurasiController;
use App\Http\Controllers\ItemPesananController;
use App\Http\Controllers\kiloanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PelangganControll;
use App\Http\Controllers\PesanankiloController;
use App\Http\Controllers\RegisterControll;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::post('users', [RegisterControll::class, 'store']);
    Route::post('login',[UserController::class,'login']);
    Route::post('items_pesanan', [ItemPesananController::class, 'store']);
    Route::get('items_pesanan', [ItemPesananController::class, 'index']);

Route::middleware(['jwt-auth'])->group(function(){
    Route::post('pelanggans', [PelangganController::class, 'store']);
    Route::get('pelanggans', [PelangganController::class, 'index']);
    Route::delete('pelanggans/{id}', [PelangganController::class, 'delete']);
    Route::put('pelanggans/{id}', [PelangganController::class, 'update']);
    
    Route::post('durasi', [DurasiController::class, 'store']); // POST a new durasi
    Route::get('durasi', [DurasiController::class, 'index']); // GET all durasis
    Route::put('durasi/{id}', [DurasiController::class, 'update']); // PUT to update a durasi
    // Route::delete('durasi/{id}', [DurasiController::class, 'delete']); // DELETE a durasi

    Route::get('layanans', [LayananController::class, 'index']); // GET all layanans
    Route::post('layanans', [LayananController::class, 'store']); // POST a new layanan
    Route::get('layanans/{id}', [LayananController::class, 'show']); // GET a single layanan
    Route::put('layanans/{id}', [LayananController::class, 'update']); // PUT to update a layanan

    Route::get('pesanans', [PesananController::class, 'index']); // GET all pesanans
    Route::post('pesanans', [PesananController::class, 'store']); // POST a new pesanan
    Route::get('pesanans/{id}', [PesananController::class, 'show']); // GET a single pesanan
    Route::put('pesanans/{id}', [PesananController::class, 'update']); // PUT to update a pesanan
    Route::delete('pesanans/{id}', [PesananController::class, 'destroy']); // DELETE a pesanan

    Route::get('kiloan', [kiloanController::class, 'index']); // GET all layanans
    Route::post('kiloan', [kiloanController::class, 'store']); // POST a new layanan
    Route::put('kiloan/{id}', [kiloanController::class, 'update']); // PUT to update a layanan

    Route::get('aturpesanan', [AturpesananController::class, 'index']); // GET all layanans
    Route::post('aturpesanan', [AturpesananController::class, 'store']); // POST a new layanan
    
    Route::get('pesanankilo', [PesanankiloController::class, 'index']); // GET all layanans
    Route::post('pesanankilo', [PesanankiloController::class, 'store']); // POST a new layanan


});
    // User routes
    // Route::get('users', [UserController::class, 'index']); // GET all users
    // // Route::post('users', [UserController::class, 'register']); // POST a new user
    // Route::get('users/{id}', [UserController::class, 'show']); // GET a single user
    // Route::put('users/{id}', [UserController::class, 'update']); // PUT to update a user
    // Route::delete('users/{id}', [UserController::class, 'destroy']); // DELETE a user

    // // Pelanggan routes
    // Route::get('/pelanggans', [PelangganController::class, 'index']); // GET all pelanggans
    // Route::post('pelanggans', [PelangganController::class, 'store']); // POST a new pelanggan
    // Route::get('pelanggans/{id}', [PelangganController::class, 'show']); // GET a single pelanggan
    // Route::put('pelanggans/{id}', [PelangganController::class, 'update']); // PUT to update a pelanggan
    // DELETE a pelanggan

    // Pesanan routes
    // Route::get('pesanans', [PesananController::class, 'index']); // GET all pesanans
    // Route::post('pesanans', [PesananController::class, 'store']); // POST a new pesanan
    // Route::get('pesanans/{id}', [PesananController::class, 'show']); // GET a single pesanan
    // Route::put('pesanans/{id}', [PesananController::class, 'update']); // PUT to update a pesanan
    // Route::delete('pesanans/{id}', [PesananController::class, 'destroy']); // DELETE a pesanan

    // // Durasi routes

    // Route::post('durasi', [DurasiController::class, 'store']); // POST a new durasi
    // Route::get('durasis/{id}', [DurasiController::class, 'show']); // GET a single durasi
    // Route::put('durasi/{id}', [DurasiController::class, 'update']); // PUT to update a durasi
    // Route::delete('durasi/{id}', [DurasiController::class, 'delete']); // DELETE a durasi

    // // Layanan routes
    // Route::get('layanans', [LayananController::class, 'index']); // GET all layanans
    // Route::post('layanans', [LayananController::class, 'store']); // POST a new layanan
    // Route::get('layanans/{id}', [LayananController::class, 'show']); // GET a single layanan
    // Route::put('layanans/{id}', [LayananController::class, 'update']); // PUT to update a layanan
    // Route::delete('layanans/{id}', [LayananController::class, 'destroy']); // DELETE a layanan

    // Route::get('kiloan', [kiloanController::class, 'index']); // GET all layanans
    // Route::post('kiloan', [kiloanController::class, 'store']); // POST a new layanan
    // Route::get('kiloan/{id}', [kiloanController::class, 'show']); // GET a single layanan
    // Route::put('kiloan/{id}', [kiloanController::class, 'update']); // PUT to update a layanan
    // Route::delete('kiloan/{id}', [kiloanController::class, 'destroy']); // DELETE a layanan

    // Route::get('aturpesanan', [AturpesananController::class, 'index']); // GET all layanans
    // Route::post('aturpesanan', [AturpesananController::class, 'store']); // POST a new layanan
    // Route::get('layanans/{id}', [kiloanController::class, 'show']); // GET a single layanan
    // Route::put('layanans/{id}', [kiloanController::class, 'update']); // PUT to update a layanan
    // Route::delete('layanans/{id}', [kiloanController::class, 'destroy']); // DELETE a layanan

    // Route::get('pesanankilo', [PesanankiloController::class, 'index']); // GET all layanans
    // Route::post('pesanankilo', [PesanankiloController::class, 'store']); // POST a new layanan
    
;



