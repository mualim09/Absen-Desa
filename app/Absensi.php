<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table='absensi';

    protected $fillable=['nim','kegiatan_id','keterangan','waktu_absensi'];
}
