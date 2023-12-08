<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // function to authenticate the user
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([ // validate the email and password
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the user came from a specific page. Only redirect if the logged in user role is applicant (role_id = 0)
            if (session()->has('redirect_to') && Auth::user()->role_id === 0) {
                $redirectTo = session('redirect_to');
                session()->forget('redirect_to'); // Clear the session value

                return redirect()->to($redirectTo);
            }

            // Default redirect
            if (Auth::user()->role_id === 2) {
                return redirect('/dashboard'); // Change to the admin dashboard route (role id 2)
            } elseif (Auth::user()->role_id === 1) {
                return redirect('/company_dashboard'); // Login as the company (role id 1)
            } else {
                return redirect('/'); // Login as the company/applicant
            }

            return redirect('/');
        }

        return back()->with('loginError', 'Invalid Email or Password');
    }
}
