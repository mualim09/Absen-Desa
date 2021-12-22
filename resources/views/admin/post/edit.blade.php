@extends('layouts.app')
@section('title','Edit Post')
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
          <div class="col-10">
            <div class="card shadow mb-4 mt-2">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
              </div>
              <div class="card-body">
                     <form class="d-flex flex-column" method="POST" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method("PUT")
                      
                        

                      

                          <div class="form-group mt-3">
                            <label for="">Judul :</label>
                            <input name="judul"  value="{{ $post->judul }}" type="text" class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="">Picture :</label>
                            <div class="input-group">
                              <button type="button" class="btn btn-sm btn-success" id="btn-ganti">Ganti Gambar</button>
                              <input id="input-picture" type="file" name="picture" class="d-none">
                            </div>
                          
                            <img id="post-picture" class="img-thumbnail mt-2 img-fluid" src="{{ $post->picture }}" alt=""> 
                           </div>

                          <div class="form-group">
                              </div>
 

                       

                        <div class="form-group">
                          <label for="">Kategori</label>
                          @forelse ($category as $item)
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" {{ $post->category->contains($item->id) ? 'checked' : '' }}  class="custom-control-input" id="{{ 'customCheck'.$loop->iteration }}" value="{{ $item->id }}" name="post_category_id[]">
                              <label class="custom-control-label" for="{{ 'customCheck'.$loop->iteration }}">{{ $item->nama }}</label>
                            </div>
                          @empty
                          <div class="alert alert-warning" role="alert">
                          Data kategori kosong! anda dapat menambahkan data kategori terlebih dahulu!
                          </div>
                          @endforelse
                          
                          @error('post_category_id')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror 
                        </div>
                         
                          <div class="form-group">
                            <label for="">Isi :</label>
                            <textarea name="isi" id="editor" >
                              {{ $post->isi }}
                            </textarea>

                              @error('isi')
                              <div class="alert alert-danger mt-2">{{ $message }}</div>
                              @enderror                        
                        </div>
                         
                         
                         
                      <div class="row mt-3">
                        <div class="col-12">  
                          <button class="btn btn-primary">Simpan</button>
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

<script>
  const post_picture= $("#post-picture");
  const button_ganti= $("#btn-ganti");
  const input_picture=  $("#input-picture");

  $(function(){
   button_ganti.on("click",function(){
    input_picture.trigger("click")
    });

    input_picture.on("change",function(){
      var reader = new FileReader();
          
      reader.onload = function(e) {
      post_picture.attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]); // convert to base64 string
    });


  })



</script>
@endpush
