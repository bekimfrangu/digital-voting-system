<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function log()
    {
        $users = User::all();
        return view('auth.login', compact('users'));
    }

    public function register()
    {
        $municipalities = Municipality::all();
        return view('auth.register', compact('municipalities'));
    }
}
