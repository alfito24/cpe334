<?php

namespace App\Http\Controllers;

use App\Models\job;

class HomeController extends Controller
{
    // function to display available internships
    public function home()
    {
        $jobs = job::take(6)->get();
        $it_jobs_count = job::where('area_of_expertise', 'IT')->count();
        $marketing_jobs_count = job::where('area_of_expertise', 'Marketing')->count();
        $finance_jobs_count = job::where('area_of_expertise', 'Finance')->count();
        $sales_jobs_count = job::where('area_of_expertise', 'Sales')->count();
        return view('home_new', compact('jobs', 'it_jobs_count', 'marketing_jobs_count', 'sales_jobs_count', 'finance_jobs_count'));
    }
}
