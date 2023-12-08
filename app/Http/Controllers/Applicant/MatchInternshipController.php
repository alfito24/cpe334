<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\application;

class MatchInternshipController extends Controller
{
    // function to display internship that matched with the user
    public function match()
    {
    session(['redirect_to' => url()->full()]);
    $currentUser = Auth::user();
    if ($currentUser) {
        $skills = $currentUser->skills;

        $skillsArray = preg_split('/\s+/', $skills, -1, PREG_SPLIT_NO_EMPTY);

        $jobs = job::where(function ($query) use ($skillsArray) {
            foreach ($skillsArray as $skill) {
                $query->orWhere('skills', 'like', '%' . $skill . '%');
            }
        })->get();

        return view('applicant/internship_matching', [
            'jobs' => $jobs,
            'title' => 'View All Internships that Match your Profile'
        ]);
        } else {
        return redirect('/login');
        }
    }
}
