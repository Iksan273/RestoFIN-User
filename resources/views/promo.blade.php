@extends('Layout.User')

@section('content')
    <main>

        <div class="hero_single inner_pages background-image" data-background="url(img/hero_menu.jpg)">
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

        <div class="pattern_2">
            <div class="container margin_60_40" data-cues="slideInUp">
                <div class="banner lazy" style="background-image: url('img/banner_bg.jpg');">
                    <div class="wrapper d-flex align-items-center justify-content-between opacity-mask">
                        <div>
                            <small>Special Offer</small>
                            <h3>Burgher Menu $18 only</h3>
                            <p>Hamburgher, Chips, Mix Sausages, Beer, Muffin</p>
                            <a href="#" class="btn_1" data-bs-toggle="modal" data-bs-target="#detailPromo">Lihat
                                Detail Voucher</a>
                        </div>
                        <figure class="d-none d-lg-block"><img src="img/banner.svg" alt="" width="200"
                                height="200" class="img-fluid"></figure>
                    </div>
                    <!-- /wrapper -->
                </div>
                <!-- /banner -->
            </div>
            <!-- /container -->
        </div>
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
        </style>
        <!-- /style -->

        <!-- script -->
        <script></script>
        <!-- /script -->

        <!-- Modal Promo -->
        <div class="modal fade" id="detailPromo" tabindex="-1" aria-labelledby="detailPromoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('index') }}" class="d-flex align-items-center">
                                <b><span>Detail Voucher</span></b>
                            </a>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda dapat melakukan reservasi atau melakukan pemesanan makanan sekarang.</p>
                        {{-- <div class="text-center">
                            <a href="/reservation" class="btn_1">Reservasi</a>
                            <a href="{{ route('nomor-meja') }}" class="btn_1">Pesan Makanan</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal Promo -->

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
