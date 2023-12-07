<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $educations = $user->educations;
        return view('work_experiences.index', compact('educations'));
    }

public function store(Request $request)
    {
        $request->validate([
            'school_name' => 'required',
            'major' => 'required',
            'degree' => 'required',
            'start_year' => 'required|digits:4',
            'end_year' => 'nullable|digits:4',
        ]);

        $user = User::findOrFail(Auth::id());
        $user->educations()->create($request->all());

        return back()->with('success', 'Education added successfully.');
    }
}
