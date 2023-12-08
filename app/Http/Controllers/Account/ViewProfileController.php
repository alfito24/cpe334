<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\job;
use App\Models\User;

class ViewProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $workExperiences = $user->experiences;
        $educations = $user->educations;

        return view('account/user_profile', compact('user', 'workExperiences', 'educations'));
    }
}
