<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = ['id', 'nama', 'jabatan', 'jenis_kelamin', 'picture', 'no_hp', 'email'];
}
