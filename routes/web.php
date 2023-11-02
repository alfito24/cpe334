<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;

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
// LoginController
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// RegisterController
Route::get('/studentregister', [RegisterController::class, 'show']); 
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/myaccount', [RegisterController::class, 'account'] );
Route::get('/updateprofile', [RegisterController::class, 'updateaccount']);
Route::post('/updateprofile/{id}', [RegisterController::class, 'updateprofile']);
Route::get('/companyregister', function () {
    return view('registercompany');
});
Route::get('/chooserole', function () {
    return view('chooserole');
});

// Job/InternhipController
Route::get('/editinternship/{id}', [JobController::class, 'edit'] );
Route::post('/editinternship/{id}', [JobController::class, 'update'] );
Route::get('/internshipdetail/{id}', [JobController::class, 'detail'] );
Route::get('/myinternshiplist', [JobController::class, 'index'] );
Route::get('/viewapplicantslist/{id}', [JobController::class, 'applicants'] );
Route::get('/job/{id}/applicants', [JobController::class, 'applicants'])->name('job.applicants');
Route::get('/allinternshiplist', [JobController::class, 'indexall']); 
Route::get('//applyinternship/{id}', [JobController::class, 'apply']); 

// ApplicationController
Route::post('/applyinternship/{id}/apply', [ApplicationController::class, 'store']);
Route::get('/applyinternship', function () {
    return view('/apply');
});
Route::post('/addinternship', [JobController::class, 'store']);
Route::get('/addinternship', function () {
    return view('addinternship');
});

//Landing Page
Route::get('/', function () {
    return view('home');
});

//template
Route::get('/template', function () {
    return view('template');
});
Route::get('/tryaddinternship', function () {
    return view('tryaddinternship');
});