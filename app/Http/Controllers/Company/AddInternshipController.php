<?php

namespace App\Http\Controllers\Company;

use App\Models\job;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddInternshipController extends Controller
{
      // function to show the add internship page
      public function add_internship()
      {
         return view('add_internship');
      }

    // function to store the new internship
    public function storeInternship(Request $request)
    {
        $validatedData = $request->validate([
            'position' => 'required',
            'description' => 'required',
            'internship_type' => 'required',
            'responsibilites' => 'required',
            'skills' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'area_of_expertise' => 'required',
            'deadline' => 'required|date|after_or_equal:today',
            'start' => 'required|date|after_or_equal:today',
        ]);
        $validatedData['user_id'] = Auth::user()->user_id;
        job::create($validatedData);
        return redirect()->back()->with('success', 'Job already posted');
    }
}
