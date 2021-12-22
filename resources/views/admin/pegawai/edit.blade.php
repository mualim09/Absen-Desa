@extends('layouts.app')
@section('title','Edit pegawai')
@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->

        <div class="row">
          <div class="col-3">
            <a href="{{ route('pegawai.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card shadow mb-4 mt-3">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data pegawai</h6>
              </div>
              <div class="card-body">
                     <form method="POST" action="{{ route('pegawai.update',$pegawai->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="">Nama : </label>
                            <input value="{{ $pegawai->nama }}" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                      
                          <div class="form-group">
                            <label for="">Jabatan : </label>
                            <input  value="{{ $pegawai->jabatan }}" name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror">
                            @error('jabatan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                      
                          <div class="form-group">
                            <label for="">Jenis Kelamin : </label>
                            <div class="custom-control custom-radio custom-control">
                             <input    {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'checked' : ''}} type="radio" value="Laki-laki" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input">
                             <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                             <input {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}   type="radio" value="Perempuan" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input">
                             <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                           </div>
                          </div>

                       
                      
                        </div>
                        <div class="col-md-5 offset-md-1">
                          <div class="form-group">
                            <label for="">Nomor HP : </label>
                            <input  value="{{ $pegawai->no_hp }}" name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror">
                            @error('no_hp')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                          
                          <div class="form-group">
                            <label for="">Picture : </label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input  name="picture" type="file" class="custom-file-input @error('picture') is-invalid @enderror" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                            </div>
                            @error('picture')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="">Email : </label>
                            <input  value="{{ $pegawai->email }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">  
                          <button class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                     
                   
                     </form>
              </div>
          </div>
          </div>
        </div>
        
     
    </div>
    <!-- /.container-fluid -->
@endsection
