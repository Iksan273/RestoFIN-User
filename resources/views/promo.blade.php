@extends('Layout.User')

@section('content')
    <main>

        <div class="hero_single inner_pages background-image" data-background="url({{ asset('resto/gallery4.jpg') }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Voucher Promo</h1>
                            <p>Vin Autism Gallery Resto</p>
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

        @foreach ($promo as $p)
            <div class="pattern_2">
                <div class="container margin_60_40" data-cues="slideInUp">
                    <div class="banner lazy" style="background-image: url({{ asset('' . $p->image_url . '') }});">
                        <div class="wrapper d-flex align-items-center justify-content-between opacity-mask">
                            <div>
                                <small>Tawaran Spesial</small>
                                <h3>{{ $p->title }}</h3>
                                <p>{{ $p->description }}</p>
                                <br>
                                <p>Promo Dimulai : {{ $p->start_date }}</p>
                                <p>Promo Berakhir : {{ $p->end_date }}</p>
                                <p>Point Digunakan : {{ $p->point_digunakan }}</p>
                                <p>Minimal Point : {{ $p->point_dibutuhkan }}</p>
                            </div>
                            <figure class="d-none d-lg-block"><img src="{{asset('resto/logo.png')}}" alt="" width="200"
                                    height="200" class="img-fluid"></figure>
                        </div>
                        <!-- /wrapper -->
                    </div>
                    <!-- /banner -->
                </div>
                <!-- /container -->
            </div>
        @endforeach
        <!-- /pattern_2 -->

        <!-- style -->
        <style>
            .banner {
                background-size: cover;
                background-position: center;
                padding: 20px;
                position: relative;
            }

            .opacity-mask {
                background-color: rgba(0, 0, 0, 0.5);
                padding: 20px;
            }

            .btn_1 {
                background-color: #ff9800;
                color: #fff;
                padding: 10px 20px;
                text-decoration: none;
                border-radius: 5px;
            }

            .description-div {
                margin-top: 20px;
                padding: 20px;
                background-color: #f5f5f5;
                border: 1px solid #ddd;
            }

            p {
                margin-bottom: 0px;
            }
        </style>
        <!-- /style -->

        <!-- script -->
        <script></script>
        <!-- /script -->

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
    </main>
@endsection
