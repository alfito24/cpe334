<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = job::where('user_id', Auth::id())->get();
        return view('internshiplist', compact('jobs'));
    }
    public function indexall()
    {
        $jobs = job::all();
        return view('internshiplist', compact('jobs'));
    }
    public function detail($id)
    {
        $job = job::where('job_id', $id)->first();
        return view('internshipdetail', compact('job'));
    }
    public function apply($id)
    {
        $job = job::where('job_id', $id)->first();
        return view('apply', compact('job'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'position' => 'required',
            'description' => 'required',
            'qualifications' => 'required',
            'duration' => 'required',
            'location' => 'required',
            'worktype' => 'required',
            'deadline' => 'required|date|after_or_equal:today',
            'start' => 'required|date|after_or_equal:today',
        ]);
        $validatedData['user_id'] = Auth::user()->user_id;
        job::create($validatedData);
        return redirect()->back()->with('success', 'Job already posted');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = DB::table('job')->where('job_id', $id)->first();
        return view('editjob', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = DB::table('job')->where('job_id', Auth::id())->first();
        $insert = job::update([
            'position' => $request->position,
            'description' => $request->description,
            'qualifications' => $request->qualifications,
            'duration' => $request->duration,
            'location' => $request->location,
            'worktype' => $request->worktype,
        ]);
        return redirect('/addinternship');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('job')->where('job_id', $id)->delete();
        return redirect('/addinternship');
    }
}
