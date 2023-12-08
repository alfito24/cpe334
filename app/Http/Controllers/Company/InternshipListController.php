<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\job;
use Illuminate\Support\Facades\Auth;

class InternshipListController extends Controller
{
    // function to display the internship that posted by authenticated company
    public function companyInternship()
    {
        $jobs = job::where('user_id', Auth::id())->get();
        return view('company/company_internship', compact('jobs'));
    }
}
