<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\application;

class InternshipApplicantsController extends Controller
{
    public function companyApplicants()
    {
        session(['redirect_to' => url()->full()]);
        $applicants = application::where('company_id', Auth::id())->get();
        return view('company_applicants', compact('applicants'));
    }
}
