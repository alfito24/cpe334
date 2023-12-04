<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    // function to show register page
    public function show()
    {
        return view('register');
    }

    // function to store student's data
    public function storeStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'gender' => 'required',
            'birth_date' => 'required|date|before:today',
            'email' => 'required|unique:users|email:dns',
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
    

    // function to store company's data
    public function storeCompany(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'company' => 'required',
            'company_description' => 'required',
            'company_website' => 'required',
            'company_size' => 'required',
            'company_workdays' => 'required',
            'company_worktype' => 'required',
            'email' => 'required|unique:users|email:dns',
            'address' => 'required',
            'phone_number' => 'required|unique:users',
            'password' => 'required',
            'business_area' => 'required',
            'role_id' => 'required',
            'picture' => 'image',
        ]);
    
        $filename = null;
    
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('data_file'), $filename);
        }
    
        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        // Set default value for company_review
        $validatedData['company_review'] = 'under_review';
    
        // Set filename if picture is uploaded
        $validatedData['picture'] = $filename;
    
        // Create the user with validated data
        User::create($validatedData);
    
        // Redirect with a success message
        return redirect('/login')->with('success', 'Registration was successful! Please Login to your account');
    }
    
}
