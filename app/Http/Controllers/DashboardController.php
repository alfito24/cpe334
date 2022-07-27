<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //dashboard
    public function index(){
        return view('dashboard.utama');
    }

    //halaman tambah produk
    public function tambah(){
        return view('dashboard.tambahproduk');
    }
}
