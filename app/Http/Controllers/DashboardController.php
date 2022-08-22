<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //dashboard
    public function index(){
        $pickupOrder = Transaction::all();
        return view('dashboard.utama', compact('pickupOrder'));
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
    public function detailOrder(){
        $orders = DB::table('pickups')
        ->join('transactions', 'transactions.transaction_id', '=', 'pickups.transaction_id')->get();
        return view('dashboard.detailorder', compact('orders'));
    }

}
