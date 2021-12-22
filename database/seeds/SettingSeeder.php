<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'nama' => 'latitude',
            'value' => '0.463471'
        ]);

        Setting::create([
            'nama' => 'longitude',
            'value' => '101.460231'
        ]);

        Setting::create([
            'nama' => 'jam_masuk',
            'value' => ''
        ]);
    }
}
