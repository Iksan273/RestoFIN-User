@extends('Layout.User')

@section('content')
    <!-- main -->
    <main class="pattern_2" style="background-color: #CEBEA5">

        <div class="container margin_60_40">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: -5px;">
                    {{ session('success') }}
                    <button type="button" class="close-custom" onclick="this.parentElement.style.display='none';"
                        aria-label="Close">
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: -5px;">
                    {{ session('error') }}
                    <button type="button" class="close-custom" onclick="this.parentElement.style.display='none';"
                        aria-label="Close">
                    </button>
                </div>
            @endif
            <form id="orderForm" action="{{ route('checkout.order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8" style="margin-top: 20px">
                        <div class="box_booking_2 style_2">
                            <div class="head">
                                <div class="title">
                                    <h3>Personal Details</h3>
                                </div>
                            </div>
                            <!-- /head -->
                            <div class="main">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" placeholder="(Optional)" name="customer_name"
                                        value="{{ auth()->user() ? auth()->user()->firstname . ' ' . auth()->user()->lastname : '' }}"
                                        @if (auth()->check()) readonly @endif>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="form-control" placeholder="(Optional)" name="customer_email"
                                                value="{{ auth()->user()->email ?? '' }}"
                                                @if (auth()->check()) readonly @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" placeholder="(Optional)" name="customer_phone"
                                                value="{{ auth()->user()->phone ?? '' }}"
                                                @if (auth()->check()) readonly @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /box_booking -->
                        <div class="box_booking_2 style_2">
                            <div class="head">
                                <div class="title">
                                    <h3>Payment Method</h3>
                                </div>
                            </div>
                            <!-- /head -->
                            <div class="main">
                                <!--End row -->
                                <div class="payment_select">
                                    <label class="container_radio">Bayar dengan Cash
                                        <input type="radio" value="Bayar dengan Cash" name="payment_method">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="payment_select">
                                    <label class="container_radio">Bayar dengan Debit Card
                                        <input type="radio" value="Bayar dengan Debit Card" name="payment_method">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="payment_select">
                                    <label class="container_radio">Bayar dengan QRIS
                                        <input type="radio" value="Bayar dengan QRIS" name="payment_method">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /box_booking -->
                    </div>
                    <!-- /col -->
                    <div class="col-xl-4 col-lg-4" id="sidebar_fixed" style="margin-top: 20px">
                        <div class="box_booking">
                            <div class="head">
                                <h3>Order Summary</h3>
                            </div>
                            <!-- /head -->
                            <div class="main">
                                @if (isset($cart) && count($cart) > 0)
                                    <ul class="clearfix">
                                        @foreach ($cart as $id => $item)
                                            <li>
                                                <a>{{ $item['quantity'] }}x {{ $item['title'] }}</a>
                                                <div class="price" style="text-align: end;"><strong>Rp.
                                                        {{ number_format($item['price'], 0, ',', '.') }}</strong></div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="clearfix">
                                        <li>Subtotal<span><strong>Rp.
                                                    {{ number_format($subtotal, 0, ',', '.') }}</strong></span></li>
                                        <li>Pajak - 10%<span><strong>Rp.
                                                    {{ number_format($tax, 0, ',', '.') }}</strong></span>
                                        </li>
                                        <li class="total">Total<span><strong>Rp.
                                                    {{ number_format($total, 0, ',', '.') }}</strong></span></li>
                                    </ul>
                                    <div class="form-group" style="margin-top: -10px">
                                        <label>Nomor Meja</label>
                                        <input class="form-control" placeholder="Masukkan Nomor Meja Anda"
                                            name="nomor_meja">
                                    </div>
                                    <a class="btn_1 full-width mb_5" onclick="order()">Order Now</a>
                                @else
                                    <ul class="clearfix">
                                        <h3 style="font-size: 20px;">Keranjang kosong</h3>
                                    </ul>
                                    <ul class="clearfix">
                                        <li>Subtotal<span><strong>Rp. 0</strong></span></li>
                                        <li>Pajak - 10%<span><strong>Rp. 0</strong></span>
                                        </li>
                                        <li class="total">Total<span><strong>Rp. 0</strong></span></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <a class="btn_1 full-width mb_5" href="{{ route('menu-order') }}">Kembali ke Halaman Menu</a>
                        <!-- /box_booking -->
                    </div>
            </form>
        </div>
        <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->

    <!-- style -->
    <style>
        /* style session success & error */
        .close-custom {
            background: none;
            border: none;
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
            padding: 1rem 1rem;
            line-height: 1;
        }

        .close-custom:before {
            content: '\00d7';
            /* Unicode for multiplication sign (×) */
        }
    </style>
    <!-- /style -->

    <script>
        function order() {
            event.preventDefault(); // Mencegah submit form otomatis
            var formData = document.getElementById('orderForm');
            formData.submit();
        }
    </script>
@endsection
