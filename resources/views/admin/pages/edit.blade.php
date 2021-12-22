@extends('layouts.app')
@section('title','Tambah Post')
@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->

        <div class="row">
          <div class="col-3">
            <a href="{{ route('post.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card shadow mb-4 mt-3">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
              </div>
              <div class="card-body">
                     <form class="d-flex flex-column" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                      @csrf
                        
                         <div class="align-self-center d-flex flex-column">
                           <img class="img-post img-thumbnail" src="{{ $post->picture }}" alt=""> 
                           <a href="" class="btn btn-success">Ganti Gambar</a>
                         </div>

                      

                          <div class="form-group mt-5">
                            <label for="">Judul post : </label>
                            <input name="judul"  value="{{ $post->judul }}" type="text" class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>

                       

                        <div class="form-group">
                          <label for="">Kategori</label>
                          <div class="input-group"s>
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select name="post_category_id" class="custom-select" id="inputGroupSelect01">
                              <option value="" selected>Choose...</option>
                              @foreach ($category as $item)
                                <option {{ $item->id==$post->post_category_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                              @endforeach   
                            </select>
                          </div>
                          @error('post_category_id')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror 
                        </div>
                         
                          <div class="form-group">
                            <label for="">Isi</label>
                            <textarea name="isi" id="editor" >
                              {{ $post->isi }}
                            </textarea>

                              @error('isi')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                              @enderror                        
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


@push('ckeditor')
<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
@endpush

@push('ckeditor-script')
<script>
    ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
</script>
@endpush
