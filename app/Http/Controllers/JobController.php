<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\User;
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
    public function home()
    {
        $jobs = job::take(6)->get();
        $it_jobs_count = job::where('area_of_expertise', 'IT')->count();
        $marketing_jobs_count = job::where('area_of_expertise', 'Marketing')->count();
        $finance_jobs_count = job::where('area_of_expertise', 'Finance')->count();
        $sales_jobs_count = job::where('area_of_expertise', 'Sales')->count();
        return view('home_new', compact('jobs', 'it_jobs_count', 'marketing_jobs_count', 'sales_jobs_count', 'finance_jobs_count'));
    }
    public function list_internship()
    {
        $job = Job::inRandomOrder()->first();
        $jobs = job::all();
        return view('list_internship', compact('jobs', 'job'));
    }
    public function detail_internship($id)
    {
        $application = application::where('job_id', $id)->where('user_id',  Auth::id())->first();
        $job = job::where('job_id', $id)->firstOrFail();
        $interns = job::all();
        return view('detail_internship', compact('job', 'interns', 'application'));
    }
    public function company_internship()
    {
        $jobs = job::where('user_id', Auth::id())->get();
        return view('company_internship', compact('jobs'));
    }
    public function detail_company($id)
    {
        $company = User::where('user_id', $id)->firstOrFail();
        $interns = job::where('user_id', $id)->take(3)->get();
        return view('detail_company', compact('company', 'interns'));
    }
    public function index()
    {
        $jobs = job::where('user_id', Auth::id())->get();
        return view('internshiplist', compact('jobs'));
    }
    public function indexall()
    {
        $jobs = job::all();
        return view('internshiplist', [
            'jobs' => $jobs,
            'title' => 'View All Internships',
        ]);
    }
    // public function match()
    // {
    //     $currentUser = Auth::user();
    //     if ($currentUser) {
    //         $skills = $currentUser->skills;
    //         $jobs = job::where('skills', 'like', '%' . $skills . '%')->get();
    //         return view('internship_matching', [
    //             'jobs' => $jobs,
    //             'title' => 'View All Internships that Match your Profile'
    //         ]);
    //     }
    //     else{
    //         return redirect('/login');
    //     }
    // }
    public function match()
{
    $currentUser = Auth::user();
    if ($currentUser) {
        $skills = $currentUser->skills;

        // Hapus spasi berlebih dan pecah menjadi array
        $skillsArray = preg_split('/\s+/', $skills, -1, PREG_SPLIT_NO_EMPTY);

        // Buat query untuk mencari pekerjaan yang memiliki setidaknya satu keterampilan yang cocok
        $jobs = job::where(function ($query) use ($skillsArray) {
            foreach ($skillsArray as $skill) {
                $query->orWhere('skills', 'like', '%' . $skill . '%');
            }
        })->get();

        return view('internship_matching', [
            'jobs' => $jobs,
            'title' => 'View All Internships that Match your Profile'
        ]);
    } else {
        return redirect('/login');
    }
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
            'internship_type' => 'required',
            'responsibilites' => 'required',
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
    public function add_internship(Request $request)
    {
        $validatedData = $request->validate([
            'position' => 'required',
            'location' => 'required',
            'internship_type' => 'required',
            'salary' => 'nullable',
            'description' => 'required',
            'location' => 'required',
            'area_of_expertise' => 'required',
            'skills' => 'required',
            'responsibilites' => 'required',
            'deadline' => 'required',
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
                'area_of_expertise' => $request->area_of_expertise
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
    public function search(Request $request)
    {
        $search = $request->search;
        $keywords = explode(' ', $search);

        $query = job::query();

        foreach ($keywords as $keyword) {
            $query->orWhere('position', 'like', '%' . $keyword . '%');
        }

        $jobs = $query->get();
        return view('search_list', [
            'jobs' => $jobs,
            'title' => 'Search Intern',
            'search' => $search
        ]);
    }
    public function search2(Request $request)
    {
        $search = $request->search;
        $keywords = explode(' ', $search);

        $query = job::where('user_id', Auth::id());

        foreach ($keywords as $keyword) {
            $query->orWhere(function ($q) use ($keyword) {
                $q->where('position', 'like', '%' . $keyword . '%');
            });
        }

        $jobs = $query->get();
        return view('searchinternshiplist', [
            'jobs' => $jobs,
            'title' => 'the Result for '.$search.' Position'
        ]);
    }
}
