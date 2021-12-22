<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallery.index',[
            'gallery'=>Gallery::paginate(8),
            'category'=>GalleryCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create',[
            'category'=>GalleryCategory::all()
        ]);
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
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'gallery_categories_id'=>'required'
        ]);

       
        $imageName = time().'.'.$request->picture->extension();  
        $request->picture->move(public_path('images'), $imageName);
        
        Gallery::create([
            'picture'=>URL::to('images').'/'.$imageName,
            'gallery_categories_id'=>$request->gallery_categories_id
        ]);

        return redirect()->route('gallery.index')->with('success','Berhasil Menambahkan Gambar!');

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
        return view('admin.gallery.edit',[
            'gallery'=>Gallery::findOrFail($id)
        ]);
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

        $gallery=Gallery::findOrFail($id);
        $picture=explode('/',$gallery->picture);

        $request->validate([
            'picture'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_categories_id'=>'required'
        ]);

        //cek ada gambar atau tidak
        if($request->hasFile('picture')){
            if(File::exists('images/'.$picture[4])){
                File::delete('images/'.$picture[4]);
            }
            $imageName = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('images'), $imageName);

            $gallery->update([
                'judul'=>$request->judul,
                'isi'=>$request->isi,
                'user_id'=>Auth::user()->id,
                'picture'=>URL::to('images').'/'.$imageName,
                'galleries_categories_id'=>$request->galleries_categories_id
            ]);
        }else{
            $gallery->update($request->except('_token'));
        }

        return redirect()->route('gallery.index')->with('success','Berhasil Mengupdate Gallery!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=Gallery::findOrFail($id);
        $picture=explode('/',$gallery->picture);
      
        //cek ada gambar di storage
        if(File::exists('images/'.$picture[4])){ 
        File::delete('images/'.$picture[4]);
        Gallery::destroy($id);
        }
        
        return redirect()->route('gallery.index')->with('success','Berhasil Menghapus Gallery!');
    }

    public function category($id){
        return view('admin.gallery.index',[
            'gallery'=>Gallery::where('gallery_categories_id',$id)->paginate(8),
            'category'=>GalleryCategory::all()
        ]);
    }
}
