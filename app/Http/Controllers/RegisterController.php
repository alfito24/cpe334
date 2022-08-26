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
        $validatedData=  $request->validate([
             'name' => 'required|max:25',
             'username' =>'required',
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
            $user = DB::table('users')->where('user_id', Auth::id());
            $user ->update([
                'name'=> $request->name,
                'alamat'=>$request->alamat,
                'no_telp'=>$request->no_telp,
                'email'=>$request->email,
            ]);
            $this->validate($request, [
                'file' => 'image|mimes:jpeg,png,jpg|max:4096'
            ]);
            // menyimpan data file yang diupload ke variabel $file
            if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
           // isi dengan nama folder tempat kemana file diupload
            $file->move('data_file',$nama_file);
            }
            $user ->update([
                'picture'=> $nama_file,
            ]);
            return redirect('/myaccount');
        }
}
