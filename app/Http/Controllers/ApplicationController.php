<?php

namespace App\Http\Controllers;

use App\Models\application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationStatusChanged;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function applicants($id){
        $applications = application::where('job_id', '=', $id)->where('status', '=', 'submitted')->get();
        return view('viewapplicantslist', compact('applications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $fileName = time().'.'.$request->cv->extension();  
        $request->cv->storeAs('cvs', $fileName, 'public');

        application::create([
            'cv_file_path'=>$fileName,
            'notes'=>$request->notes,
            'user_id'=>Auth::id(),
            'job_id'=>$id
        ]);
        return redirect('/')->with('success', 'Internship already applied');
    }
    public function apply_internship(Request $request, $id)
    {
        application::create([
            'user_id'=>Auth::id(),
            'job_id'=>$id
        ]);
        return back()->with('success', 'Internship already applied');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $application = application::where('user_id', $id)->first();
        $application->status = 'accepted';
        $status = 'accepted';
        $email_data = ['subject' => 'Internship Selection Announcement'];
        $application->save();
        Mail::to($application->user->email)->send(new ApplicationStatusChanged($application, $status, $email_data));
        return back();
    }
    public function reject($id)
    {
        $application = application::where('user_id', $id)->first();
        $application->status = 'rejected';
        $status = 'rejected';
        $email_data = ['subject' => 'Internship Selection Announcement'];
        $application->save();
        Mail::to($application->user->email)->send(new ApplicationStatusChanged($application, $status, $email_data));

        return back();
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(application $application)
    {
        //
    }

}
