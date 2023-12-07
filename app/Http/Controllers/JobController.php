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


}
