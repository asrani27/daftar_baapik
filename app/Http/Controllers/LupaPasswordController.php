<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LupaPasswordController extends Controller
{
    public function index()
    {
        return view('forgot_password');
    }

    public function reset(Request $req)
    {
        // $mailData = [
        //     'title' => 'Mail from baapik.banjarmasinkota.go.id',
        //     'body' => 'Email Verifikasi'
        // ];

        // Mail::to($req->email)->send(new DemoMail($mailData));

        Session::flash('info', 'Server sedang tidak bisa mengirim email');
        return back();
    }
}
