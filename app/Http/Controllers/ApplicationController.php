<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\application;
use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationStatusChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applicants($id){
        $applications = application::where('job_id', '=', $id)->where('status', '=', 'submitted')->get();
        return view('viewapplicantslist', compact('applications'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */





}
