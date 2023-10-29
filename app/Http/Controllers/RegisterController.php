<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }
    public function store(Request $request){
        if (isset($request->area_of_interest) && is_array($request->area_of_interest)) {
            $area_of_interest = implode(',', $request->area_of_interest);
        } else {
            $area_of_interest = $request->area_of_interest;
        }
        $insert = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'company' => $request->company,
            'company_description' => $request->company_description,
            'company_established' => $request->company_established,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'education' => $request->education,
            'role_id' => $request->role_id,
            'area_of_interest' => $area_of_interest,
        ]);
        $request->session()->flash('success', 'Registration was successful! Please Login to your account');
        return redirect('/login');
        // try {
        //     $validatedData = $request->validate([
        //         'name' => 'required',
        //         'username' => 'required',
        //         'email' => 'required|unique:users',
        //         'address' => 'required',
        //         'phone_number' => 'required',
        //         'password' => 'required',
        //         'education' => 'required',
        //         'role_id' => 'required',
        //         'area_of_interest' => 'required|array',
        //         // 'company' => '',
        //     ]);
            
        //     $validatedData['password'] = Hash::make($validatedData['password']);
            
        //     if(isset($validatedData['area_of_interest'])) {
        //         $validatedData['area_of_interest'] = implode(',', $validatedData['area_of_interest']);
        //     }

        //     User::create($validatedData);
    
        //     $request->session()->flash('success', 'Registration was successful! Please Login to your account');
        //     return redirect('/login');
        // } catch (\Exception $e) {
        //     \Log::error('Registration failed: ' . $e->getMessage());
        //     $request->session()->flash('error', $e->getMessage());
        //     return redirect()->back()->withInput();
        // }
    }
    
        public function account(){
            $profil = DB::table('users')->where('user_id', Auth::id())->first();
            $transactions = Transaction::where('user_id', '=', Auth::id())->get();
            return view('account', compact('profil', 'transactions'));
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
                'area_of_interest' => $area_of_interest,
            ]);

            if ($request->hasFile('file')) {
                $this->validate($request, [
                    'file' => 'image|mimes:jpeg,png,jpg|max:4096'
                ]);

                $file = $request->file('file');
                $picture = $file->getClientOriginalName();
                $file->move('data_file', $picture);

                // Update 'picture' only if file is uploaded
                $user->update(['picture' => $picture]);
            }

            return redirect('/myaccount');
                }
}
