<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\application;

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
        return view('internshiplist', [
            'jobs'=>$jobs,
            'title'=>'View All Internships',
        ]);
    }
    public function match()
    {
        $currentUser = Auth::user(); // Get the currently authenticated user
        $areaOfExpertise = $currentUser->area_of_interest;
        $jobs = job::where('area_of_expertise', 'like', '%'. $areaOfExpertise . '%')->get();
        return view('matchinternship', [
            'jobs'=>$jobs,
            'title'=>'View All Internships that Match your Profile'
        ]);
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
            'area_of_expertise'=>'required',
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = DB::table('jobs')->where('job_id', $id)->first();
        return view('editinternship', compact('job'));
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
        $job = job::find($id);
        if ($job) {
            $job->update([
                'position' => $request->position,
                'description' => $request->description,
                'qualifications' => $request->qualifications,
                'duration' => $request->duration,
                'location' => $request->location,
                'worktype' => $request->worktype,
                'deadline' => $request->deadline,
                'start' => $request->start,
                'area_of_expertise'=>$request->area_of_expertise
            ]);
        }
    
        return redirect('/myinternshiplist');
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
    public function search(Request $request){
        $search = $request->search;
        $keywords = explode(' ', $search);

        $query = job::query();

        foreach ($keywords as $keyword) {
            $query->orWhere('position', 'like', '%' . $keyword . '%');
        }

        $jobs = $query->get();
        return view('searchinternshiplist', [
            'jobs'=>$jobs,
            'title'=>'Search Intern',
            'search'=>$search
        ]);

    }
    public function search2(Request $request){
        $search = $request->search;
        $keywords = explode(' ', $search);
    
        $query = job::where('user_id', Auth::id());
    
        foreach ($keywords as $keyword) {
            $query->orWhere(function($q) use ($keyword) {
                $q->where('position', 'like', '%' . $keyword . '%');
            });
        }
    
        $jobs = $query->get();
        return view('searchinternshiplist', [
            'jobs' => $jobs,
            'title' => 'Search Intern',
            'search' => $search
        ]);
    }
    
}
