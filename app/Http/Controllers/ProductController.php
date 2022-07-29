<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // public function storeproduct(Request $request){
    //     $product = new Product();
    //     $product->user_id = Auth::id();
    //     $product->judul = $request->nama_produk;
    //     $product->deskripsi = $request->deskripsi_produk;
    //     $product->stock = $request->stock_produk;
    //     $product->shipping_point = $request->shipping_point;
    //     $product->bahan_product = $request->bahan_produk;
    //     $product->save();

    //     return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    // }
    public function storeProduct(Request $request){
        $this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:4096'
		]);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
       // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        DB::table('products')->insert([
            'user_id'=>1,
            'judul' => $request->nama_produk,
            'deskripsi' => $request->deskripsi_produk,
            'harga' => $request->harga_produk,
            'stock' => $request->stock_produk,
            'shipping_point' => $request->shipping_point,
            'bahan_produk' =>  $request->bahan_produk,
            'gambar' => $nama_file
        ]);
        $request->session()->flash('success', 'Produk Anda berhasil ditambahkan');
        // return redirect('/daftarproduk/'.{{Auth::user()->mitra_id}});
        return redirect('/dashboard/daftarproduk');
    }
}
