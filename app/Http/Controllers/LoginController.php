<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/user/home');
        }
        return view('login');
    }

    public function login(Request $req)
    {
        $remember = $req->remember ? true : false;
        $credential = $req->only('email', 'password');

        if (Auth::attempt($credential, $remember)) {
            Session::flash('success', 'Selamat Datang');
            return redirect('/user/home');
        } else {
            request()->flash();
            Session::flash('error', 'Username / Password Tidak Ditemukan');
            return back();
        }
        // $check = User::where('email', $req->email)->where('password', $req->password)->first();
        // if ($check == null) {
        //     Session::flash('error', 'Username / Password Tidak Ditemukan');
        //     return back();
        // } else {
        //     Auth::login($check);
        //     return redirect('/user/home');
        // }
        // if ($req->email)
        //     //$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        //     if ($user && Hash::check($req->password, bcrypt($user->password))) {

        //         Session::flash('success', 'Selamat Datang');
        //         return redirect('/user/home');
        //     } else {
        //         return 'failed';
        //     }


        // if (Auth::attempt([$field => $login, 'password' => request()->password], true)) {
        //     Session::flash('success', 'Selamat Datang');
        //     return redirect('/user/home');
        // } else {
        //     request()->flash();
        //     Session::flash('error', 'Username / Password Tidak Ditemukan');
        //     return back();
        // }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
