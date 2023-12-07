<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\application;

class ApplicationHistoryController extends Controller
{
    public function application_history()
    {
        $applications = application::where('user_id', Auth::id())->get();
        return view('application_history', compact('applications'));
    }
}
