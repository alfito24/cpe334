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
        $active = 'company_applicants';
        $applicants = application::where('company_id', Auth::id())->get();
        $pending_applicants = application::where('status', 'submitted')->get();
        $accepted_applicants = application::where('status', 'accepted')->get();

        return view('company/company_applicants', compact('active', 'pending_applicants', 'accepted_applicants'));
    }
}
