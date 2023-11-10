<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\application;
use App\Models\job;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $workExperiences = $user->experiences;
        $educations = $user->educations;
        $jobs = job::take(2)->get();
        return view('user_profile', compact('user', 'jobs', 'workExperiences', 'educations'));
    }
    public function profile_edit()
    {
            $user = User::find(Auth::id());
            // $skills = $user->skills ? array_map('trim', explode(',', $user->skills)) : [];
            return view('profile_edit', compact('user'));
    
    }
    public function profile_edit_update(Request $request)
    {
        // First, validate all incoming data.
        $this->validate($request, [
            'name' => 'required', // assuming you require the name
            'about_me' => 'nullable', // assuming this is optional
            'skills' => 'nullable', // assuming this is optional
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:4096' // validate only if present
        ]);
    
        // Find the authenticated user.
        $user = User::find(Auth::id());
    
        // Prepare the data for update.
        $dataToUpdate = [
            'name' => $request->name,
            'about_me' => $request->about_me,
            'skills' => $request->skills,
        ];
    
        // Check if a picture file is present in the request.
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $picture = $file->getClientOriginalName();
            // Move the file to your desired location and set the 'picture' field for update.
            $file->move('data_file', $picture);
    
            // Add the picture to the array of data to update.
            $dataToUpdate['picture'] = $picture;
        }
    
        // Update the user in one go.
        $user->update($dataToUpdate);
    
        // Redirect back with a success message.
        return back()->with('success', 'Profile updated successfully.');
    }
    
    public function account()
    {
        $profil = DB::table('users')->where('user_id', Auth::id())->first();
        $applications = application::where('user_id', '=', Auth::id())->get();
        return view('account', compact('profil', 'applications'));
    }

    public function updateaccount()
    {
        $profil = DB::table('users')->where('user_id', Auth::id())->first();
        $userInterests = explode(',', $profil->area_of_interest);
        return view('updateprofile', [
            'profil' => $profil,
            'userInterests' => $userInterests
        ]);
    }

    public function updateprofile(Request $request)
    {
        $user = DB::table('users')->where('user_id', Auth::id());
        // $area_of_interest = implode(', ', $request->input('area_of_interest'));

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'education' => $request->education,
            'company' => $request->company,
            'company_established' => $request->company_established,
        ]);

        if ($request->hasFile('file')) {
            $this->validate($request, [
                'file' => 'image|mimes:jpeg,png,jpg|max:4096'
            ]);

            $file = $request->file('file');
            $picture = $file->getClientOriginalName();
            $file->move('data_file', $picture);

            $user->update(['picture' => $picture]);
        }

        return redirect('/myaccount');
    }
}
