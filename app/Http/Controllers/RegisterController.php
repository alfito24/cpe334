<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\application;

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
            'username' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'education' => 'required',
            'role_id' => 'required',
            'area_of_interest' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        $request->session()->flash('success', 'Registration was successful! Please Login to your account');
        return redirect('/login');
    }

    public function storeCompany(Request $request)
    {
        // $area_of_interest = null;
        // if ($request->has('area_of_interest')) {
        //     $area_of_interest = implode(',', $request->area_of_interest);
        // }
        $validatedData = $request->validate([
            // 'username' => 'required',
            'company' => 'required',
            'company_description' => 'required',
            'company_established' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
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
        $request->session()->flash('success', 'Registration was successful! Please Login to your account');
        return redirect('/login');
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
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'education' => $request->education,
            'company' => $request->company,
            'company_established' => $request->company_established,
            // 'area_of_interest' => $area_of_interest,
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
