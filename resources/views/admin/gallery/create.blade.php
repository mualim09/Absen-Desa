@extends('layouts.app')
@section('title','Gallery')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          
        <div class="row">
            <div class="col-3">
              <a href="{{ route('gallery.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="row mt-3">
         
            <div class="col-md-6">
                <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label for="">Picture</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>  
                          @error('picture')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror                        
                    </div>

                    <div class="form-group">
                      <label for="">Kategori</label>
                      <div class="input-group"s>
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select name="gallery_categories_id" class="custom-select" id="inputGroupSelect01">
                          <option value="" selected>Choose...</option>
                          @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach   
                        </select>
                      </div>
                      @error('gallery_categories_id')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                      @enderror 
                    </div>
                    <div class="form-group"><button type="submit" class="btn btn-primary">Submit</button></div>
                </form>
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
