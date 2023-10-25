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
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|unique:users',
                'address' => 'required',
                'phone_number' => 'required',
                'password' => 'required'
            ]);
    
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData);
    
            $request->session()->flash('success', 'Registration was successful! Please Login to your account');
            return redirect('/login');
        } catch (\Exception $e) {

            \Log::error('Registration failed: ' . $e->getMessage());
    

            $request->session()->flash('error', $e->getMessage());

            return redirect()->back()->withInput();
        }
    }    
    // public function store(Request $request){
    //     $validatedData=  $request->validate([
    //          'name' => 'required',
    //          'username' =>'required',
    //          'email' => 'required|unique:users',
    //          'address'=>'required',
    //          'phone_number'=>'required',
    //          'password' => 'required'
    //      ]);

    //      $validatedData['password'] = Hash::make($validatedData['password']);

    //      User::create($validatedData);

    //      $request->session()->flash('success', 'Registration was successful! Please Login to your account');
    //      return redirect('/login');
    //     }
        public function account(){
            $profil = DB::table('users')->where('user_id', Auth::id())->first();
            $transactions = Transaction::where('user_id', '=', Auth::id())->get();
            return view('account', compact('profil', 'transactions'));
        }
        public function updateaccount(){
            $profil = DB::table('users')->where('user_id', Auth::id())->first();
            return view('updateprofile', [
                'profil'=>$profil
            ]);
        }
        public function updateprofile(Request $request){
            // $user = DB::table('users')->where('user_id', Auth::id());
            // $user ->update([
            //     'address'=>$request->address,
            //     'phone_number'=>$request->phone_number,
            //     'email'=>$request->email,
            //     'gender'=>$request->gender,
            //     'birth_date'=>$request->birth_date,
            // ]);
            // $this->validate($request, [
            //     'file' => 'image|mimes:jpeg,png,jpg|max:4096'
            // ]);
            // if ($request->hasFile('file')) {
            // $file = $request->file('file');
            // $picture = $file->getClientOriginalName();
            // $file->move('data_file',$picture);
            // }
            // $user ->update([
            //     'picture'=> $picture,
            // ]);
            // return redirect('/myaccount');
            $user = DB::table('users')->where('user_id', Auth::id());

            $user->update([
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
            ]);

            // Validate file if it's present
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
