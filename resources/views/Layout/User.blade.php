<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Foores - Single Restaurant Version">
    <meta name="author" content="Ansonika">
    <title>VIN Restaurant</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-... (nilai hash)" crossorigin="anonymous" />


    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('assets/css/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('assets/css/wizard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/shop.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Page Preload -->

    <header class="header clearfix element_to_stick">
        <div class="container-fluid">
            <div id="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('resto/logo.png') }}"
                        style="width: auto; height: auto; max-width: 140px; max-height: 35px;" alt=""
                        class="logo_normal">
                    <img src="{{ asset('resto/logo.png') }}"
                        style="width: auto; height: auto; max-width: 140px; max-height: 35px;" alt=""
                        class="logo_sticky">
                </a>
            </div>
            <ul id="top_menu">
                @if (!Auth::user())
                    <li><a href="{{ route('login-2') }}" class="profile_bt"></a></li>
                @else
                    <li><a href="{{ route('profile') }}" class="profile_bt"></a></li>
                @endif
                <li>
                    <div class="dropdown dropdown-cart">
                        <a href="{{ route('cart') }}" class="cart_bt">
                            <strong
                                id="cart-item-count">{{ isset($cart) && count($cart) > 0 ? count($cart) : '0' }}</strong>
                        </a>
                        <div class="dropdown-menu">
                            <ul id="cart-items" class="cart-items-list">
                                @if (isset($cart) && count($cart) > 0)
                                    @foreach ($cart as $id => $item)
                                        <li data-id="{{ $id }}">
                                            <figure>
                                                <img src="https://resto.bemubaya.com/menu/images/{{ $item['imageUrl'] }}"
                                                    alt="" width="50" height="50" class="lazy">
                                            </figure>
                                            <div class="item-details">
                                                <strong>
                                                    <span>{{ $item['quantity'] }}x</span>
                                                    <span class="title">{{ $item['title'] }}</span>
                                                </strong>
                                                <span class="price">Rp.
                                                    {{ number_format($item['price'], 0, ',', '.') }}</span>
                                                <a class="action" onclick="removeRow(this, '{{ $id }}')"><i
                                                        class="icon_trash_alt"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <strong><span>Keranjang Kosong</span></strong>
                                    </li>
                                @endif
                            </ul>

                            <div class="total_drop" style="margin-top: 10px;">
                                <div class="clearfix add_bottom_15">
                                    <strong>Transaksi</strong>
                                    <span id="transaction">Rp.
                                        {{ isset($transaction) ? number_format($transaction, 0, ',', '.') : '0' }}</span>
                                </div>
                                <div class="clearfix add_bottom_15">
                                    <strong>Pajak - 10%</strong>
                                    <span id="tax">Rp.
                                        {{ isset($tax) ? number_format($tax, 0, ',', '.') : '0' }}</span>
                                </div>
                                <div class="clearfix add_bottom_15">
                                    <strong>Total</strong>
                                    <span id="total">Rp.
                                        {{ isset($total) ? number_format($total, 0, ',', '.') : '0' }}</span>
                                </div>
                                <a href="{{ route('cart') }}" class="btn_1 outline">View Cart</a>
                                <a href="{{ route('checkout') }}" class="btn_1 outline">Checkout</a>
                            </div>
                        </div>

                    </div>
                    <!-- /dropdown-cart-->
                </li>
            </ul>
            <!-- /top_menu -->
            <a class="open_close">
                <i class="icon_menu"></i><span>Menu</span>
            </a>
            <nav class="main-menu">
                <div id="header_menu">
                    <a class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="{{ route('index') }}"><img src="{{ asset('resto/logo.png') }}" alt=""
                            style="width: auto; height: auto; max-width: 140px; max-height: 35px;"></a>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('index') }}" class="show-submenu">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('list-menu') }}">Daftar Menu</a>
                    </li>
                    <li>
                        <a href="{{ route('promo') }}" class="show-submenu">Promo</a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}" class="show-submenu">Gallery</a>
                    </li>
                    <li class="submenu">
                        <a class="show-submenu">About Us</a>
                        <ul>
                            <li><a href="{{ route('information') }}">Information & Contact</a></li>
                            <li><a href="{{ route('carrerhistory') }}">Career & History</a></li>
                            <li><a href="{{ route('review') }}">Kritik & Saran</a></li>
                            <li><a
                                    href="https://www.google.co.id/maps/place/Vin+Autism+Gallery/@-7.2950762,112.6521202,17z/data=!4m8!3m7!1s0x2dd7fdc112922645:0xc953059a61c6938!8m2!3d-7.2950762!4d112.6546951!9m1!1b1!16s%2Fg%2F11jr53fzzx?entry=ttu">Review
                                    Google</a></li>
                        </ul>
                    </li>
                    @can('customer')
                        <li>
                            <a href="{{ route('struk') }}" class="show-submenu">Struk Online</a>
                        </li>
                    @endcan
                    <li><a href="{{ route('reservation') }}" class="btn_top">Reservations</a></li>
                    <li><a href="{{ route('cart') }}" class="btn_tc">Cart</a></li>
                    @if (!Auth::user())
                        <li><a href="{{ route('login-2') }}" class="btn_top_pl">Login</a></li>
                    @else
                        <li><a href="{{ route('profile') }}" class="btn_top_pl">Profile</a></li>
                        <li><a href="{{ route('logout') }}" class="btn_tl">Log Out</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')


    <!-- /main -->

    <footer>
        <div class="frame black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_wp">
                        <i class="icon_pin_alt"></i>
                        <h3>Alamat Resto & Gallery</h3>
                        <p>G Walk, Junction TL 6<br>Jl. Citraland Surabaya No.11, Sambikerep, Kec. Sambikerep, Surabaya,
                            Jawa Timur 60217</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_wp">
                        <i class="icon_tag_alt"></i>
                        <h3>Reservasi</h3>
                        <p><a href="tel:009442323221">+94 423-23-221</a><br><a>reservations@Foores.com</a></p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_wp">
                        <i class="icon_clock_alt"></i>
                        <h3>Jam Operasional</h3>
                        <ul>
                            <li>Mon - Sat: 9am - 9pm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <hr>
            <div class="row">
                <div class="col-sm-5">
                    <p class="copy">© Vin Autism Gallery Restaurant - All rights reserved</p>
                </div>
                <div class="col-sm-7">
                    <div class="follow_us">
                        <ul>
                            <li><a><i class="bi bi-facebook"></i></a></li>
                            <li><a><i class="bi bi-twitter-x"></i></a></li>
                            <li><a><i class="bi bi-instagram"></i></a></li>
                            <li><a><i class="bi bi-tiktok"></i></a></li>
                            <li><a><i class="bi bi-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="text-center"></p>
        </div>
    </footer>
    <!--/footer-->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- Modal terms -->
    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>,
                        mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus,
                        pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum
                        accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
                        sanctus, pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus.</p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('assets/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/common_func.js') }}"></script>
    <script src="{{ asset('assets/phpmailer/validate.js') }}"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('assets/js/typed.min.js') }}"></script>
    <script src="{{ asset('js/specific_shop.js') }}"></script>
    <script>
        var typed = new Typed('.element', {
            strings: ["Delicious Food", "Nice Ambient", "Affordable Prices"],
            startDelay: 10,
            loop: true,
            backDelay: 2000,
            typeSpeed: 50
        });
    </script>

    <!-- SPECIFIC SCRIPTS (wizard form) -->
    <script src="{{ asset('assets/js/wizard/wizard_scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/wizard/wizard_func.js') }}"></script>

    <!-- Cart Script -->
    <script>
        function updateCartItemCount(count) {
            const cartItemCountElement = document.getElementById('cart-item-count');
            if (cartItemCountElement) {
                cartItemCountElement.innerText = count;
            }
        }

        function removeRow(element, id) {
            const li = element.closest('li');
            const cartItems = document.getElementById('cart-items');

            // Hapus item dari DOM
            li.parentNode.removeChild(li);

            // Kirim permintaan ke controller untuk menghapus item dari session
            $.ajax({
                url: '{{ route('cart.remove') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        // Update jumlah item di keranjang
                        updateCartItemCount(response.cartItemCount);

                        // Ambil nilai transaksi, pajak, dan total dari respons controller
                        const {
                            transaction,
                            tax,
                            total
                        } = response;

                        // Update nilai transaksi, pajak, dan total di DOM
                        document.getElementById('transaction').innerText = 'Rp. ' + transaction.toLocaleString(
                            'id-ID');
                        document.getElementById('tax').innerText = 'Rp. ' + tax.toLocaleString('id-ID');
                        document.getElementById('total').innerText = 'Rp. ' + total.toLocaleString('id-ID');

                        // Periksa apakah keranjang kosong
                        if (response.cartItemCount === 0) {
                            cartItems.innerHTML =
                            `<li id="empty-cart">
                                <div class="item-details">
                                    <strong><span>Keranjang Kosong</span></strong>
                                </div>
                            </li>`;
                        }

                    } else {
                        alert(response.message); // Tampilkan pesan kesalahan jika ada
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menghapus item dari keranjang. Silakan coba lagi.');
                }
            });
        }
    </script>
    <!-- /Cart Script -->

    <!-- Cart Style -->
    <style>
        .cart-items-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 200px;
            /* Tinggi maksimum untuk scroll */
            overflow-y: auto;
            /* Enable scrollbar jika lebih panjang */
        }

        .cart-items-list li {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-bottom: 1px solid #ddd;
        }

        .cart-items-list li:last-child {
            border-bottom: none;
        }

        .cart-items-list figure {
            margin-right: 1rem;
        }

        .cart-items-list .item-details {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .cart-items-list .item-details strong {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 0.5rem;
            /* Jarak antara judul dan harga */
        }

        .cart-items-list .item-details .title {
            display: block;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cart-items-list .price {
            color: #666;
        }

        .cart-items-list .action {
            margin-top: auto;
            /* Mendorong tombol "Remove" ke bawah */
            cursor: pointer;
            color: #999;
        }
    </style>
    <!-- /Cart Style -->
</body>

</html>
