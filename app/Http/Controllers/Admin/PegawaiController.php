<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pegawai;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pegawai.index', ['pegawai' => Pegawai::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_hp' => 'required|numeric',
            'email' => 'required|unique:pegawai|email'
        ]);

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $imageName);

        Pegawai::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'picture' => URL::to('images') . '/' . $imageName,
            'no_hp' => $request->no_hp,
            'email' => $request->email
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Berhasil Menambahkan Data Pegawai!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pegawai.show', ['pegawai' => Pegawai::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pegawai.edit', ['pegawai' => Pegawai::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $pegawai = Pegawai::findOrFail($nim);
        $picture = explode('/', $pegawai->picture);


        $request->validate([
            'nama' => 'string',
            'jabatan' => 'string',
            'jenis_kelamin' => 'string',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_hp' => 'numeric',
            'email' => 'email'
        ]);


        //cek ada gambar atau tidak
        if ($request->hasFile('picture')) {
            if (File::exists('images/' . $picture[4])) {
                File::delete('images/' . $picture[4]);
            }
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);

            $pegawai->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'picture' => URL::to('images') . '/' . $imageName,

                'no_hp' => $request->no_hp,
                'email' => $request->email
            ]);
        } else {
            $pegawai->update($request->except('_token'));
        }



        return redirect()->route('pegawai.index')->with('success', 'Berhasil Mengupdate Data Pegawai!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $Pegawai = Pegawai::findOrFail($nim);
        $picture = explode('/', $Pegawai->picture);

        if (File::exists('images/' . $picture[4])) {
            File::delete('images/' . $picture[4]);
            Pegawai::destroy($nim);
        }

        return redirect()->route('Pegawai.index')->with('success', 'Berhasil Menghapus Data Pegawai!');
    }
}
