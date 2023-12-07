<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\application;
use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationStatusChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applicants($id){
        $applications = application::where('job_id', '=', $id)->where('status', '=', 'submitted')->get();
        return view('viewapplicantslist', compact('applications'));
    }
    public function apply_internship(Request $request, $id)
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */

    public function application_history()
    {
        $applications = application::where('user_id', Auth::id())->get();
        return view('application_history', compact('applications'));
    }



}
