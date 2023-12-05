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
     public function reject($id)
     {
         $company = User::where('user_id', $id)->first();
         $company->company_review = 'rejected';
         $status = 'rejected';
         $company->save();
         return back()->with('success', 'Company rejected');
     }
}
