@extends('layouts.app')
@section('title','Tambah Kegiatan')
@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->

        <div class="row">
          <div class="col-3">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card shadow mb-4 mt-3">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan BEM STMIK AMIK RIAU</h6>
              </div>
              <div class="card-body">
                     <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-5">
                    
                          <div class="form-group">
                            <label for="">Nama Kegiatan : </label>
                            <input name="nama"  value="{{ old('nama') }}" type="text" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Tanggal Kegiatan : </label>
                            <input name="tanggal_kegiatan"  value="{{ old('tanggal_kegiatan') }}" type="date" class="form-control @error('tanggal_kegiatan') is-invalid @enderror">
                            @error('tanggal_kegiatan')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Keterangan : </label>
                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                             {{ old('keterangan') }}
                            </textarea>
                            @error('tanggal_kegiatan')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-5 offset-md-1">
                          <div class="form-group">
                            <label for="">Jam Mulai : </label>
                            <input name="jam_mulai"  value="{{ old('jam_mulai') }}" type="time" class="form-control @error('jam_mulai') is-invalid @enderror">
                            @error('jam_mulai')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Jam Selesai : </label>
                            <input name="jam_selesai"  value="{{ old('jam_selesai') }}" type="time" class="form-control @error('jam_selesai') is-invalid @enderror">
                            @error('jam_selesai')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
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
