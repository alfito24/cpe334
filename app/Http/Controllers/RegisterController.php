<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }
    public function store(Request $request){
        $validatedData=  $request->validate([
             'name' => 'required|max:25',
             'username'=>'required',
             'email' => 'required|email:dns|unique:users',
             'alamat'=>'required',
             'no_telp'=>'required',
             'password' => 'required|min:8|max:20'
         ]);
         $validatedData['password'] = Hash::make($validatedData['password']);
         User::create($validatedData);
         $request->session()->flash('success', 'Registration was successful! Please Login to your account');
         return redirect('/login');
        }
}
