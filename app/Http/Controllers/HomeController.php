<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function user()
    {
        $data = Pendaftaran::where('user_id', Auth::user()->id)->paginate(10);

        $data->getCollection()->transform(function ($item) {
            $d =  DB::connection($item->puskesmas)->table('t_pendaftaran')->where('pendaftaran_id', $item->id)->first();
            $s =  DB::connection($item->puskesmas)->table('t_pendaftaran')->where('tglDaftar', Carbon::parse($item->tgl_daftar)->format('d-m-Y'))->where('kdPoli', $item->kdPoli)->where('status', 'baru')->where('pendaftaran_id', '<', $item->id)->count();

            $item->antrian = $d == null ? null : $d->nomor_antrian;
            $item->sisa_antrian = $s;
            if ($d->kdStatusPulang != null) {
                $item->status = 3;
            } else {
                $item->status = $d->ke_poli;
            }
            return $item;
        });

        $sorted = $data->getCollection()->sortBy('created_at')->sortBy('status')->values();
        $data->setCollection($sorted);

        return view('user.home', compact('data'));
    }

    public function gantipass()
    {
        return view('user.gp');
    }

    public function ganti_password(Request $req)
    {
        if ($req->password_lama == Auth::user()->password) {
            if ($req->password1 != $req->password2) {
                Session::flash('error', 'Password Baru Tidak sama');
                return back();
            } else {

                Auth::user()->update(['password' => $req->password1]);
                Session::flash('success', 'Password Berhasil Di ubah, login dengan password baru');
                Auth::logout();
                return redirect('/login');
            }
        } else {
            Session::flash('error', 'Password Lama Salah');
            return back();
        }
    }
}
