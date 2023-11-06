<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

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
            'area_of_interest' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success', 'Registration was successful! Please Login to your account');
        return redirect('/login')->with('success', 'Registration was successful! Please Login to your account');
    }

    public function storeCompany(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required',
            'company_description' => 'required',
            'company_established' => 'required|date|before:today',
            'email' => 'required|unique:users|email:dns',
            'address' => 'required',
            'phone_number' => 'required|unique:users',
            'password' => 'required',
            'business_area' => 'required',
            'role_id' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg|max:4096',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName(); // Generating a unique name for the file
            $file->move(public_path('data_file'), $filename); // Moving the file to the public/data_file directory
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['picture'] = $filename;
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration was successful! Please Login to your account');
    }
}
