<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index',[
            'page'=>Page::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'nama'=>'required|string',
            'judul'=>'required|string',
            'content'=>'required',
            'picture'=>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->picture->extension();  
        $request->picture->move(public_path('images'), $imageName);

        Page::create([
            'nama'=>$request->nama,
            'judul'=>$request->judul,
            'content'=>$request->content,
            'picture'=>URL::to('images').'/'.$imageName,
        ]);

        return redirect()->route('page.index')->with('success','Berhasil Membuat Halaman!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::findOrFail($id)->delete();

        if($page){
            return redirect()->route('page.index')->with('success','Berhasil Menghapus Halaman!');
        }
    }
}
