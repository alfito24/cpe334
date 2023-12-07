<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

use App\Models\application;

use App\Mail\ApplicationStatusChanged;
use Illuminate\Support\Facades\Mail;


class ApplicationConfirmationController extends Controller
{
    // function to accept applicants including send email to them
    public function accept($id)
    {
        $application = application::where('user_id', $id)->first();
        $application->status = 'accepted';
        $status = 'accepted';
        $email_data = ['subject' => 'Internship Selection Announcement'];
        $application->save();
        Mail::to($application->user->email)->send(new ApplicationStatusChanged($application, $status, $email_data));
        return back()->with('success', 'Applicant accepted');
    }
    // function to reject applicants including send email to them
    public function reject($id)
    {
        $application = application::where('user_id', $id)->first();
        $application->status = 'rejected';
        $status = 'rejected';
        $email_data = ['subject' => 'Internship Selection Announcement'];
        $application->save();
        Mail::to($application->user->email)->send(new ApplicationStatusChanged($application, $status, $email_data));

        return back()->with('failed', 'Applicant rejected');
    }
}
