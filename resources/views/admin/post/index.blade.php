@extends('layouts.app')
@section('title','Postingan')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="row">
            <div class="col-12 col-md-9">
              

              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Data Postingan</h6>
                  </div>
                  <div class="card-body">
                    
                      <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-pen"></i> Buat postingan</a>
          
                      <div class="table-responsive mt-3">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th class="text-center">Judul</th>
                                      <th class="text-center">Picture</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                          
                              <tbody>
                                @forelse ($post as $item)
                                  <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->judul }}</td>
                                    <td class="text-center"><img src="{{ $item->picture }}" style="width:100px; height:100px;" alt=""></td>
                                    <td class="text-center"> 
                                    <button type="button" data-toggle="modal" data-target="#deletePost" data-whatever="{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    <a href="{{ route('post.edit',$item->id) }}" class="btn btn-success ml-2"><i class="fas fa-edit"></i></a>
                                  </td>
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

            <div class="col-12 col-md-3 mb-3 mb-md-0">
              <div class="card shadow" style="width: 100%;">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Kategori Post</h6>
                </div>
                <ul class="list-group list-group-flush">
                  @forelse ($category as $item)
                  <li class="list-group-item d-flex justify-content-between">
                    {{ $item->nama }} 

                    <button data-toggle="modal" data-whatever="{{ $item->id }}" data-target="#deleteCategory" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                   </li>
                  @empty
                  <li class="list-group-item text-center">Tidak ada kategori</li>
                  @endforelse
                  <li class="list-group-item"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" > <i class="fa fa-plus"></i> Tambah</button></li>
                </ul>
              </div>
            </div>

         
          </div>

      </div>
      <!-- /.container-fluid -->

        {{-- Modal create category --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="POST" action="{{ route('post_category.store') }}">
                @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label class="col-form-label">Nama Ketegori:</label>
                   <input type="text" name="nama" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
          </div>
        </div>


        {{-- modal delete category --}}
      <div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda akan menghapus kategori postingan.</div>
                <div class="modal-footer">
                  <form method="POST" action="{{ route('post_category.destroy','test') }}" class="form-inline">
                    @csrf
                    @method('delete')
                    <input type="hidden" id="id" name="id")>
                    <button type="submit" class="btn btn-primary">Ya</button>
                  </form>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

        {{-- modal delete post --}}
      <div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda akan menghapus postingan.</div>
                <div class="modal-footer">
                  <form method="POST" action="{{ route('post.destroy','test') }}" class="form-inline">
                    @csrf
                    @method('delete')
                    <input type="hidden" id="id" name="id")>
                    <button type="submit" class="btn btn-primary">Ya</button>
                  </form>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
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

<script>
  $('#deleteCategory').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#id').val(id)
})
  $('#deletePost').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#id').val(id)
})
</script>
@endpush
