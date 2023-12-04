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
    // function to display available internships
    public function home()
    {
        $jobs = job::take(6)->get();
        $it_jobs_count = job::where('area_of_expertise', 'IT')->count();
        $marketing_jobs_count = job::where('area_of_expertise', 'Marketing')->count();
        $finance_jobs_count = job::where('area_of_expertise', 'Finance')->count();
        $sales_jobs_count = job::where('area_of_expertise', 'Sales')->count();
        return view('home_new', compact('jobs', 'it_jobs_count', 'marketing_jobs_count', 'sales_jobs_count', 'finance_jobs_count'));
    }
    // function to display 1 internship information
    public function list_internship()
    {
        session(['redirect_to' => url()->full()]);
        $job = Job::inRandomOrder()->first();
        $jobs = Job::all();
        return view('list_internship', compact('jobs', 'job'));
    }
    // function to show the detail of the internship
    public function detail_internship($id)
    {
        session(['redirect_to' => url()->full()]);
        $application = application::where('job_id', $id)->where('user_id',  Auth::id())->first();
        $job = job::where('job_id', $id)->firstOrFail();
        $interns = job::all();
        return view('detail_internship', compact('job', 'interns', 'application'));
    }
    // function to display the internship that posted by authenticated company
    public function company_internship()
    {
        $jobs = job::where('user_id', Auth::id())->get();
        return view('company_internship', compact('jobs'));
    }
    // function to display the detail of the company
    public function detail_company($id)
    {
        session(['redirect_to' => url()->full()]);
        $company = User::where('user_id', $id)->firstOrFail();
        $interns = job::where('user_id', $id)->take(3)->get();
        return view('detail_company', compact('company', 'interns'));
    }
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

        return view('internship_matching', [
            'jobs' => $jobs,
            'title' => 'View All Internships that Match your Profile'
        ]);
        } else {
        return redirect('/login');
        }
    }

    public function apply($id)
    {
        $job = job::where('job_id', $id)->first();
        return view('apply', compact('job'));
    }
    // function to store the new internship
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
     // function to store the new internship
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
    // function to display the edit internship page
    public function edit($id)
    {
        $job = DB::table('jobs')->where('job_id', $id)->first();
        return view('editinternship', compact('job'));
    }
    // function to update the information of the internship
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
    // function to delete the internship
    public function destroy($id)
    {
        DB::table('job')->where('job_id', $id)->delete();
        return redirect('/addinternship');
    }
    // function to search internship by keywords
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
    // function to search internship by keywords
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
    // function to show detail job before apply
    public function apply_intern($id)
    {
        $intern = job::where('job_id', $id)->firstOrFail();
        $user = User::where('user_id', Auth::id())->firstOrFail();
        return view('apply_intern', compact(['intern', 'user']));
    }
}
