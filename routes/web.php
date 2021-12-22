<?php

use Faker\Guesser\Name;
use App\GalleryCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.index');

    Route::get('/s', 'SettingController@index')->name('setting.index');

    Route::get('/s/alamat', 'SettingController@alamat')->name('setting.alamat');
    Route::post('/s/alamat/update', 'SettingController@alamat_update')->name('setting.alamat.update');


    Route::get('/s/akun', 'SettingController@akun')->name('setting.akun');

    Route::get('/s/gantipassword', 'SettingController@gantipassword')->name('setting.gantipassword');

    Route::post('/s/password_update', 'SettingController@password_update')->name('setting.password_update');

    Route::resource('pegawai', 'PegawaiController');
    Route::resource('kegiatan', 'KegiatanController');
    Route::resource('kehadiran', 'KehadiranController');
});
