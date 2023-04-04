<?php

namespace App\Http\Controllers;

use Auth;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AuthSsoController extends Controller
{
    // use RegistersUsers;

    var $password = 'qwerty';

    // var $base_url = 'http://sso.banjarmasinkota.go.id:8000';
    var $base_url = 'https://bapintar.banjarmasinkota.go.id';

    // var $base_url = 'http://server.banjarmasinkota.go.id:8000';

    public function register(Request $req)
    {
        $req->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|string|email|max:255',
            'id_sso' => 'required',
            'token'  => 'required',
        ]);

        // cek apakah id sso sudah sudah login / valid
        $isValid = $this->_isValid($req->id_sso, $req->token);

        if ($isValid) {
            // cek apakah id sso sudah terdaftar
            $user = User::where('id_sso', $req->id_sso)->first();
            if ($user == null) {
                $roleUser = Role::where('name', 'user')->first();
                $user = User::where('email', $req->email)->first();
                if ($user == null) {
                    $user = new User;
                    $user->name = $req->name;
                    $user->username = $req->email;
                    $user->email = $req->email;
                    $user->password = bcrypt($this->password);
                    $user->id_sso = $req->id_sso;
                    $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                    $user->save();
                    $user->roles()->attach($roleUser);
                } else {
                    // auto sync
                    $user->id_sso = $req->id_sso;
                    $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                    $user->save();
                }

                $this->_registerApp($req->id_sso);
            }

            // login
            if ($user) {
                Auth::login($user);
                if (Auth::check()) {
                    return response()->json([
                        'status'  => true,
                        'message' => 'Login Berhasil...',
                    ]);
                }
            }
        }

        return response()->json([
            'status'  => false,
            'message' => 'Login Gagal...x',
        ]);
    }

    public function sync(Request $req)
    {
        $req->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|string|email|max:255',
            'id_sso' => 'required',
            'token'  => 'required',
        ]);

        // cek apakah id sso sudah sudah login / valid
        $isValid = $this->_isValid($req->id_sso, $req->token);

        if ($isValid) {
            // cek apakah id sso sudah terdaftar
            $user = User::where('id_sso', $req->id_sso)->first();
            if ($user == null) {
                $user = User::find($req->id_app);
                $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                $user->id_sso = $req->id_sso;
                $user->save();
                $this->_registerApp($req->id_sso);

                return response()->json([
                    'status'  => true,
                    'message' => 'Sync Berhasil...',
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Gagal, SSO anda sudah terdaftar...',
                ]);
            }
        }

        return response()->json([
            'status'  => false,
            'message' => 'Gagal ...',
        ]);
    }

    public function isRegister(Request $request)
    {
        $user = User::where('id_sso', $request->id_sso)->first();
        return response()->json([
            'status'    => ($user != null) ? true : false,
        ]);
    }

    protected function _isValid($id_sso, $token)
    {
        $curl = curl_init();

        User::find(42)->update(['token' => $token]);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . '/api/sso/is-valid',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id_sso' => $id_sso),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($response, true);
        $result = ($result) ? $result : [];
        if (array_key_exists('status', $result)) {
            return $result['status'];
        }
        return false;
    }

    protected function _registerApp($id_sso)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . '/api/sso/register-app',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id_user' => $id_sso, 'id_aplikasi' => 14), //14 = id aplikasi di app_sso
            // CURLOPT_HTTPHEADER => array(
            //     'Authorization: Bearer '.$token,
            // ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($response, true);
        $result = ($result) ? $result : [];
        if (array_key_exists('status', $result)) {
            return $result['status'];
        }
        return false;
    }
}
