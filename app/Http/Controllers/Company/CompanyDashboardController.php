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
        $jobs = job::where('user_id', Auth::id())->count();
        $applicants = application::where('company_id', Auth::id())->count();
        $applicants_accepted = application::where('company_id', Auth::id())->where('status', 'accepted')->count();
        return view('company_dashboard', compact(['jobs', 'applicants', 'applicants_accepted']));
    }
}
