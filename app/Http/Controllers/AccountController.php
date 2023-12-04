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
}
