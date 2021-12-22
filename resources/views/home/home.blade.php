@extends('layouts.home')
@section('title','Home')
    
@section('content')
  
  
      <!-- Slide1 -->
      <section class="section-slide">
        <div class="wrap-slick1">
          <div class="slick1">

            @foreach ($carousel as $item)
                
            <div
              class="item-slick1 item1-slick1"
              style="background-image: url({{ $item->picture }})"
            >
              <div
                class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170"
              >
                <span
                  class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                  data-appear="fadeInDown"
                >
                  Welcome to
                </span>
  
                <h2
                  class="caption2-slide1 tit1 t-center animated visible-false m-b-37"
                  data-appear="fadeInUp"
                >
                  BEM SAR
                </h2>
  
                <div
                  class="wrap-btn-slide1 animated visible-false"
                  data-appear="zoomIn"
                >
                  <!-- Button1 -->
                  <a href="{{ route('about') }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                    Explore
                  </a>
                </div>
              </div>
            </div>

            
            @endforeach
           
          </div>
  
          <div class="wrap-slick1-dots"></div>
        </div>
      </section>
  
      <!-- Welcome -->
      <section class="section-welcome bg1-pattern p-t-120 p-b-105">
        <div class="container">
          <div class="row">
            <div class="col-md-6 p-t-45 p-b-30">
              <div class="wrap-text-welcome t-center">
                <span class="tit2 t-center"> Badan Eksekutif Mahasiswa </span>
  
                <h3 class="tit3 t-center m-b-35 m-t-5">STMIK Amik Riau</h3>
  
                <p class="t-center m-b-22 size3 m-l-r-auto">
                  {!!  (str_word_count($about->value) > 60 ? substr($about->value,0,200)." ..." : $about->value)   !!}
                </p>
  
                <a href="{{ route('about') }}" class="txt4">
                  Read more
                  <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                </a>
              </div>
            </div>
  
            <div class="col-md-6 p-b-30">
              <div
                class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto"
              >
                <img src="{{ asset('images/'.$about_pic->value) }}" alt="IMG-OUR" />
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Intro -->
      <section class="section-intro">
        <div
          class="header-intro quote_bg100 t-center p-t-135 p-b-158"
          style="background-image: url({{ asset('images').'/'.$quote_bg->value }})"
        >

        <blockquote class="blockquote text-center">
          <p class="mb-0 tit4 t-center p-l-15 p-r-15 p-t-3">{{ $quote->value }}</p>
          <footer class="blockquote-footer tit-custom p-l-15 p-r-15"> <cite title="Source Title">{{ $quote_author->value }}</cite></footer>
        </blockquote>
  
         {{-- <span class="tit2 p-l-15 p-r-15">  </span>
          <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
            {{ $quote_bg_text->value }}
          </h3> --}}
        </div>
  
        <div class="content-intro bg-white p-t-77 p-b-133">
          <div class="container">
            <div class="row">

              @foreach ($post as $item)
                  
              <div class="col-md-4 p-t-30">
                <!-- Block1 -->
                <div class="blo1">
                  <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                    <a href="{{ route('blog.detail',$item->id) }}"
                      ><img style="height:250px;" src="{{ $item->picture }}" alt="IMG-INTRO"
                    /></a>
                  </div>
  
                  <div class="wrap-text-blo1 p-t-35">
                    <a href="{{ route('blog.detail',$item->id) }}">
                      <h4 class="txt5 color0-hov trans-0-4 m-b-13">
                        {{ $item->judul }}
                      </h4>
                    </a>
  
                    <p class="m-b-20">
                      {!!  (str_word_count($item->isi) > 60 ? substr($item->isi,0,200)." ..." : $item->isi)   !!}
                    </p>
  
                    <a href="{{ route('blog.detail',$item->id) }}" class="txt4">
                      Read More
                      <i
                        class="fa fa-long-arrow-right m-l-10"
                        aria-hidden="true"
                      ></i>
                    </a>
                  </div>
                </div>
              </div>

              
              @endforeach
  
            </div>
          </div>
        </div>
      </section>
  
@endsection