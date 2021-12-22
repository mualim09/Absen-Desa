<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kegiatan.index',['kegiatan'=>Kegiatan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
            'nama'=>'required|string',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'jam_selesai'=>'required',
            'tanggal_kegiatan'=>'required|date'
        ]);

        Kegiatan::create($request->except('_token'));
        
        return redirect()->route('kegiatan.index')->with('success','Berhasil Menambahkan Data Kegiatan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.kegiatan.edit',['kegiatan'=>Kegiatan::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kegiatan=Kegiatan::findOrFail($id);

        $validation=$request->validate([
            'nama'=>'required',
            'jam_mulai'=>'required',
            'keterangan'=>'required',
            'tanggal_kegiatan'=>'required'
        ]);

        $kegiatan->update($request->except('_token'));

        return redirect()->route('kegiatan.index')->with('success','Berhasil Mengupdate Data Kegiatan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_kegiatan)
    {
        Kegiatan::destroy($kode_kegiatan);
        return redirect()->route('kegiatan.index')->with('success','Berhasil Menghapus Data Kegiatan!');
    }
}
