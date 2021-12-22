@extends('layouts.app')
@section('title','Carousel')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          
        <div class="row">
            <div class="col-3">
              <a href="{{ route('carousel.index') }}" class="btn btn-lg btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
              <form id="input-form" method="POST" action="{{ route('carousel.store') }}" enctype="multipart/form-data">
                @csrf  
                <div class="form-group">
                  <label for="">Picture :</label>
                 
                    <div class="input-group">
                      <button type="button" class="btn btn-sm btn-success" id="btn-ganti">Pilih Gambar</button>    
                      <img class="img-thumbnail mt-2 img-fluid {{ empty($gallery_pic->value) ? 'd-none' : '' }}" src="{{ !empty($gallery_pic->value) ? asset('images/'.$gallery_pic->value ) : '' }}" alt="" id="post-picture">
                      <input id="input-picture" type="file" name="picture" class="d-none">
                    </div>    
                    
              </div>
                   
                   
                <div class="row mt-3">
                  <div class="col-12">  
                    <button id="btn-simpan" type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
            
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
    
 
<script>

  const post_picture= $("#post-picture");
    const button_ganti= $("#btn-ganti");
    const input_picture=  $("#input-picture");
    const button_submit=$('#btn-simpan');
    const input_form=$('#input-form');
  
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

      button_submit.click(function() {
        $(this).attr('disabled', true);
        input_form.submit();
      });

      
    
  
    })
  </script>
@endpush
