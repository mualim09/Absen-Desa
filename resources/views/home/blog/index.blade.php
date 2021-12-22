@extends('layouts.home')
@section('title','Berita')

@section('content')
    
	

	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{ asset('images/'.$blog_pic->value) }});background-attachment:fixed;">
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

				<span class="txt29">
					Blog
				</span>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9">
					<div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
						<!-- Block4 -->

						
                        @foreach ($post as $item)
                        <div class="blo4 p-b-63">
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
								<a href="{{ route('blog.detail',$item->id) }}">
									<img src="{{ $item->picture }}">
								</a>

								<div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
                                        {{ date('d', strtotime($item->created_at)) }}
									</span>

									<span class="txt31">
										{{ date('F Y', strtotime($item->created_at)) }}
									</span>
								</div>
							</div>

							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
									<a href="{{ route('blog.detail',$item->id) }}" class="tit9">{{ $item->judul }}</a>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										by {{ $item->user->username }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										{{ date('d F Y', strtotime($item->created_at)) }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										@if(!empty( $item->category ))
											@forelse ($item->category as $post_category)
											{{ $post_category->nama }}
											<span class="m-r-6 m-l-4">|</span>
											@empty
												
											@endforelse
										@endif
									</span>

								</div>

								<p>
									{!!  (str_word_count($item->isi) > 60 ? substr($item->isi,0,200)." ..." : $item->isi)   !!}
								</p>
								<a href="{{ route('blog.detail',$item->id) }}" class="dis-block txt4 m-t-30">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
								</a>
							</div>
						</div>
                        @endforeach
					

						
						<!-- Pagination -->
						<div class="pagination flex-l-m flex-w m-l--6 p-t-25">
							{{ $post->links('pagination') }}
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
								<li class="bo5-b p-t-8 p-b-8">
									<a href="{{ route('blog') }}" class="txt27">
										Semua
									</a>
								</li>
                                @foreach ($category as $item)
							
								<li class="bo5-b p-t-8 p-b-8">
									<a href="{{ route('blog.category',$item->id) }}" class="txt27">
										{{ $item->nama }}
									</a>
								</li>
								
                                @endforeach

							</ul>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>


    
@endsection