<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\ProductController;

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
//fitur register dan login
Route::get('/login', [LoginController::class, 'show']); //halaman login
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']); //logout
Route::get('/register', [RegisterController::class, 'show']); //halaman register
Route::post('/register', [RegisterController::class, 'store']); //simpan data user ke database

//Landing Page
Route::get('/', function () {
    return view('home');
});

//template
Route::get('/template', function () {
    return view('template');
});

//fitur Pickup
Route::get('/pickup', [PickupController::class, 'index']);
Route::post('/pickup/storepickup', [PickupController::class, 'storepickup']);
Route::get('/pickup/cancelpickup/{id_transaksi}', [PickupController::class, 'cancelpickup']);

//fitur Beli product
Route::get('/buyproducts', [ProductController::class, 'showbuyproducts']);


//fitur admin
Route::get('/dashboard', [DashboardController::class, 'index']); //halaman dashboard

//fitur produk
Route::get('/dashboard/tambahproduk', [DashboardController::class, 'tambah']); //halaman tambah produk
Route::post('/dashboard/tambahproduk', [ProductController::class, 'storeProduct']); //simpan produk ke database
Route::get('/dashboard/daftarproduk', [DashboardController::class, 'show']); // halaman daftar produk
Route::get('/dashboard/hapusproduk/{id}', [ProductController::class, 'hapus']); // hapus produk
Route::get('/dashboard/updateproduk/{id}', [DashboardController::class, 'showEdit']); // halaman edit produk
Route::post('/dashboard/updateproduk/{id}', [ProductController::class, 'updateProduct']); //  edit produk
