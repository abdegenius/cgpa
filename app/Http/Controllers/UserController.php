<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('index');
    }
    public function dashboard() {
        $user = User::findOrFail(Auth::id());
        return view('dashboard', ['user' => $user]);
    }
    public function profile() {
        $user = User::findOrFail(Auth::id());
        return view('profile', ['user' => $user]);
    }
    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withError('Invalid email and password provided.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
