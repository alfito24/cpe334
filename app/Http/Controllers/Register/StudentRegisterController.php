<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StudentRegisterController extends Controller
{
    // function to store student's data
    public function storeStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'gender' => 'required',
            'birth_date' => 'required|date|before:today',
            'email' => 'required|unique:users',
            'address' => 'required',
            'phone_number' => 'required|unique:users',
            'password' => 'required',
            'education' => 'required',
            'role_id' => 'required',
            'skills' => 'required',
            'about_me' => 'required',
            'job_dream' => 'required',
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Add company_review column with default value
        $validatedData['company_review'] = 'not_company';

        // Create the user with validated data
        User::create($validatedData);

        // Redirect with a success message
        return redirect('/login')->with('success', 'Account created successfully.');
    }
}
