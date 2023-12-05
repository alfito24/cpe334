<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\job;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationStatusChanged;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class AdminController extends Controller
{
    public function summary(){
        $jobs = job::all()->count();
        $applicants = application::all()->count();
        $companies = User::where('role_id', 1)->count();
        return view('admin.summary', compact(['jobs', 'applicants', 'companies']));
    }
    public function list_companies(){
        $requested_companies = User::where('company_review', 'under_review')->get();
        $registered_companies = User::where('company_review', 'accepted')->get();
        return view('admin.companies', compact(['requested_companies', 'registered_companies']));
    }
        // function to accept company
        public function accept($id)
        {
            $company = User::where('user_id', $id)->first();
            $company->company_review = 'accepted';
            $status = 'accepted';
            $company->save();
            return back()->with('success', 'Company accepted');
        }
        // function to reject company
        public function reject($id)
        {
            $company = User::where('user_id', $id)->first();
            $company->company_review = 'rejected';
            $status = 'rejected';
            $company->save();
            return back()->with('success', 'Company rejected');
        }
        public function destroy($id)
        {
            $user = User::where('user_id', $id)->first();
            if ($user) {
                $user->delete();
                return redirect('/dashboard')->with('success', 'User deleted successfully.');
            }
            return redirect('/dashboard')->with('error', 'User not found.');
        }
}
