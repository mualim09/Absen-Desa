<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public Routes
Route::namespace('Api')->group(function () {
    Route::post('/login', 'AuthController@Login');
    Route::post('/register', 'AuthController@Register');
});

//Private Route
Route::middleware('auth:sanctum')->namespace('Api')->group(function () {
    Route::resource('pegawai', 'PegawaiController');
    Route::get('kehadiran/{kegiatan_id}', 'KehadiranController@show');

    Route::post('/logout', 'AuthController@Logout');
    Route::post('/scan', 'AbsensiController@scan');
});
