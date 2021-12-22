@extends('layouts.home')
@section('title','About')
    
@section('content')
    

	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{ $page->picture }}); background-attachment:fixed;">
		<h2 class="tit6 t-center">
			{{ $page->nama }}
		</h2>
	</section>


	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
		{{-- <span class="tit2 t-center">
			{{ $page->judul }}
		</span> --}}

		<h3 class="tit3 t-center m-b-35 m-t-5">
			{{ $page->judul }}	
		</h3>

		<p class="t-center size32 m-l-r-auto">
			{!! $page->content !!}
		</p>
	</section>



	<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-85 p-b-85">
	
	</div>
@endsection