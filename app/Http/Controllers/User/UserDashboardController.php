<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(to: '/');
    }
}
