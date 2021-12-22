<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kegiatan;
use App\Absensi;
use App\Kehadiran;
use App\Setting;
use App\User;
use Illuminate\Support\Carbon;

class AbsensiController extends Controller
{

    public function scan(Request $request)
    {

        $tgl = date('Y-m-d');
        $now = date("Y-m-d H:i:s");
        $jam = date('H:i');
        $center_lat_db = Setting::where('nama', 'latitude')->first();
        $center_lng_db = Setting::where('nama', 'longitude')->first();


        //convert ke float
        $center_lat = (float) $center_lat_db->value;
        $center_lng = (float) $center_lng_db->value;
        $jam_mulai = Setting::where('name', "=", "jam_masuk");


        $request->validate([
            'device_id' => 'required',
            'qrcode' => 'required'
        ]);

        $user = User::findOrFail($request->id);
        if ($request->qrcode === "Datang") {
            $distance = (6371 * acos((cos(deg2rad($center_lat))) * (cos(deg2rad($request->lat))) * (cos(deg2rad($request->lon) - deg2rad($center_lng))) + ((sin(deg2rad($center_lat))) * (sin(deg2rad($request->lat))))));
            if ($distance > 0.050) {
                return response()->json([
                    'message' => 'Jarak anda jauh' . $distance . 'km!',
                ]);
            } else {
                if (Kehadiran::where('user_id', "=", $request->id)->where("tanggal", "=", $tgl)->count() != 0) {
                    return response()->json([
                        'message' => 'Anda sudah absensi!'
                    ]);
                } else {
                    if ($jam > $jam_mulai) {
                        $absen = Kehadiran::create([
                            'user_id' => $user->id,
                            'pegawai_id' => $user->pegawai_id,
                            'tanggal' => $tgl,
                            'jam' => $jam,
                            'keterangan' => 'Hadir'
                        ]);
                    } else {
                        $absen = Kehadiran::create([
                            'user_id' => $user->id,
                            'pegawai_id' => $user->pegawai_id,
                            'tanggal' => $tgl,
                            'jam' => $jam,
                            'keterangan' => 'Terlambat'
                        ]);
                    }

                    if ($absen) {
                        return response()->json([
                            'message' => 'Absensi berhasil!',
                        ]);
                    } else {
                        return response()->json([
                            'message' => 'Terjadi Kesalahan!'
                        ]);
                    }
                }
            }
        } else {
            return response()->json([
                'message' => 'Maaf QR Code Tidak Valid!'
            ]);
        }
    }
}
