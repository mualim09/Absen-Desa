<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\GalleryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama'=>'required'
        ]);

        GalleryCategory::create($request->except('_token'));
            
        return redirect()->route('gallery.index')->with('success','Berhasil Menambahkan Kategori Gallery');
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

       //ambil data gambar berdasarkan id kategori
       $gallery=Gallery::where('gallery_categories_id',$id)->get();
     
       //loopin untuk membersihkan picture di storage
       foreach($gallery as $item){
         //cek ada gambar di storage
        $picture=explode('/',$item->picture);

         if(File::exists('images/'.$picture[4])){ 
            File::delete('images/'.$picture[4]);
            }
       }
       GalleryCategory::findOrFail($id)->delete();

       return redirect()->route('gallery.index')->with('success','Berhasil Menghapus Kategori!');
    }
}
