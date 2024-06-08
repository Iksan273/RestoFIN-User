@extends('Layout.User')

@section('content')
    <main>

        <div class="hero_single inner_pages background-image" data-background="url({{ asset('resto/gallery7.jpg') }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>About Us</h1>
                            <p>Cooking delicious food since 2005</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <div class="pattern_2">
            <div class="container margin_120_100 home_intro">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-7" data-cue="slideInUp" data-delay="500">
                        <div class="main_title center">
                            <span><em></em></span>
                            <h2>Our Story</h2>
                            <p>Cum doctus civibus efficiantur in ex paulo elaboraret.</p>
                        </div>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum consectetur adipiscing elit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p><img src="{{ asset('resto/logo.png') }}" width="140" height="auto" alt=""
                                class="mt-3"></p>
                    </div>
                </div>
                <!--/row -->
            </div>
            <!--/container -->
        </div>
        <!--/pattern_2 -->

        <div class="bg_gray">
            <div class="container margin_120_100">
                <div class="row flex-lg-row-reverse">
                    <div class="col-lg-5 offset-lg-1 align-self-center mb-4 mb-md-0">
                        <div class="intro_txt" data-cue="slideInUp" data-delay="500">
                            <div class="main_title">
                                <span><em></em></span>
                                <h2>Kenapa memilih Vin Autism Gallery Resto</h2>
                            </div>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero
                                id nisi euismod, sed porta est consectetur deserunt.</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur.</p>
                            <p><a href="#reserve" class="btn_1 add_top_30" data-bs-toggle="modal"
                                    data-bs-target="#reservationModal">Pesan Makanan Sekarang</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box_how" data-cue="slideInUp">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_1.svg"
                                            alt="" width="100" height="110" class="lazy"></figure>
                                    <h3>For Every Taste</h3>
                                    <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus
                                        sollicitudin.</p>
                                </div>
                                <div class="box_how" data-cue="slideInUp">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_2.svg"
                                            alt="" width="100" height="110" class="lazy"></figure>
                                    <h3>Fresh Ingredients</h3>
                                    <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id
                                        vestibulum.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="box_how" data-cue="slideInUp">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_3.svg"
                                            alt="" width="100" height="110" class="lazy"></figure>
                                    <h3>Experienced Chefs</h3>
                                    <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat
                                        eros.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/container -->
        </div>
        <!--/pattern_2 -->

        <div class="call_section testimonials lazy" data-bg="url(img/bg_call_section_2.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h3 style="color: black;">Apa kata Pembeli</h3>
                        <div class="carousel_testimonials owl-carousel owl-theme">
                            <div>
                                <div class="box_overlay">
                                    <div class="pic">
                                        <figure><img src="img/testimonial_1.jpg" alt="" class="img-circle">
                                        </figure>
                                        <h4>Roberta<small>12 Oct</small></h4>
                                    </div>
                                    <div class="comment">
                                        "Mea ad postea meliore fuisset. Timeam repudiare id eum, ex paulo dictas elaboraret
                                        sed, mel cu unum nostrud."
                                    </div>
                                </div>
                                <!-- End box_overlay -->
                            </div>
                            <div>
                                <div class="box_overlay">
                                    <div class="pic">
                                        <figure><img src="img/testimonial_1.jpg" alt="" class="img-circle">
                                        </figure>
                                        <h4>Roberta<small>2 Nov</small></h4>
                                    </div>
                                    <div class="comment">
                                        "No nam indoctum accommodare, vix ei discere civibus philosophia. Vis ea dicant
                                        diceret ocurreret."
                                    </div>
                                </div>
                                <!-- End box_overlay -->
                            </div>
                            <div>
                                <div class="box_overlay">
                                    <div class="pic">
                                        <figure><img src="img/testimonial_1.jpg" alt="" class="img-circle">
                                        </figure>
                                        <h4>Roberta<small>3 Dec</small></h4>
                                    </div>
                                    <div class="comment">
                                        "No nam indoctum accommodare, vix ei discere civibus philosophia. Vis ea dicant
                                        diceret ocurreret."
                                    </div>
                                </div>
                                <!-- End box_overlay -->
                            </div>
                        </div>
                        <!-- End carousel_testimonials -->
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->

        <div class="pattern_2">
            <div class="container margin_120_100">
                <div class="main_title center mb-5">
                    <span><em></em></span>
                    <h2>Staff Vin Autism Gallery Resto</h2>
                </div>
                <div id="staff" class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="#0">
                            <div class="title">
                                <h4>Julia Holmes<em>Chef</em></h4>
                            </div><img src="img/staff/staff_1.jpg" alt="" width="350" height="500">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#0">
                            <div class="title">
                                <h4>Lucas Smith<em>Chef</em></h4>
                            </div><img src="img/staff/staff_2.jpg" alt="" width="350" height="500">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#0">
                            <div class="title">
                                <h4>Paul Stephens<em>Chef</em></h4>
                            </div><img src="img/staff/staff_3.jpg" alt="" width="350" height="500">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#0">
                            <div class="title">
                                <h4>Pablo Himenez<em>Chef</em></h4>
                            </div><img src="img/staff/staff_4.jpg" alt="" width="350" height="500">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#0">
                            <div class="title">
                                <h4>Andrew Stuttgart<em>Chef</em></h4>
                            </div><img src="img/staff/staff_5.jpg" alt="" width="350" height="500">
                        </a>
                    </div>
                </div>
                <!-- /carousel -->
            </div>
            <!--/container-->
        </div>
        <!--/pattern_2 -->

    </main>

    <!-- Modal Pesan -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vin Autism Gallery Resto</span></b>
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
