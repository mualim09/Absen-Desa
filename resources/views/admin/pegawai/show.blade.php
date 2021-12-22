@extends('layouts.app')
@section('title','Detail pegawai')
@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="row">
          <div class="col-3">
            <a href="{{ route('pegawai.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="card shadow mb-4 mt-3">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Info pegawai</h6>
          </div>
          <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img class="img-thumbnail" style="width:300px; height:300px;" src="{{ $pegawai->picture }}" alt="">
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nama : </label>
                        <input value="{{ $pegawai->nama }}" disabled name="nama" type="text" class="form-control">
                      </div>
                  
                      <div class="form-group">
                        <label for="">Jabatan : </label>
                        <input value="{{ $pegawai->jabatan }}" disabled name="jabatan" type="text" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="">Email : </label>
                        <input value="{{ $pegawai->email }}" disabled name="email" type="text" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nomor HP : </label>
                        <input value="{{ $pegawai->no_hp }}" disabled name="no_hp" type="text" class="form-control">
                      </div>
                   

                      <div class="form-group">
                        <label for="">Jenis Kelamin : </label>
                        <div class="custom-control custom-radio custom-control">
                         <input 
                         {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'checked' : ''}} disabled type="radio" value="Laki-laki"  id="customRadioInline1" name="jenis_kelamin" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                       </div>
                       <div class="custom-control custom-radio custom-control-inline">
                         <input  {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}  disabled type="radio" value="Perempuan" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                       </div>
                      </div>
                   
                    </div>
                  </div>
                  <div class="row mt-5">
                  
               
                  </div>
                 
          </div>
      </div>
    </div>
    <!-- /.container-fluid -->
@endsection
