@extends('layouts.app')
@section('title','Setting')

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col-3">
          <a href="{{ route('setting.akun') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        </div>
      </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-8">
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('setting.password_update',Auth::user()->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input name="old_password" type="password" value="{{ old('old_password') }}"  class="form-control">
                            @error('old_password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input name="new_password" type="password"  class="form-control" value="{{ old('new_password') }}">
                            @error('new_password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Konfirmasi Password Baru</label>
                            <input name="new_password_confirm" type="password"  class="form-control">
                            @error('new_password_confirm')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                       
                  
                        <div class="button group">
                            <button type="submit" href="{{ route('setting.gantipassword') }}"  class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection