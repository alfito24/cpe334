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
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['picture'] = $filename;
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration was successful! Please Login to your account');
    }
}
