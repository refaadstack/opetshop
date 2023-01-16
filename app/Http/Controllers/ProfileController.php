<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function myprofile($id){
        $me = User::find($id);
        // dd($me);

        return view('dashboard.my-profil', compact(['me']));
    }

    public function update(Request $request, $id){
        $me = User::find($id);

        $me->name = $request->name;
        $me->email = $request->email;
        $me->password = bcrypt($request->password);
        // dd($request->all());
        $me->save();


        return redirect()->route('dashboard');
    }
}
