<?php

namespace App\Http\Controllers\Admin;

use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('admin.carousel.index',[
            'carousel'=>Carousel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create');
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
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $imageName = time().'.'.$request->picture->extension();  
        $request->picture->move(public_path('images'), $imageName);

        Carousel::create([
            'picture'=>URL::to('images').'/'.$imageName,
        ]);

        return redirect()->route('carousel.index')->with('toast_success','Berhasil Menambahkan Carousel!');
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
    public function destroy($id,Request $request)
    {
        $carousel=Carousel::findOrFail($request->id);
        $picture=explode('/',$carousel->picture);
      
        if(File::exists('images/'.$picture[4])){ 
        File::delete('images/'.$picture[4]);
        Carousel::destroy($request->id);
        }

        return redirect()->route('carousel.index')->with('toast_success','Berhasil Menghapus Gambar!');
    }
}
