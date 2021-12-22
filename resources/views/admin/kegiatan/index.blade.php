@extends('layouts.app')
@section('title','Kegiatan')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah</a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-3">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan BEM STMIK AMIK RIAU</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th class="text-center">No</th>
                                  <th class="text-center">Nama Kegiatan</th>
                                  <th class="text-center">Jam Mulai</th>
                                  <th class="text-center">Jam Selesai</th>
                                  <th class="text-center">Tanggal Acara</th>
                                  <th class="text-center">Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">Jam Mulai</th>
                                <th class="text-center">Jam Selesai</th>
                                <th class="text-center">Tanggal Acara</th>
                                <th class="text-center">Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @forelse ($kegiatan as $item)
                              <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->jam_mulai }}</td>
                                <td class="text-center">{{ $item->jam_selesai }}</td>
                                <td class="text-center">{{ $item->tanggal_kegiatan }}
                                <td> <form method="POST" action="{{ route('kegiatan.destroy',$item->id) }}" class="form-inline d-flex justify-content-center">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                  <a href="{{ route('kegiatan.edit',$item->id) }}" class="btn btn-info ml-2"> Edit</a>
                                  <a href="{{ route('kehadiran.show',$item->id) }}" class="btn btn-success ml-2"> Kehadiran</a>
                                </form></td>
                              </tr>
                            @empty
                              <tr>
                                <td class="text-center" colspan="6">Data Kosong</td>
                              </tr>
                            @endforelse
                             
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <!-- /.container-fluid -->
@endsection

@push('table-style')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('table-script')
 <!-- Page level plugins -->
 <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    
@endpush
