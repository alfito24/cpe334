<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //dashboard
    public function index(){
        $products = Product::where('user_id', Auth::id())->get(); //ngambil produk yang diupload user


        return view('dashboard.utama', compact('products'));
    }

    //halaman tambah produk
    public function tambah(){
        return view('dashboard.tambahproduk');
    }
    public function show(){
        $products = Product::where('user_id', Auth::id())->get();

        return view('dashboard.daftarproduk', compact('products'));
    }
    public function showEdit($id){
        $products = DB::table('products')->where('product_id', $id)->first();
        return view('dashboard.editproduk', compact('products'));
    }

}
