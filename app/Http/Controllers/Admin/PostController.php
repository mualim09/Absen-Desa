<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\PostCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.post.index',[
            'post'=>Post::all(),
            'category'=>PostCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create',[
            'category'=>PostCategory::all()
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

        $rules=[
            'judul'=>'required|string',
            'isi'=>'required',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        $messages=[
            'judul.required'=>'judul tidak boleh kosong!',
            'judul.string'=>'judul harus berupa huruf!',
            'isi.required'=>'isi tidak boleh kosong!',
            'picture.required'=>'gambar tidak boleh kosong!',
            'picture.image'=>'file harus berupa gambar!',
            'picture.mimes'=>'format file tidak di izinkan!'
        ];

        $validator=Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return back()->with('toast_error','Gagal! Periksa kembali input!')->withErrors($validator->errors())->withInput();
        }
        
        $imageName = time().'.'.$request->picture->extension();  
        $request->picture->move(public_path('images'), $imageName);

        $post=Post::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'user_id'=>Auth::user()->id,
            'picture'=>URL::to('images').'/'.$imageName,
        ]);

        $post->category()->attach($request->post_category_id);



        return redirect()->route('post.index')->with('toast_success','Berhasil Menambahkan Post!');

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
        $post=Post::findOrFail($id);
        $category=PostCategory::all();
        return view('admin.post.edit',compact('post','category'));
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
        $post=Post::findOrFail($id);

        $picture=explode('/',$post->picture);

        //cek ada gambar atau tidak
        if($request->hasFile('picture')){
            if(File::exists('images/'.$picture[4])){
                File::delete('images/'.$picture[4]);
            }
            $imageName = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('images'), $imageName);

            $post->update([
                'judul'=>$request->judul,
                'isi'=>$request->isi,
                'user_id'=>Auth::user()->id,
                'picture'=>URL::to('images').'/'.$imageName,
            ]);

        }else{
            $post->update($request->except('_token','post_category_id'));
        }
        
        //sinkornisasi relasi category tanpa duplikat
        $post->category()->sync($request->post_category_id);
        
        return redirect()->route('post.index')->with('toast_success','Berhasil Mengupdate Post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post=Post::findOrFail($request->id);
        $picture=explode('/',$post->picture);
      
        if(File::exists('images/'.$picture[4])){ 
        File::delete('images/'.$picture[4]);
        $post->category()->detach();
        $post->delete();
        }
        
        
        return redirect()->route('post.index')->with('toast_success','Berhasil Menghapus Post!');
    }
}
