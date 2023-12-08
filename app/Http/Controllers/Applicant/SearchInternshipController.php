<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\job;

class SearchInternshipController extends Controller
{
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
        return view('applicant/search_list', [
            'jobs' => $jobs,
            'title' => 'Search Intern',
            'search' => $search
        ]);
    }
}
