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
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']); 
Route::get('/register', [RegisterController::class, 'show']); 
Route::post('/register', [RegisterController::class, 'store']);

//Landing Page
Route::get('/', function () {
    return view('home');
});
Route::get('/internshiplist', function () {
    return view('internshiplist');
});
Route::get('/jobdetail', function () {
    return view('jobdetail');
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
Route::get('/dashboard', [DashboardController::class, 'index']);

//fitur produk
Route::get('/dashboard/tambahproduk', [DashboardController::class, 'tambah']);
Route::post('/dashboard/tambahproduk', [ProductController::class, 'storeProduct']);
Route::get('/dashboard/daftarproduk', [DashboardController::class, 'show']);
Route::get('/dashboard/hapusproduk/{id}', [ProductController::class, 'hapus']); 
Route::get('/dashboard/updateproduk/{id}', [DashboardController::class, 'showEdit']); 
Route::post('/dashboard/updateproduk/{id}', [ProductController::class, 'updateProduct']); 

Route::get('/dashboard/detailorder/{id}', [DashboardController::class, 'detailOrder']); 
Route::get('/dashboard/detailorder/{id}/ambil-order', [PickupController::class, 'donepickup']); 

// Route::get('/detailorder', function () {
//     return view('dashboard.detailorder');
// });
Route::get('/myaccount', [RegisterController::class, 'account'] );
Route::get('/updateprofile', [RegisterController::class, 'updateaccount']);
Route::post('/updateprofile/{id}', [RegisterController::class, 'updateprofile']);


Route::get('/detail', function () {
    return view('buyproducts.detail');
});
