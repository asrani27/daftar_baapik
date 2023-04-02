<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    // Session::flash('success', 'Ini notifikasi success');
    // Session::flash('warning', 'Ini notifikasi warning');
    // Session::flash('info', 'Ini notifikasi info');
    // Session::flash('error', 'Ini notifikasi error');

    public function index()
    {
        return view('register');
    }

    public function register(Request $req)
    {
        if ($req->password != $req->password_confirmation) {
            Session::flash('error', 'Password Tidak sama');
            return back();
        }

        $role = Role::where('name', 'user')->first();
        $attr = $req->all();
        $attr['email_verified_at'] = null;
        $attr['password'] = $req->password;

        $u = User::create($attr);
        $u->roles()->attach($role);

        Auth::login($u);

        return redirect('/user/home');
    }

    public function show()
    {
        //
    }

    // public function handle()
    // {
    //     event(new Registered($user));
    // }

    public function verify()
    {
        $email = Auth::user()->email;
        return view('verify_notice', compact('email'));
    }
}
