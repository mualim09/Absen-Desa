@extends('layouts.app')
@section('title','Halaman')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->



          

          <div class="row">
   
            <div class="col-12">
              
          

              <!-- DataTales Example -->
              <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Halaman Default</h6>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive mt-3">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th class="text-center">Nama</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                          
                              <tbody>
                                  <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Home</td>
                                    <td class="text-center"><a href="{{ route('setting.home') }}" class="btn btn-success"><i class="fas fa-wrench"></i></a></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">About</td>
                                    <td class="text-center"><a href="{{ route('setting.about') }}" class="btn btn-success"><i class="fas fa-wrench"></i></a></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">Berita</td>
                                    <td class="text-center"><a href="{{ route('setting.blog') }}" class="btn btn-success"><i class="fas fa-wrench"></i></a></td>
                                  </tr>

                                  <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">Gallery</td>
                                    <td class="text-center"><a href="{{ route('setting.gallery') }}" class="btn btn-success"><i class="fas fa-wrench"></i></a></td>
                                  </tr>
                                
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
   
            <div class="col-12">
              
          

              <!-- DataTales Example -->
              <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Halaman Tambahan</h6>
                  </div>
                  <div class="card-body">
                      <a href="{{ route('page.create') }}" class="btn btn-sm btn-primary">Buat Halaman</a>
                      <div class="table-responsive mt-3">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th class="text-center">Nama</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                          
                              <tbody>
                                @forelse ($page as $item)
                                  <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->nama }}</td>
                                    <td> <form method="post" action="{{ route('page.destroy',$item->id) }}" class="form-inline d-flex justify-content-center">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                      <a href="{{ route('page.edit',$item->id) }}" class="btn btn-success ml-2"><i class="fas fa-edit"></i></a>
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
          </div>

      </div>
      <!-- /.container-fluid -->

       
@endsection

@push('table-style')
  <!-- Custom styles for this page -->
  <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('table-script')
 <!-- Page level plugins -->
 <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

    
@endpush
