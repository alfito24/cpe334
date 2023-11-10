<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function index()
    {
        $user = User::findOrFail($Auth::id());
        $workExperiences = $user->experiences;
        return view('work_experiences.index', compact('workExperiences'));
    }

public function store(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'company' => 'required',
            'location' => 'required',
            'description' => 'required',
            'start_year' => 'required|digits:4',
            'end_year' => 'nullable|digits:4',
        ]);

        $user = User::findOrFail(Auth::id());
        $user->experiences()->create($request->all());

        return back()->with('success', 'Work experience added successfully.');
    }
}
