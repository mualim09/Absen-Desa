<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BEM SAR | @yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <!--===============================================================================================-->

    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/vendor/bootstrap/css/bootstrap.min.css') }}"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/fonts/themify/themify-icons.css') }}"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/home/vendor/animate/animate.css') }}" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/vendor/css-hamburgers/hamburgers.min.css') }}"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/vendor/animsition/css/animsition.min.css') }}"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/vendor/select2/select2.min.css') }}"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/vendor/daterangepicker/daterangepicker.css') }}"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/home/vendor/slick/slick.css') }}" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('asset/home/vendor/lightbox2/css/lightbox.min.css') }}"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/home/css/util.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/home/css/main.css') }}" />
    <!--===============================================================================================-->
  </head>

  <body class="animsition">
    <!-- Header -->
          <header>
            <!-- Header desktop -->
            <div class="wrap-menu-header gradient1 trans-0-4">
              <div class="container h-full">
                <div class="wrap_header trans-0-3">
                  <!-- Logo -->
                  <div class="logo">
                    <a href="index.html">
                      <img
                        src="{{ asset('images/logo.png') }}"
                        alt="IMG-LOGO"
                        data-logofixed="{{ asset('images/logo.png') }}"
                      />
                    </a>
                  </div>

                  <!-- Menu -->
                  <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">
                      <ul class="main_menu">
                        <li>
                          <a href="{{ route('home') }}">Home</a>
                        </li>
                        
                        <li>
                          <a href="{{ route('about') }}">About</a>
                        </li>
                        <li>
                          <a href="{{ route('blog') }}">Berita</a>
                        </li>
                        <li>
                          <a href="{{ route('demisioner') }}">Anggota</a>
                        </li>
                        <li>
                          <a href="{{ route('demisioner') }}">Demisioner</a>
                        </li>
                        <li>
                          <a href="{{ route('gallery') }}">Gallery</a>
                        </li>
                      </ul>
                    </nav>
                  </div>

                  <!-- Social -->
                  <div class="social flex-w flex-l-m p-r-20">
                    <a href="{{ $facebook->value }}"
                      ><i class="fa fa-facebook m-l-21" aria-hidden="true"></i
                    ></a>
                    <a href="#"
                      ><i class="fa fa-twitter m-l-21" aria-hidden="true"></i
                    ></a>
                    <a href="{{ $instagram->value }}"
                      ><i class="fa fa-instagram m-l-21" aria-hidden="true"></i
                    ></a>

                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                  </div>
                </div>
              </div>
            </div>
          </header>

         <!-- Sidebar -->
         <aside class="sidebar trans-0-4">
          <!-- Button Hide sidebar -->
          <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>
    
          <!-- - -->
          <ul class="menu-sidebar p-t-95 p-b-70">
            <li class="t-center m-b-13">
              <a href="{{ route('home') }}" class="txt19">Home</a>
            </li>
    
    
            <li class="t-center m-b-13">
              <a href="{{ route('blog') }}" class="txt19">Berita</a>
            </li>
    
            <li class="t-center m-b-13">
              <a href="{{ route('about') }}" class="txt19">About</a>
            </li>
            <li class="t-center m-b-13">
              <a href="{{ route('about') }}" class="txt19">Anggota</a>
            </li>
            <li class="t-center m-b-13">
              <a href="{{ route('about') }}" class="txt19">Demisioner</a>
            </li>
            
            <li class="t-center m-b-13">
              <a href="{{ route('gallery') }}" class="txt19">Gallery</a>
            </li>

            @foreach ($pages as $item)
              <li class="t-center m-b-13">
                <a href="{{ route('page',$item->nama) }}" class="txt19">{{ $item->nama }}</a>
              </li>
            @endforeach
           
    
    
          
          </ul>
    
          <!-- - -->
          <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
            <!-- - -->
            <h4 class="txt20 m-b-33">Gallery</h4>
    
            <!-- Gallery -->
            <div class="wrap-gallery-sidebar flex-w">
              @foreach ($gallery as $item)
                <a
                class="item-gallery-sidebar wrap-pic-w"
                href="{{ $item->picture }}"
                data-lightbox="gallery-footer"
              >
                <img src="{{ $item->picture }}" alt="GALLERY" />
              </a>
              @endforeach
            
    
            </div>
          </div>
        </aside>

    @yield('content')
   
    <!-- Footer -->
    <footer class="bg1">
      <div class="container p-t-40 p-b-70">
        <div class="row justify-content-around">
          <div class="col-sm-6 col-md-4 p-t-50">
            <!-- - -->
            <h4 class="txt13 m-b-33">Contact Us</h4>

            <ul class="m-b-70">
              <li class="txt14 m-b-14">
                <i
                  class="fa fa-map-marker fs-16 dis-inline-block size19"
                  aria-hidden="true"
                ></i>
                {{ $alamat->value }}
              </li>

              <li class="txt14 m-b-14">
                <i
                  class="fa fa-phone fs-16 dis-inline-block size19"
                  aria-hidden="true"
                ></i>
                {{ $phone->value }}
              </li>

              <li class="txt14 m-b-14">
                <i
                  class="fa fa-envelope fs-13 dis-inline-block size19"
                  aria-hidden="true"
                ></i>
               {{$email->value}}
              </li>
            </ul>
          </div>

          <div class="col-sm-6 col-md-4 p-t-50">
            <!-- - -->
            <h4 class="txt13 m-b-38">Gallery</h4>

            <!-- Gallery footer -->
            <div class="wrap-gallery-footer flex-w">
              @foreach ($gallery as $item)
                  
              <a
                class="item-gallery-footer wrap-pic-w"
                href="{{ $item->picture }}"
                data-lightbox="gallery-footer"
              >
                <img src="{{ $item->picture }}" alt="GALLERY" />
              </a>

              @endforeach

            </div>
          </div>
        </div>
      </div>

      <div class="end-footer bg2">
        <div class="container">
          <div class="flex-sb-m flex-w p-t-22 p-b-22">
            <div class="p-t-5 p-b-5">
              <a href="{{ $facebook->value }}" class="fs-15 c-black"
                ><i class="fa fa-facebook m-l-18" aria-hidden="true"></i
              ></a>
              <a href="#" class="fs-15 c-black"
                ><i class="fa fa-twitter m-l-18" aria-hidden="true"></i
              ></a>
              <a href="{{ $instagram->value }}" class="fs-15 c-black"
                ><i class="fa fa-instagram m-l-18" aria-hidden="true"></i
              ></a>
            </div>

            <div class="txt17 p-r-20 p-t-5 p-b-5 text-dark">
              Copyright &copy; BEM STMIK Amik Riau {{ date('Y') }} All rights reserved
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
      <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
      </span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

    <!-- Modal Video 01-->
    <div
      class="modal fade"
      id="modal-video-01"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document" data-dismiss="modal">
        <div
          class="close-mo-video-01 trans-0-4"
          data-dismiss="modal"
          aria-label="Close"
        >
          &times;
        </div>

        <div class="wrap-video-mo-01">
          <div class="w-full wrap-pic-w op-0-0">
            <img src="images/icons/video-16-9.jpg" alt="IMG" />
          </div>
          <div class="video-mo-01">
            <iframe
              src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0"
              allowfullscreen
            ></iframe>
          </div>
        </div>
      </div>
    </div>

    <!--===============================================================================================-->
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/jquery/jquery-3.2.1.min.js') }}"
    ></script>
    <!--===============================================================================================-->
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/animsition/js/animsition.min.js') }}"
    ></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/home/vendor/bootstrap/js/popper.js') }}"></script>
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/bootstrap/js/bootstrap.min.js') }}"
    ></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/home/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/daterangepicker/moment.min.js') }}"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/daterangepicker/daterangepicker.js') }}"
    ></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/home/vendor/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/home/js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/parallax100/parallax100.js') }}"
    ></script>
    <script type="text/javascript">
      $(".parallax100").parallax100();
    </script>
    <!--===============================================================================================-->
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/countdowntime/countdowntime.js') }}"
    ></script>
    <!--===============================================================================================-->
    <script
      type="text/javascript"
      src="{{ asset('asset/home/vendor/lightbox2/js/lightbox.min.js') }}"
    ></script>
    <!--===============================================================================================-->
    @stack('gallery')

    <script src="{{ asset('asset/home/js/main.js') }}"></script>
    @include('sweetalert::alert')
  </body>
</html>
