<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Rules\SameWithOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index()
    {
        return view('admin.setting.index');
    }

    public function socialmedia()
    {
        return view('admin.setting.socialmedia', [
            'instagram' => Setting::where('nama', 'instagram')->first(),
            'facebook' => Setting::where('nama', 'facebook')->first()
        ]);
    }

    public function socialmedia_update(Request $request)
    {
        Setting::where('nama', 'instagram')->update([
            'value' => $request->instagram
        ]);

        Setting::where('nama', 'facebook')->update([
            'value' => $request->facebook
        ]);

        Setting::where('nama', 'twitter')->update([
            'value' => $request->twitter
        ]);



        return redirect()->route('setting.index')->with('toast_success', 'Pengaturan Berhasil Diterapkan!');
    }

    public function alamat()
    {
        return view('admin.setting.alamat', [
            'alamat' => Setting::where('nama', 'alamat')->first(),
            'phone' => Setting::where('nama', 'phone')->first(),
            'email' => Setting::where('nama', 'email')->first(),
            'latitude' => Setting::where('nama', 'latitude')->first(),
            'longitude' => Setting::where('nama', 'longitude')->first(),
            'jam_masuk' => Setting::where('nama', 'jam_masuk')->first(),
            'jam_pulang' => Setting::where('nama', 'jam_pulang')->first(),
        ]);
    }

    public function alamat_update(Request $request)
    {
        Setting::where('nama', 'alamat')->update([
            'value' => $request->alamat
        ]);

        Setting::where('nama', 'phone')->update([
            'value' => $request->phone
        ]);

        Setting::where('nama', 'email')->update([
            'value' => $request->email
        ]);

        Setting::where('nama', 'latitude')->update([
            'value' => $request->latitude
        ]);

        Setting::where('nama', 'longitude')->update([
            'value' => $request->longitude
        ]);

        Setting::where('nama', 'jam_masuk')->update([
            'value' => $request->jam_masuk
        ]);

        Setting::where('nama', 'jam_pulang')->update([
            'value' => $request->jam_pulang
        ]);

        return redirect()->route('setting.index')->with('toast_success', 'Pengaturan Berhasil Diterapkan!');
    }


    public function about()
    {
        return view('admin.setting.pages.about', [
            'about' => Setting::where('nama', 'about')->first(),
            'about_pic' => Setting::where('nama', 'about_pic')->first(),
        ]);
    }




    public function about_update(Request $request)
    {
        $about_pic = Setting::where('nama', 'about_pic')->first();

        if ($request->hasFile('about_pic')) {
            if (File::exists('images/' . $about_pic->value)) {
                File::delete('images/' . $about_pic->value);
            }
            $imageName = time() . '.' . $request->about_pic->extension();
            $request->about_pic->move(public_path('images'), $imageName);

            Setting::where('nama', 'about')->update([
                'value' => $request->about
            ]);

            Setting::where('nama', 'about_pic')->update([
                'value' => $imageName
            ]);
        }



        return redirect()->route('page.index')->with('toast_success', 'Pengaturan Berhasil Diterapkan!');
    }

    public function blog()
    {
        return view('admin.setting.pages.blog', [
            'blog_pic' => Setting::where('nama', 'blog_pic')->first(),
        ]);
    }




    public function blog_update(Request $request)
    {
        $blog_pic = Setting::where('nama', 'blog_pic')->first();

        if ($request->hasFile('blog_pic')) {
            if (File::exists('images/' . $blog_pic->value)) {
                File::delete('images/' . $blog_pic->value);
            }
            $imageName = time() . '.' . $request->blog_pic->extension();
            $request->blog_pic->move(public_path('images'), $imageName);

            Setting::where('nama', 'blog_pic')->update([
                'value' => $imageName
            ]);
        }



        return redirect()->route('page.index')->with('toast_success', 'Pengaturan Berhasil Diterapkan!');
    }


    public function gallery()
    {
        return view('admin.setting.pages.gallery', [
            'gallery_pic' => Setting::where('nama', 'gallery_pic')->first(),
        ]);
    }




    public function gallery_update(Request $request)
    {
        $gallery_pic = Setting::where('nama', 'gallery_pic')->first();

        if ($request->hasFile('gallery_pic')) {
            if (File::exists('images/' . $gallery_pic->value)) {
                File::delete('images/' . $gallery_pic->value);
            }
            $imageName = time() . '.' . $request->gallery_pic->extension();
            $request->gallery_pic->move(public_path('images'), $imageName);

            Setting::where('nama', 'gallery_pic')->update([
                'value' => $imageName
            ]);
        }


        return redirect()->route('page.index')->with('toast_success', 'Pengaturan Berhasil Diterapkan!');
    }

    public function home()
    {
        return view('admin.setting.pages.home');
    }


    public function quote()
    {
        return view('admin.setting.quote', [
            'quote' => Setting::where('nama', 'quote')->first(),
            'quote_bg' => Setting::where('nama', 'quote_bg')->first(),
            'quote_author' => Setting::where('nama', 'quote_author')->first()
        ]);
    }

    public function quote_update(Request $request)
    {


        $quote_bg = Setting::where('nama', 'quote_bg')->first();


        if ($request->hasFile('quote_bg')) {
            if (File::exists('images/' . $quote_bg->value)) {
                File::delete('images/' . $quote_bg->value);
            }
            $imageName = time() . '.' . $request->quote_bg->extension();
            $request->quote_bg->move(public_path('images'), $imageName);

            Setting::where('nama', 'quote')->update([
                'value' => $request->quote
            ]);

            Setting::where('nama', 'quote_author')->update([
                'value' => $request->quote_author
            ]);

            Setting::where('nama', 'quote_bg')->update([
                'value' => $imageName
            ]);
        } else {
            Setting::where('nama', 'quote')->update([
                'value' => $request->quote
            ]);

            Setting::where('nama', 'quote_author')->update([
                'value' => $request->quote_author
            ]);
        }

        return redirect()->route('page.index')->with('toast_success', 'Pengaturan Berhasil Diterapkan!');
    }


    public function akun()
    {
        return view('admin.setting.akun', [
            'user' => Auth::user()
        ]);
    }

    public function gantipassword()
    {

        return view('admin.setting.gantipassword', [
            'user' => Auth::user()
        ]);
    }

    public function password_update(Request $request)
    {

        $rules = [
            'old_password' => ['required', new SameWithOldPassword],
            'new_password' => 'required',
            'new_password_confirm' => 'required|same:new_password',
        ];


        $messages = [
            'old_password.required' => 'password lama tidak boleh kosong!',
            'new_password.required' => 'password baru tidak boleh kosong!',
            'new_password_confirm.required' => 'konfirmasi password baru tidak boleh kosong!',
            'new_password_confirm.same' => 'konfirmasi password baru harus sama dengan password baru!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        //cek jika validasi gagal
        if ($validator->fails()) {
            return back()->with('toast_error', 'Gagal! Pastikan input benar!')->withErrors($validator)->withInput();
        }


        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        Auth::logout();

        return redirect()->route('login')->with('toast_success', 'Berhasil mengubah password! Silahkan login kembali!');
    }
}
