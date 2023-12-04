<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\job;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationStatusChanged;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class CompanyController extends Controller
{
    public function summary(){
        $jobs = job::where('user_id', Auth::id())->count();
        $applicants = application::where('company_id', Auth::id())->count();
        $applicants_accepted = application::where('company_id', Auth::id())->where('status', 'accepted')->count();
        return view('company_dashboard', compact(['jobs', 'applicants', 'applicants_accepted']));
    }
    public function detail(){
        session(['redirect_to' => url()->full()]);
        $company = User::where('user_id', Auth::id())->firstOrFail();
        return view('company_detail', compact('company'));
    }
    public function company_applicants(){
        session(['redirect_to' => url()->full()]);
        $applicants = application::where('company_id', Auth::id())->get();
        return view('company_applicants', compact('applicants'));
    }
}
