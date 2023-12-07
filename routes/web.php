<?php

use App\Http\Middleware\IsAdmin;

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

/** Auth Classes Import */
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

/** Register Classes Import */
use App\Http\Controllers\Register\StudentRegisterController;
use App\Http\Controllers\Register\CompanyRegisterController;


use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyConfirmationController;

use App\Http\Controllers\Company\AddInternshipController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::view('/login', 'login'); // Login UI
Route::post('/login', [LoginController::class, 'authenticate']); // Login Controller

Route::post('/logout', [LogoutController::class, 'logout']); // Logout Controller

// User Register
Route::view('/chooserole', 'chooserole'); // Role Picking UI

/** Student/Applicant Registration */
Route::view('/studentregister', 'register'); // Student/Applicant Registration Page UI
Route::post('/registerStudent', [StudentRegisterController::class, 'storeStudent']); // Send the Student/Applicant Registration Data to DB

/** Company Registration */
Route::view('/companyregister', 'registercompany'); // Company Registration Page UI
Route::post('/registerCompany', [CompanyRegisterController::class, 'storeCompany']); // Send the Company Registration Data to DB

// AccountController
Route::get('/user_profile', [AccountController::class, 'index'] );
Route::get('/profile_edit', [AccountController::class, 'profile_edit'] );
Route::post('/profile_edit', [AccountController::class, 'profile_edit_update'] );

// Company/AddInternshipController
Route::post('/add_internship', [AddInternshipController::class, 'storeInternship']); // Validate and Send the Internship Data to DB
Route::get('/add_internship', [AddInternshipController::class, 'add_internship']); // Display Add Internship Page

// Job/InternhipController
Route::get('/', [JobController::class, 'home']);
Route::get('/list_internship', [JobController::class, 'list_internship'])->middleware('RedirectIfNotAuthenticated'); // Applicant
Route::get('/company_internship', [JobController::class, 'company_internship'])->middleware('RedirectIfNotAuthenticated'); // Company
Route::get('/detail_internship/{id}', [JobController::class, 'detail_internship'])->middleware('RedirectIfNotAuthenticated'); // Both, but mainly for Applicant
Route::get('/detail_company/{id}', [JobController::class, 'detail_company'])->middleware('RedirectIfNotAuthenticated'); // Both, but mainly for Applicant
Route::get('/editinternship/{id}', [JobController::class, 'edit'] ); /** UNUSED ??? */
Route::post('/editinternship/{id}', [JobController::class, 'update'] ); /** UNUSED ??? */

Route::get('/internship/search', [JobController::class, 'search']); // Both, but mainly for Applicant
Route::get('/internship/search/company', [JobController::class, 'search2']); // Both, but mainly for Applicant
Route::get('/internship/matching', [JobController::class, 'match']); // Applicant
Route::get('/apply_intern/{id}', [JobController::class, 'apply_intern']); // Display the Internship Application Page

// ApplicationController
Route::get('/viewapplicantslist/{id}', [ApplicationController::class, 'applicants'] );
Route::get('/application_history', [ApplicationController::class, 'application_history'] ); // Applicant
Route::get('/internship/{id}/accept', [ApplicationController::class, 'accept']); // Company
Route::get('/internship/{id}/reject', [ApplicationController::class, 'reject']); // Company

Route::post('/apply/{id}', [ApplicationController::class, 'apply_internship']); // Send the Internship Application Data to DB

// ExperienceController


// Company Controller
Route::get('/company_dashboard', [CompanyController::class, 'summary']); // Company
Route::get('/company_detail', [CompanyController::class, 'detail']);
Route::get('/company_applicants', [CompanyController::class, 'company_applicants']); // Company

Route::post('/add_experience', [ExperienceController::class, 'store']); // Send the Experience Data to DB
Route::post('/add_education', [EducationController::class, 'store']); // Send the Education Data to DB

// Admin Controller
Route::middleware([IsAdmin::class])->group(function(){ // Middleware (only Admin can access those endpoints)
    Route::get('/dashboard', [DashboardController::class, 'summary']);
    Route::get('/list_companies', [DashboardController::class, 'list_companies']);
    Route::get('/company/{id}/accept', [CompanyConfirmationController::class, 'accept']);
    Route::get('/company/{id}/reject', [CompanyConfirmationController::class, 'destroy']);
    });

//template
Route::get('/tailwind', function () {
    return view('template_tailwind');
});
Route::get('/profile_edit/experience', function () {
    return view('profile_edit_experience'); // Display the Add Experience Page
});
Route::get('/profile_edit/education', function () {
    return view('profile_edit_education'); // Display the Add Education Page
});

