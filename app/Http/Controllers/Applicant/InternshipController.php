<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\job;
use App\Models\User;
use App\Models\application;

class InternshipController extends Controller
{
    // function to display 1 internship information
    public function list_internship()
    {
        session(['redirect_to' => url()->full()]);
        $job = Job::inRandomOrder()->first();
        $jobs = Job::all();
        return view('list_internship', compact('jobs', 'job'));
    }

    // function to show the detail of the internship
    public function detail_internship($id)
    {
        session(['redirect_to' => url()->full()]);
        $application = application::where('job_id', $id)->where('user_id',  Auth::id())->first();
        $job = job::where('job_id', $id)->firstOrFail();
        $interns = job::all();
        return view('detail_internship', compact('job', 'interns', 'application'));
    }

    // function to display the detail of the company
    public function detail_company($id)
    {
        session(['redirect_to' => url()->full()]);
        $company = User::where('user_id', $id)->firstOrFail();
        $interns = job::where('user_id', $id)->take(3)->get();
        return view('detail_company', compact('company', 'interns'));
    }
}
