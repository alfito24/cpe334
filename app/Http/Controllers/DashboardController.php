<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.utama');
    }
    public function tambah(){
        return view('dashboard.tambahproduk');
    }
}
