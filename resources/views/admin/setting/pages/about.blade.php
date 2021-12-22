@extends('layouts.app')
@section('title','About')
@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->

        <div class="row">
          <div class="col-3">
            <a href="{{ route('page.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-md-8">
            <div class="card shadow mb-4 mt-3">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Halaman About</h6>
              </div>
              <div class="card-body">
                     <form method="POST" action="{{ route('setting.about.update') }}" enctype="multipart/form-data">
                      @csrf  
                     
                          <div class="form-group">
                            <label for="">Picture :</label>
                            <div class="input-group">
                              <button type="button" class="btn btn-sm btn-success" id="btn-ganti">Pilih Gambar</button>    
                              <img class="img-thumbnail mt-2 img-fluid {{ empty($about_pic->value) ? 'd-none' : '' }}" src="{{ !empty($about_pic->value) ? asset('images/'.$about_pic->value ) : '' }}" alt="" id="post-picture">
                              <input id="input-picture" type="file" name="about_pic" class="d-none">
                            </div>             
                        </div>
                         
                          <div class="form-group">
                            <label for="">Content :</label>
                            <textarea name="about" id="editor" >
                              {{ $about->value }}
                            </textarea>
                  
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
  
        post_picture.removeClass("d-none")
      });
  
  
    })
  </script>
@endpush
