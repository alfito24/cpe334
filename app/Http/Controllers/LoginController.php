<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // function to show login page
    public function show()
    {
        return view('login');
    }
    
    // function to authenticate the user
    public function authenticate(Request $request)
    {
    $credentials = $request->validate([ // validate the email and password
        'email' => 'required|email:dns',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Check if the user came from a specific page
        if (session()->has('redirect_to')) {
            $redirectTo = session('redirect_to');
            session()->forget('redirect_to'); // Clear the session value

            return redirect()->to($redirectTo);
        }

        // Default redirect
        if (Auth::user()->role_id === 2) {
            return redirect('/dashboard');
        }
        else{
            return redirect('/'); // Change to the admin dashboard route
        }
        // elseif (Auth::user()->role_id === 1) {
        //     return redirect('/'); // Change to the admin dashboard route
        // }

        return redirect('/');
    }

    return back()->with('loginError', 'Login Failed');
}
    // function to logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
