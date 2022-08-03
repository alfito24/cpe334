<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PickupController extends Controller
{
    public function index(){
        return view('pickup.pickup');
    }

    public function storepickup(Request $request){
        dd($request);

        Transaction::create([
            'plastic' => $request->jumlah_plastic,
            'paper' => $request->jumlah_paper,
            'metals' => $request->jumlah_metals,
            'glass' => $request->jumlah_glass,
            'user_id' => Auth::id(),
            'bpoints' => 0,
        ])->pickup()->create([
            'location' => $request->alamatPickup,
            'pickup_date' => $request->tanggalPickup,
            'status' => 'Belum Diambil'
        ]);
    }
}
