<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CompanyProfileController extends Controller
{
    public function detail()
    {
        session(['redirect_to' => url()->full()]);
        $company = User::where('user_id', Auth::id())->firstOrFail();
        return view('company_detail', compact('company'));
    }
}