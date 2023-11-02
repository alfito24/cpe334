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
    public function show(){
        return view('register');
    }
    public function store(Request $request){
        // $area_of_interest = null;
        // if ($request->has('area_of_interest')) {
        //     $area_of_interest = implode(',', $request->area_of_interest);
        // }
        if ($request->hasFile('file')) {
            $this->validate($request, [
                'file' => 'image|mimes:jpeg,png,jpg|max:4096'
            ]);

            $file = $request->file('file');
            $picture = $file->getClientOriginalName();
            $file->move('data_file', $picture);
        } else {
            $picture = null; 
        }
        $insert = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'company' => $request->company,
            'company_description' => $request->company_description,
            'company_established' => $request->company_established,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'education' => $request->education,
            'role_id' => $request->role_id,
            'area_of_interest' => $request->area_of_interest,
            'picture'=> $picture
        ]);
        $request->session()->flash('success', 'Registration was successful! Please Login to your account');
        return redirect('/login');
    }
    
        public function account(){
            $profil = DB::table('users')->where('user_id', Auth::id())->first();
            $applications = application::where('user_id', '=', Auth::id())->get();
            return view('account', compact('profil', 'applications'));
        }
        public function updateaccount(){
            $profil = DB::table('users')->where('user_id', Auth::id())->first();
            $userInterests = explode(',', $profil->area_of_interest);
            return view('updateprofile', [
                'profil'=>$profil,
                'userInterests'=>$userInterests
            ]);
        }
        public function updateprofile(Request $request){
            $user = DB::table('users')->where('user_id', Auth::id());
            $area_of_interest = implode(',', $request->input('area_of_interest'));

            $user->update([
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'education' => $request->education,
                'company' => $request->company,
                'company_established' => $request->company_established,
                'area_of_interest' => $area_of_interest,
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
