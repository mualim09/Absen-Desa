@extends('layouts.app')
@section('title','Carousel')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="row">
            <div class="col-3">
              <a href="{{ route('setting.home') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-3">
              <a href="{{ route('carousel.create') }}" class="btn btn-sm btn-primary"> <i class="fas fa-upload"></i> Upload gambar</a>
            </div>
          </div>
        
          <div class="row mt-3">
            @foreach ($carousel as $item)

              <div class="col-12 col-md-3">

                <div class="card mr-3 mb-5">
                  <img src="{{ $item->picture }}" style="height:200px;" class="card-img-top img-fluid" alt="...">
                  <div class="card-body text-center">
                    <button data-target="#deleteCarousel" data-whatever="{{ $item->id }}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                </div>

              </div>
              
              @endforeach
          </div>
          
        </div>
      <!-- /.container-fluid -->
        {{-- modal delete post --}}
        <div class="modal fade" id="deleteCarousel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda akan menghapus gambar.</div>
                <div class="modal-footer">
                  <form method="POST" action="{{ route('carousel.destroy','gas') }}" class="form-inline">
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
@push('carousel')
    <script>
        $('#deleteCarousel').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#id').val(id)
        })
    </script>
@endpush
