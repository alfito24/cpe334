<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\job;
use App\Models\application;

use Illuminate\Support\Facades\Auth;

class CompanyDashboardController extends Controller
{
    public function summary()
    {
        $active = 'dashboard';
        $jobs = job::where('user_id', Auth::id())->count();
        $applicants = application::where('company_id', Auth::id())->count();
        $applicants_accepted = application::where('company_id', Auth::id())->where('status', 'accepted')->count();

        return view('company/company_dashboard', compact(['active', 'jobs', 'applicants', 'applicants_accepted']));
    }
}
