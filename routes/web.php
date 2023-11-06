<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;

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
Route::post('/addinternship', [JobController::class, 'store']);
Route::get('/editinternship/{id}', [JobController::class, 'edit'] );
Route::post('/editinternship/{id}', [JobController::class, 'update'] );
Route::get('/internshipdetail/{id}', [JobController::class, 'detail'] );
Route::get('/myinternshiplist', [JobController::class, 'index'] );
Route::get('/job/{id}/applicants', [JobController::class, 'applicants'])->name('job.applicants');
Route::get('/allinternshiplist', [JobController::class, 'indexall']); 
Route::get('/applyinternship/{id}', [JobController::class, 'apply']); 
Route::get('/internship/search', [JobController::class, 'search']); 
Route::get('/internship/search/company', [JobController::class, 'search2']); 
Route::get('/internship/matching', [JobController::class, 'match']); 

// ApplicationController
Route::get('/viewapplicantslist/{id}', [ApplicationController::class, 'applicants'] );
Route::post('/applyinternship/{id}/apply', [ApplicationController::class, 'store']);
Route::get('/internship/{id}/accept', [ApplicationController::class, 'accept']);
Route::get('/internship/{id}/reject', [ApplicationController::class, 'reject']);
Route::get('/applyinternship', function () {
    return view('/apply');
});
Route::post('/application/{id}/review', [ApplicationController::class, 'markAsUnderReview'])->name('application.under_review');

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

Route::get('/email', [EmailController::class, 'index'] );