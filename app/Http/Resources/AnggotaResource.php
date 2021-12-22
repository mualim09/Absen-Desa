<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnggotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nama'=>$this->nama,
            'nim'=>$this->nim,
            'jabatan'=>$this->jabatan,
            'jenis_kelamin'=>$this->jenis_kelamin,
            'picture'=>$this->picture,
            'imei'=>$this->imei,
            'email'=>$this->email,
            'no_hp'=>$this->no_hp
        ];
    }
}
