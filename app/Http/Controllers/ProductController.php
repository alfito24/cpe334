<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function storeproduct(Request $request){
        $product = new Product();
        $product->user_id = Auth::id();
        $product->judul = $request->nama_produk;
        $product->deskripsi = $request->deskripsi_produk;
        $product->stock = $request->stock_produk;
        $product->shipping_point = $request->shipping_point;
        $product->bahan_product = $request->bahan_produk;
        $product->save();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }
}
