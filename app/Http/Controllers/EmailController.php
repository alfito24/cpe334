<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatusChanged;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(){
        Mail::to('zaenal15103@gmail.com')->send(new ApplicationStatusChanged());
        return redirect('/');
    }
}
