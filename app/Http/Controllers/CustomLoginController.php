<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{


    public function login()
    {
        return view('custom-auth.user-login');
    }


    public function register()
    {
        return view('custom-auth.user-register');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role == 'user') {
                return redirect()->route('user.dashboard');
            } else {
                abort(code: 403);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    

}
