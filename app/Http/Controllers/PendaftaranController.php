<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Poli;
use App\Models\Puskesmas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PendaftaranController extends Controller
{
    public function daftar_puskesmas()
    {
        $data = Puskesmas::get();
        return view('user.daftar.puskesmas', compact('data'));
    }

    public function form_daftar($puskesmas_id)
    {
        $puskesmas = Puskesmas::find($puskesmas_id);
        $poli = Poli::get();
        return view('user.daftar.form_daftar', compact('puskesmas', 'poli'));
    }

    public function store_form_daftar(Request $req, $puskesmas_id)
    {

        // $namaDB = Puskesmas::find($puskesmas_id)->first();
        // $checkPasien = DB::connection($namaDB->db)->table('m_pasien')->where('nik', $req->nik)->first();
        // dd($checkPasien);
        //check ke DB puskesmas apakah pasien ada, jika belum ada, tambahkan
        DB::beginTransaction();
        try {

            $namaDB = Puskesmas::find($puskesmas_id)->first();
            $p = new Pendaftaran;
            $p->puskesmas = $namaDB->db;
            $p->jenis = 'UMUM';
            $p->nik = $req->nik;
            $p->nama = $req->nama;
            $p->jkel = $req->sex;
            $p->tgl_lahir = $req->tglLahir;
            $p->tgl_daftar = $req->tglDaftar;
            $p->user_id = Auth::user()->id;
            $p->kdPoli = Poli::where('kdPoli', $req->kdPoli)->first()->kdPoli;
            $p->nmPoli = Poli::where('kdPoli', $req->kdPoli)->first()->nmPoli;
            $p->save();

            //check pasien apakah sudah ada datanya 

            $checkPasien = DB::connection($namaDB->db)->table('m_pasien')->where('nik', $req->nik)->first();

            if ($checkPasien == null) {
                //jika tidak di temukan tambahkan pasien
                DB::connection($namaDB->db)->table('m_pasien')->insert([
                    'nama'          => $req->nama,
                    'nik'           => $req->nik,
                    'sex'           => $req->sex,
                    'tglLahir'      => Carbon::parse($req->tglLahir)->format('d-m-Y'),
                ]);

                $pasienBaru = DB::connection($namaDB->db)->table('m_pasien')->where('nik', $req->nik)->first();
                //jika ada, tambahkan ke pendaftaran
                $db = DB::connection($namaDB->db)->table('t_pendaftaran')->where('tglDaftar', Carbon::parse($req->tglDaftar)->format('d-m-Y'))->where('kdPoli', $req->kdPoli)->get();
                //dd($db, Carbon::parse($req->tglDaftar)->format('d-m-Y'));
                if ($db->count() == 0) {
                    $antrian = antrean(1);
                    DB::connection($namaDB->db)->table('t_pendaftaran')->insert([
                        'tglDaftar'     => Carbon::parse($req->tglDaftar)->format('d-m-Y'),
                        'nama'          => $req->nama,
                        'nik'           => $req->nik,
                        'sex'           => $req->sex,
                        'kunjSakit'     => 1,
                        'tglLahir'      => Carbon::parse($req->tglLahir)->format('d-m-Y'),
                        'jenis'         => 'UMUM',
                        'kdPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                        'nmPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                        'nomor_antrian' => $antrian,
                        'status'        => 'baru',
                        'daftarVia'     => 'online',
                        'm_pasien_id'   => $pasienBaru->id,
                        'pendaftaran_id' => $p->id,
                    ]);
                } else {

                    $antrian = antrean((int)$db->last()->nomor_antrian + 1);
                    DB::connection($namaDB->db)->table('t_pendaftaran')->insert([
                        'tglDaftar'     => Carbon::parse($req->tglDaftar)->format('d-m-Y'),
                        'nama'          => $req->nama,
                        'nik'           => $req->nik,
                        'sex'           => $req->sex,
                        'kunjSakit'     => 1,
                        'tglLahir'      => Carbon::parse($req->tglLahir)->format('d-m-Y'),
                        'jenis'         => 'UMUM',
                        'kdPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                        'nmPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                        'nomor_antrian' => $antrian,
                        'status'        => 'baru',
                        'daftarVia'     => 'online',
                        'm_pasien_id'   => $pasienBaru->id,
                        'pendaftaran_id' => $p->id,
                    ]);
                }
            } else {
                //jika ada, tambahkan ke pendaftaran
                $db = DB::connection($namaDB->db)->table('t_pendaftaran')->where('tglDaftar', Carbon::parse($req->tglDaftar)->format('d-m-Y'))->where('kdPoli', $req->kdPoli)->get();
                if ($db->count() == 0) {
                    $antrian = antrean(1);
                    DB::connection($namaDB->db)->table('t_pendaftaran')->insert([
                        'tglDaftar'     => Carbon::parse($req->tglDaftar)->format('d-m-Y'),
                        'nama'          => $req->nama,
                        'nik'           => $req->nik,
                        'sex'           => $req->sex,
                        'kunjSakit'     => 1,
                        'tglLahir'      => Carbon::parse($req->tglLahir)->format('d-m-Y'),
                        'jenis'         => 'UMUM',
                        'kdPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                        'nmPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                        'nomor_antrian' => $antrian,
                        'status'        => 'baru',
                        'daftarVia'     => 'online',
                        'm_pasien_id'   => $checkPasien->id,
                        'pendaftaran_id' => $p->id,
                    ]);
                } else {

                    $antrian = antrean((int)$db->last()->nomor_antrian + 1);
                    DB::connection($namaDB->db)->table('t_pendaftaran')->insert([
                        'tglDaftar'     => Carbon::parse($req->tglDaftar)->format('d-m-Y'),
                        'nama'          => $req->nama,
                        'nik'           => $req->nik,
                        'sex'           => $req->sex,
                        'kunjSakit'     => 1,
                        'tglLahir'      => Carbon::parse($req->tglLahir)->format('d-m-Y'),
                        'jenis'         => 'UMUM',
                        'kdPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                        'nmPoli'        => Poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                        'nomor_antrian' => $antrian,
                        'status'        => 'baru',
                        'daftarVia'     => 'online',
                        'm_pasien_id'   => $checkPasien->id,
                        'pendaftaran_id' => $p->id,
                    ]);
                }
            }


            DB::commit();
            Session::flash('success', 'Pendaftaran Berhasil');
            return redirect('/user/home');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Session::flash('error', 'Gagal Menyimpan');
            return back();
        }
    }
}
