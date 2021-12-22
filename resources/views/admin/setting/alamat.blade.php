@extends('layouts.app')
@section('title','Setting')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col-3">
          <a href="{{ route('setting.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        </div>
      </div>

    <div class="row mt-3">
        <div class="col-8">
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Setting Lokasi</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('setting.alamat.update') }}">
                        @csrf
                       
                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input name="latitude" type="text" value="{{ $latitude->value }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input name="longitude" type="text" value="{{ $longitude->value }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Jam Masuk</label>
                            <input name="jam_masuk" type="time" value="{{ $jam_masuk->value }}" class="form-control">
                        </div>

                        <div class="button group">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection