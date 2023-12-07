<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CompanyRegisterController extends Controller
{
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
            'email' => 'required|unique:users',
            'address' => 'required',
            'phone_number' => 'required|unique:users',
            'password' => 'required',
            'business_area' => 'required',
            'role_id' => 'required',
            'picture' => 'required|image',
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
