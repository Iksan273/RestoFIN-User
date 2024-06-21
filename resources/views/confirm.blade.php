@extends('Layout.User')

@section('content')
    <main class="pattern_2">

        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box_booking_2" style="margin-top: 20px;">
                        <div class="head">
                            <div class="title">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset('resto/logo.png') }}" alt=""
                                        style="width: auto; height: auto; max-width: 140px; max-height: 35px; margin-top: -5px">
                                </a>
                            </div>
                            <h3 style="font-size: 16px; margin-top: 10px;">Vinautism Art & Resto</h3>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div id="confirm">
                                <div class="icon icon--order-success svg add_bottom_15">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                                        <g fill="none" stroke="#8EC343" stroke-width="2">
                                            <circle cx="36" cy="36" r="35"
                                                style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                            <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                                style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                        </g>
                                    </svg>
                                </div>
                                <h3>Berhasil Order!</h3>
                                <p>Tunggu konfirmasi, terima kasih.</p>
                            </div>
                            <a class="btn_1 full-width mb_5" href="{{ route('menu-order') }}">Kembali ke Halaman Menu</a>
                            <a class="btn_1 full-width mb_5" href="{{ route('index') }}">Kembali ke Halaman Utama</a>
                        </div>
                    </div>
                    <!-- /box_booking -->
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

    </main>
@endsection
