<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public static function show()
    {
        return view('pages/login');
    }

    public static function perform(Request $request)
    {
        // Validate the incoming data
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd($data);
        // Attempt to log the user in
        if (!Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        )) {
            return back()->withErrors([
                'message' => 'Wrong credentials, please try again.'
            ]);
        }

        // Redirect to the intended page or the dashboard
        return redirect()->intended('/')->with('success', 'Login successful!');
    }
    public static function logout()
    {
        Auth::logout();

        // Destroy the session
        session()->flush();

        // Redirect to the login page or any other page
        return redirect()->route('login');
    }
}
