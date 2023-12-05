<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\application;
use App\Models\job;
use App\Models\User;

class DashboardController extends Controller
{
    public function summary()
    {
        $jobs = job::all()->count();
        $applicants = application::all()->count();
        $companies = User::where('role_id', 1)->count();
        return view('admin.summary', compact(['jobs', 'applicants', 'companies']));
    }

    public function list_companies()
    {
        $requested_companies = User::where('company_review', 'under_review')->get();
        $registered_companies = User::where('company_review', 'accepted')->get();
        return view('admin.companies', compact(['requested_companies', 'registered_companies']));
    }
}
