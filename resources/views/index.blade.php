@extends('Layout.User')

@section('content')
    <main>
        <div class="hero_single version_2 background-image" data-background="url({{ asset('resto/gallery9.jpg') }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h3>Vinautism Art & Resto</h3>
                            <p><span class="element"></span></p>
                            <a href="#reserve" class="btn_1 add_top_30" data-bs-toggle="modal"
                                data-bs-target="#reservationModal">Pesan Makanan Sekarang</a>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <!--banners_grid -->
        <ul id="banners_grid" class="clearfix">
            <li>
                <a href="{{ route('list-menu') }}" class="img_container">
                    <img src="{{ asset('resto/gallery3.jpg') }}" data-src="{{ asset('resto/gallery3.jpg') }}" alt=""
                        class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Daftar Menu</h3>
                        <p>Lihat daftar menu Resto kami</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="order-food.html" class="img_container">
                    <img src="{{ asset('resto/gallery2.jpeg') }}" data-src="{{ asset('resto/gallery4.jpg') }}"
                        alt="" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Promo</h3>
                        <p>Promo dari Resto kami untuk Anda</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="gallery.html" class="img_container">
                    <img src="{{ asset('resto/gallery.jpeg') }}" data-src="{{ asset('resto/gallery8.jpg') }}" alt=""
                        class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Gallery</h3>
                        <p>Lihat Gallery dari Resto kami</p>
                    </div>
                </a>
            </li>
        </ul>
        <!--/banners_grid -->

        <div class="pattern_2">
            <div class="container margin_120_100 home_intro">
                <div class="row justify-content-center d-flex align-items-center">
                    <div class="col-lg-5 text-lg-center d-none d-lg-block" data-cue="slideInUp" style="margin-right: 20px;">
                        <figure>
                            <img src="{{asset('resto/gallery.jpeg')}}" data-src="{{asset('resto/gallery.jpeg')}}" width="auto" height="auto"
                                alt="" class="img-fluid lazy">
                            <a href="https://drive.google.com/file/d/1h6TjwMySaDBjDhOCZxsD-pR7T5yCh5AD/preview" class="btn_play" data-cue="zoomIn"
                                data-delay="500"><span class="pulse_bt"><i class="arrow_triangle-right"></i></span></a>
                        </figure>
                    </div>
                    <div class="col-lg-5 pt-lg-4" data-cue="slideInUp" data-delay="500">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Some words about us</h2>
                            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                        </div>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p><img src="{{asset('resto/logo.png')}}" width="140" height="auto" alt="" class="mt-3"></p>
                    </div>
                </div>
                <!--/row -->
            </div>
            <!--/container -->
        </div>
        <!--/pattern_2 -->

        <div class="bg_gray">
            <div class="container margin_120_100" data-cue="slideInUp">
                <div class="main_title center mb-5">
                    <span><em></em></span>
                    <h2>Our Daily Voucher</h2>
                </div>
                <!-- /main_title -->
                <div class="banner lazy" data-bg="url(https://resto.bemubaya.com/promo/images/{{ $promo->image_url }})">
                    <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                        data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div>
                            <small>Tawaran Spesial</small>
                            <h3>{{ $promo->title }}</h3>
                            <p style="margin-bottom: 0px;">{{ $promo->description }}</p>
                            <br>
                            <p style="margin-bottom: 0px;">Promo Dimulai : {{ $promo->start_date }}</p>
                            <p style="margin-bottom: 0px;">Promo Berakhir : {{ $promo->end_date }}</p>
                            <p style="margin-bottom: 0px;">Point Digunakan : {{ $promo->point_digunakan }}</p>
                            <p style="margin-bottom: 0px;">Minimal Point : {{ $promo->point_dibutuhkan }}</p>
                            <br>
                            <a href="{{ route('promo') }}" class="btn_1">Lihat Voucher Lainnya</a>
                        </div>
                        <figure class="d-none d-lg-block"><img src="{{asset('resto/logo.png')}}" alt="" width="200"
                                height="200" class="img-fluid"></figure>
                    </div>
                    <!-- /wrapper -->
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_gray -->

        <div class="call_section lazy" data-bg="url(img/bg_call_section.jpg)">
            <div class="container clearfix">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 text-center">
                        <div class="box_1" data-cue="slideInUp">
                            <h2>Celebrate<span>a Special Event with us!</span></h2>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            <a href="{{route('information')}}" class="btn_1 mt-3">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->
    </main>

    <!-- Modal Pesan -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vinautism Art & Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda dapat melakukan reservasi atau melakukan pemesanan makanan sekarang.</p>
                    <div class="text-center">
                        <a href="{{ route('reservation') }}" class="btn_1">Reservasi</a>
                        @if (!Auth::user())
                            <a href="{{ route('login') }}" class="btn_1">Pesan Makanan</a>
                        @else
                            <a href="{{ route('menu-order') }}" class="btn_1">Pesan Makanan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Pesan -->
@endsection
