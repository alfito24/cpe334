<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\application;

class ApplyInternshipController extends Controller
{
    // function to show detail job before apply
    public function applyIntern($id)
    {
        $intern = job::where('job_id', $id)->firstOrFail();
        $user = User::where('user_id', Auth::id())->firstOrFail();
        return view('apply_intern', compact(['intern', 'user']));
    }

    // function to send application internship data
    public function applyInternship(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:2048', // Add validation for cover letter
        ]);

        // Store the CV file
        $cvFileName = time() . '_cv.' . $request->cv->extension();
        $request->cv->storeAs('cvs', $cvFileName, 'public');

        // Store the Cover Letter file
        $coverLetterFileName = time() . '_cover_letter.' . $request->cover_letter->extension();
        $request->cover_letter->storeAs('cover_letters', $coverLetterFileName, 'public');

        // Retrieve job and company user ID
        $job = job::findOrFail($id);
        $companyUserId = $job->user_id;

        // Create an application record
        application::create([
            'user_id' => Auth::id(),
            'job_id' => $id,
            'company_id' => $companyUserId,
            'cv_file_path' => $cvFileName,
            'cover_letter_file_path' => $coverLetterFileName
        ]);

        // Redirect with success message
        return redirect('/list_internship')->with('success', 'Internship application submitted successfully.');
    }
}
