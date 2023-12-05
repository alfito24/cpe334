<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationStatusChanged;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

class CompanyConfirmationController extends Controller
{
    // function to accept company
    public function accept($id)
    {
        $company = User::where('user_id', $id)->first();
        $company->company_review = 'accepted';
        $status = 'accepted';
        $company->save();
        return back()->with('success', 'Company accepted');
    }

    // function to reject company
    public function destroy($id)
    {
        $user = User::where('user_id', $id)->first();
        if ($user) {
            $user->delete();
            return redirect('/dashboard')->with('success', 'User deleted successfully.');
        }
        return redirect('/dashboard')->with('error', 'User not found.');
    }
}
