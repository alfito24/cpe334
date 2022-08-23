<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PickupController extends Controller
{
    public function index(){
        return view('pickup.pickup');
    }

    public function storepickup(Request $request){
        if($request->ampm == "pm"){
            $request->hours += 12;
        }
        $pickupTime = date('H:i', strtotime($request->hours.":".$request->minutes));

        Transaction::create([
            'plastic_bag' => $request->jumlah_plasticBag,
            'plastic_cup' => $request->jumlah_plasticGlass,
            'newspaper' => $request->jumlah_newspaper,
            'steel' => $request->jumlah_metals,
            'glass' => $request->jumlah_glass,
            'cardboard' => $request->jumlah_cardboard,
            'aluminium' => $request->jumlah_aluminium,
            'copper' => $request->jumlah_copper,
            'user_id' => Auth::id(),
            'bpoints' => $request->bPoints,
        ])->pickup()->create([
            'street' => $request->alamatPickup,
            'number' => $request->number,
            'city' => $request->city,
            'note' => $request->notePickup,
            'pickup_date' => date("d/m/y", strtotime($request->tanggalPickup)),
            'pickup_time' => $pickupTime,
            'status' => 'Belum Diambil'
        ]);

        return redirect()->back()->with('success', 'Sampah akan segera diambil. Mohon ditunggu yah ^-^');
    }

    public function cancelpickup($id_transaksi){
        $pickup = Pickup::where('transaction_id', $id_transaksi)->first();

        $pickup->status = 'Pickup Dibatalkan';
        $pickup->save();

        return redirect()->back()->with('canceled', 'Pickup berhasil dibatalkan');
    }
}
