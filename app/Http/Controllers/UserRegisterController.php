<?php

namespace App\Http\Controllers;

use App\Models\TblUserMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    //
    public static function create()
    {
        return view('pages/registerUser', ['user' => Auth::user()]);
    }

    public static function store()
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tbl_user_masters',
            'password' => 'required|min:7',
            'phone_number' => 'required',
        ]);

        // dd($data);
        $data['password'] = Hash::make($data['password']);
        $data['user_delete'] = 0;


        TblUserMaster::create($data);

        return redirect('/login');
    }
}
