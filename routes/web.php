<?php

/** Middleware */
use App\Http\Middleware\IsAdmin; // Admin
use App\Http\Middleware\IsCompany; // Company
use App\Http\Middleware\RedirectIfNotAuthenticated; // Company

use Illuminate\Support\Facades\Route;

/** Home Class Import */
use App\Http\Controllers\HomeController;

/** Auth Classes Import */
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

/** Register Classes Import */
use App\Http\Controllers\Register\StudentRegisterController;
use App\Http\Controllers\Register\CompanyRegisterController;

/** Profile View and Edit (Account) Classes Import */
use App\Http\Controllers\Account\ViewProfileController;
use App\Http\Controllers\Account\EditProfileController;

/** Company Classes Import */
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\CompanyProfileController;
use App\Http\Controllers\Company\AddInternshipController;
use App\Http\Controllers\Company\InternshipListController;
use App\Http\Controllers\Company\InternshipApplicantsController;
use App\Http\Controllers\Company\ApplicationConfirmationController;

/** Applicant Classes Import */
use App\Http\Controllers\Applicant\InternshipController;
use App\Http\Controllers\Applicant\SearchInternshipController;
use App\Http\Controllers\Applicant\ExperienceController;
use App\Http\Controllers\Applicant\EducationController;
use App\Http\Controllers\Applicant\ApplicationHistoryController;
use App\Http\Controllers\Applicant\ApplyInternshipController;
use App\Http\Controllers\Applicant\MatchInternshipController;

/** Admin Classes Import */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyConfirmationController;

use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;

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

Route::get('/', [HomeController::class, 'home']); // Home

Route::post('/logout', [LogoutController::class, 'logout']); // Logout Controller

// User Register
Route::view('/chooserole', 'register/chooserole'); // Role Picking UI

/** Student/Applicant Registration */
Route::view('/studentregister', 'register/register'); // Student/Applicant Registration Page UI
Route::post('/registerStudent', [StudentRegisterController::class, 'storeStudent']); // Send the Student/Applicant Registration Data to DB

/** Company Registration */
Route::view('/companyregister', 'register/registercompany'); // Company Registration Page UI
Route::post('/registerCompany', [CompanyRegisterController::class, 'storeCompany']); // Send the Company Registration Data to DB

// User Profile View and Edit (Profile Controllers)
/** User Profile View */
Route::get('/user_profile', [ViewProfileController::class, 'index'] );

/** Profile Edit */
Route::controller(EditProfileController::class)->group(function(){
    Route::get('/profile_edit', 'profileEdit');
    Route::post('/profile_edit', 'profileEditUpdate');
});

// Company Controllers
Route::middleware([IsCompany::class])->group(function(){ // Company Middleware (only Company users can access those endpoints)
    /** Company Dashboard */
    Route::get('/company_dashboard', [CompanyDashboardController::class, 'summary']); // Company

    /** Company Profile */
    Route::get('/company_detail', [CompanyProfileController::class, 'detail']); // Company

    /** Add/Post Internship */
    Route::view('/add_internship', 'company/add_internship', ['active' => 'add_internship']); // Display Add Internship Page/Add Internship UI
    Route::post('/add_internship', [AddInternshipController::class, 'storeInternship']); // Validate and Send the Internship Data to DB

    /** Posted Internship List */
    Route::get('/company_internship', [InternshipListController::class, 'companyInternship']); // Company

    /** Applied Applicants List */
    Route::get('/company_applicants', [InternshipApplicantsController::class, 'companyApplicants']); // Company

    /** Accept/Reject Applicants */
    Route::controller(ApplicationConfirmationController::class)->group(function(){
        Route::get('/internship/{id}/accept', 'accept'); // Company
        Route::get('/internship/{id}/reject', 'reject'); // Company
    });
    Route::get('/editinternship/{id}', [JobController::class, 'edit'] ); /** UNUSED ??? */
    Route::post('/editinternship/{id}', [JobController::class, 'update'] ); /** UNUSED ??? */
    Route::get('/viewapplicantslist/{id}', [ApplicationController::class, 'applicants'] ); /** UNUSED */
});

// Applicant Controllers
/****  InternshipController ****/
Route::controller(InternshipController::class)->group(function(){
    Route::middleware(RedirectIfNotAuthenticated::class)->group(function(){
        Route::get('/list_internship', 'listInternship'); // Applicant /** Available Internship List */
        Route::get('/detail_internship/{id}', 'detailInternship'); // Applicant /** Internship Detail */
        Route::get('/detail_company/{id}', 'detailCompany'); // Applicant /** Company Detail */
    });
});

/** Internship Search (by Position) */
Route::get('/internship/search', [SearchInternshipController::class, 'search']); // Applicant

/** Match Internship by Applicant Skills and Required Skills from the Internship */
Route::get('/internship/matching', [MatchInternshipController::class, 'match']); // Applicant

/** Apply Internship */
Route::controller(ApplyInternshipController::class)->group(function(){
    Route::get('/apply_intern/{id}', 'applyIntern'); // Display the Internship Application Page // Applicant
    Route::post('/apply/{id}', 'applyInternship'); // Send the Internship Application Data to DB // Applicant
});

/** Applied Internship List */
Route::get('/application_history', [ApplicationHistoryController::class, 'applicationHistory'] ); // Applicant

/** Add Work Experience */
Route::view('/profile_edit/experience', 'account/profile_edit_experience', ['active' => 'experience_edit']); // Display the Add Work Experience Page
Route::post('/add_experience', [ExperienceController::class, 'store']); // Send the Experience Data to DB // Applicant

/** Add Educational History */
Route::view('/profile_edit/education', 'account/profile_edit_education', ['active' => 'education_edit']); // Display the Add Educational History Page
Route::post('/add_education', [EducationController::class, 'store']); // Send the Education Data to DB // Applicant

// Admin Controller
Route::middleware([IsAdmin::class])->group(function(){ // Admin Middleware (only Admin can access those endpoints)
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'summary'); // Show Total Posted Internship, Companies, and Applicants
        Route::get('/list_companies', 'listCompanies'); // Show Pending and Accepted Companies
    });
    Route::controller(CompanyConfirmationController::class)->group(function(){
        Route::get('/company/{id}/accept', 'accept'); // Accept Company
        Route::get('/company/{id}/reject', 'destroy'); // Reject Company
    });
});
