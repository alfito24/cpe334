<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\application;

class AccountController extends Controller
{
    public function account()
    {
        $profil = DB::table('users')->where('user_id', Auth::id())->first();
        $applications = application::where('user_id', '=', Auth::id())->get();
        return view('account', compact('profil', 'applications'));
    }

    public function updateaccount()
    {
        $profil = DB::table('users')->where('user_id', Auth::id())->first();
        $userInterests = explode(',', $profil->area_of_interest);
        return view('updateprofile', [
            'profil' => $profil,
            'userInterests' => $userInterests
        ]);
    }

    public function updateprofile(Request $request)
    {
        $user = DB::table('users')->where('user_id', Auth::id());
        // $area_of_interest = implode(', ', $request->input('area_of_interest'));

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'education' => $request->education,
            'company' => $request->company,
            'company_established' => $request->company_established,
            // 'area_of_interest' => $area_of_interest,
        ]);

        if ($request->hasFile('file')) {
            $this->validate($request, [
                'file' => 'image|mimes:jpeg,png,jpg|max:4096'
            ]);

            $file = $request->file('file');
            $picture = $file->getClientOriginalName();
            $file->move('data_file', $picture);

            $user->update(['picture' => $picture]);
        }

        return redirect('/myaccount');
    }
}
