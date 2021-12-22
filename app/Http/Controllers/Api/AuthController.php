<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if ($user = User::where('username', $request->username)->first()) {
            //Cek Password
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('access_token')->plainTextToken;

                $user_detail = Pegawai::findOrFail($user->pegawai_id);
                if ($user_detail) {
                    return response()->json([
                        'token' => $token,
                        'user' => $user,
                        'user_detail' => $user_detail
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'Password Anda Salah!'
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'Kamu belum terdaftar!'
            ], 401);
        }
    }

    public function Register(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required',
            'device_id' => 'required',
        ]);


        //Cek Pegawai
        if ($pegawai = Pegawai::where('email', "=", $request->email)->first()) {
            $user = User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'pegawai_id' => $pegawai->id,
                'device_id' => $request->device_id,
            ]);

            if ($user) {
                $token = $user->createToken('access_token')->plainTextToken;
                return response()->json([
                    'message' => 'Pendaftaran Berhasil!',
                    'token' => $token,
                    'user' => $user
                ], 201);
            }
        } else {
            return response()->json([
                'message' => 'Anda bukan pegawai!'
            ], 401);
        }
    }

    public function Logout(Request $request)
    {
        if (Auth::user()->tokens()->delete()) {
            return response([
                'message' => 'Logged out!'
            ], 200);
        }
    }
}
