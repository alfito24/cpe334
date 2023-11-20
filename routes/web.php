<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;

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
Route::post('/registerStudent', [RegisterController::class, 'storeStudent']);
Route::post('/registerCompany', [RegisterController::class, 'storeCompany']);
Route::get('/companyregister', function () {
    return view('registercompany');
});
Route::get('/chooserole', function () {
    return view('chooserole');
});

// AccountController
Route::get('/user_profile', [AccountController::class, 'index'] );
Route::get('/profile_edit', [AccountController::class, 'profile_edit'] );
Route::post('/profile_edit', [AccountController::class, 'profile_edit_update'] );
Route::get('/myaccount', [AccountController::class, 'account'] );
Route::get('/updateprofile', [AccountController::class, 'updateaccount']);
Route::post('/updateprofile/{id}', [AccountController::class, 'updateprofile']);

// Job/InternhipController
Route::get('/', [JobController::class, 'home']);
Route::get('/list_internship', [JobController::class, 'list_internship']);
Route::get('/company_internship', [JobController::class, 'company_internship']);
Route::get('/detail_internship/{id}', [JobController::class, 'detail_internship']);
Route::get('/detail_company/{id}', [JobController::class, 'detail_company']);
Route::post('/addinternship', [JobController::class, 'store']);
Route::post('/add_internship', [JobController::class, 'add_internship']);
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
Route::get('/apply_internship/{id}', [ApplicationController::class, 'apply_internship']);
Route::post('/application/{id}/review', [ApplicationController::class, 'markAsUnderReview'])->name('application.under_review');

Route::get('/addinternship', function () {
    return view('addinternship');
});

// ExperienceController
Route::get('/add_experience', function () {
    return view('add_experience');
});
Route::post('/add_experience', [ExperienceController::class, 'store']);
Route::post('/add_education', [EducationController::class, 'store']);

//Landing Page
// Route::get('/', function () {
//     return view('home_new');
// });

//template
Route::get('/template', function () {
    return view('template_new');
});
Route::get('/tailwind', function () {
    return view('template_tailwind');
});
Route::get('/profile_edit/experience', function () {
    return view('profile_edit_experience');
});
Route::get('/profile_edit/education', function () {
    return view('profile_edit_education');
});
Route::get('/add_internship', function () {
    return view('add_internship');
});