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
    public function showbuyproducts(){
        return view('buyproducts.buy');
    }

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
        $insert = Product::create([
            'user_id'=> Auth::user()->user_id,
            'judul' => $request->nama_produk,
            'deskripsi' => $request->deskripsi_produk,
            'harga' => $request->harga_produk,
            'stock' => $request->stock_produk,
            'shipping_point' => $request->shipping_point,
            'bahan_produk' =>  $request->bahan_produk,
            'gambar' => $nama_file
        ]);
        // DB::table('products')->insert([
        //     'user_id'=>1,
        //     'judul' => $request->nama_produk,
        //     'deskripsi' => $request->deskripsi_produk,
        //     'harga' => $request->harga_produk,
        //     'stock' => $request->stock_produk,
        //     'shipping_point' => $request->shipping_point,
        //     'bahan_produk' =>  $request->bahan_produk,
        //     'gambar' => $nama_file
        // ]);
        if($insert) {
            return redirect('/dashboard/daftarproduk');
        } else {
            return 'error, terjadi kesalahan';
        }
        // $request->session()->flash('success', 'Produk Anda berhasil ditambahkan');
    }
    public function hapus($id){
        DB::table('products')->where('product_id', $id)->delete();
        return redirect('/dashboard/daftarproduk');
    }
    public function updateProduct(Request $request, $id){
        $products = DB::table('products')->where('product_id', $id);
        $products->update([
            'judul' => $request->nama_produk,
            'deskripsi' => $request->deskripsi_produk,
            'harga' => $request->harga_produk,
            'stock' => $request->stock_produk,
            'shipping_point' => $request->shipping_point,
            'bahan_produk' =>  $request->bahan_produk
        ]);
        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg|max:4096'
        ]);
        // menyimpan data file yang diupload ke variabel $file
        if ($request->hasFile('file')) {
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
       // isi dengan nama folder tempat kemana file diupload
        $file->move('data_file',$nama_file);
        $products->update([
                'gambar' => $nama_file,
        ]);
    }
        return redirect('/dashboard/daftarproduk');
    }
}
