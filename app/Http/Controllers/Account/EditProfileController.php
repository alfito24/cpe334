<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EditProfileController extends Controller
{
    public function profileEdit()
    {
            $user = User::find(Auth::id());

            return view('account/profile_edit', compact('user'));
    }

    public function profileEditUpdate(Request $request)
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
