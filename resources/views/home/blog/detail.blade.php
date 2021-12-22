@extends('layouts.home')
@section('title','Berita')
@section('content')
    	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{ asset('images/'.$blog_pic->value) }}); background-attachment:fixed;">
		<h2 class="tit6 t-center">
			Berita
		</h2>
	</section>


	<!-- Content page -->
	<section>
		<div class="bread-crumb bo5-b p-t-17 p-b-17">
			<div class="container">
				<a href="{{ route('home') }}" class="txt27">
					Home
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<a href="{{ route('blog') }}" class="txt27">
					Blog
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<span class="txt29">
					{{ $post->judul }}
				</span>
			</div>
		</div>

		<div class="container">
			<div class="row ">
				<div class="col-md-8 col-lg-9">
					<div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
						<!-- Block4 -->
						<div class="blo4 p-b-63">
							<!-- - -->
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
								
									<img src="{{ $post->picture }}">
								

								<div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
                                        {{ date('d', strtotime($post->created_at)) }}
									</span>

									<span class="txt31">
										{{ date('F Y', strtotime($post->created_at)) }}
									</span>
								</div>
							</div>

							<!-- - -->
							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
									<a href="blog-detail.html" class="tit9">{{ $post->judul }}</a>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										by {{ $post->user->username }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										{{ date('d F Y', strtotime($post->created_at)) }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
									@if (!empty($post->category->nama))
										{{ $post->category->nama }}
										<span class="m-r-6 m-l-4">|</span>
									@endif
									</span>

								</div>

								<p>
									{!! $post->isi !!}
								</p>
							</div>
						</div>

					</div>
				</div>

				<div class="col-md-4 col-lg-3">
					<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
						<!-- Search -->
						<div class="search-sidebar2 size12 bo2 pos-relative">
							<input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
							<button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
						</div>

						<!-- Categories -->
						<div class="categories">
							<h4 class="txt33 bo5-b p-b-35 p-t-58">
								Categories
							</h4>

							<ul>
							@if (!empty($category))
								@foreach ($category as $item)
									<li class="bo5-b p-t-8 p-b-8">
									<a href="#" class="txt27">
										{{ $item->nama }}
									</li>
								@endforeach	
							@endif	
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

@endsection    
