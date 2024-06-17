@extends('Layout.User')

@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url({{ asset('desain/menu-order.jpg') }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Menu with Tabs</h1>
                            <p>Cooking delicious and tasty food since 2024</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <div class="pattern_2">
            <div class="container margin_60_40" data-cue="slideInUp">
                <div class="banner lazy" data-bg="url(img/banner_bg.jpg)">
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
                        <figure class="d-none d-lg-block"><img src="{{ asset('resto/logo.png') }}" alt=""
                                width="200" height="200" class="img-fluid"></figure>
                    </div>
                    <!-- /wrapper -->
                </div>
                <div class="tabs_menu add_bottom_25">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($categories as $index => $category)
                            <li class="nav-item">
                                <a id="tab-{{ $index }}" href="#pane-{{ $index }}"
                                    class="nav-link{{ $index == 0 ? ' active' : '' }}" data-bs-toggle="tab"
                                    role="tab">{{ $category->title }}</a>
                            </li>
                        @endforeach
                        <!-- Add tab for Recommendations -->
                        <li class="nav-item">
                            <a id="tab-recommendations" href="#pane-recommendations" class="nav-link" data-bs-toggle="tab"
                                role="tab">Recommendations</a>
                        </li>
                    </ul>
                    <div class="tab-content add_bottom_25" role="tablist">
                        @foreach ($categories as $categoryIndex => $category)
                            <div id="pane-{{ $categoryIndex }}"
                                class="card tab-pane fade{{ $categoryIndex == 0 ? ' show active' : '' }}" role="tabpanel"
                                aria-labelledby="tab-{{ $categoryIndex }}">
                                <div class="card-header" role="tab" id="heading-{{ $categoryIndex }}">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse"
                                            href="#collapse-{{ $categoryIndex }}" aria-expanded="false"
                                            aria-controls="collapse-{{ $categoryIndex }}"
                                            data-bs-parent="#accordion-{{ $categoryIndex }}">
                                            {{ $category->title }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-{{ $categoryIndex }}"
                                    class="collapse{{ $categoryIndex == 0 ? ' ' : '' }}" role="tabpanel"
                                    aria-labelledby="heading-{{ $categoryIndex }}"
                                    data-bs-parent="#accordion-{{ $categoryIndex }}">
                                    <div class="card-body">
                                        <div class="row magnific-gallery">
                                            @if (isset($menus[$categoryIndex + 1]))
                                                @foreach ($menus[$categoryIndex + 1] as $menu)
                                                    <div class="col-lg-6">
                                                        <div class="menu_item order" data-id="{{ $menu->id }}"
                                                            data-title="{{ $menu->title }}"
                                                            data-price="{{ $menu->price }}"
                                                            data-image="{{ $menu->imageUrl }}" onclick="addToCart(this)">
                                                            <div class="menu_title">
                                                                <figure>
                                                                    <img src="https://resto.bemubaya.com/menu/images/{{ $menu->imageUrl }}"
                                                                        data-src="https://resto.bemubaya.com/menu/images/{{ $menu->imageUrl }}"
                                                                        class="lazy" alt="">
                                                                </figure>
                                                                <h3>{{ $menu->title }}</h3>
                                                                <em>{{ $menu->price }}</em>
                                                            </div>
                                                            <p>{{ $menu->description }}</p>
                                                            <a class="add_to_cart">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No menus available for this category.</p>
                                            @endif
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /card-body -->
                                </div>
                            </div>
                        @endforeach
                        <!-- Recommendations Tab Content -->
                        <div id="pane-recommendations" class="card tab-pane fade" role="tabpanel"
                            aria-labelledby="tab-recommendations">
                            <div class="card-header" role="tab" id="heading-recommendations">
                                <h5>
                                    <a class="collapsed" data-bs-toggle="collapse" href="#collapse-recommendations"
                                        aria-expanded="false" aria-controls="collapse-recommendations"
                                        data-bs-parent="#accordion-recommendations">
                                        Recommendations
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-recommendations" class="collapse" role="tabpanel"
                                aria-labelledby="heading-recommendations" data-bs-parent="#accordion-recommendations">
                                <div class="card-body">
                                    <!-- /banner -->
                                    <div class="row magnific-gallery add_top_30">
                                        @if (isset($recmenu) && $recmenu->isNotEmpty())
                                            @foreach ($recmenu as $menuGroup)
                                                @if ($menuGroup->isNotEmpty())
                                                    @php
                                                        $menu = $menuGroup->first()->menu; // Ambil menu pertama dari grup
                                                    @endphp
                                                    <div class="col-lg-6" data-cue="slideInUp">
                                                        <div class="menu_item order" data-id="{{ $menu->id }}"
                                                            data-title="{{ $menu->title }}"
                                                            data-price="{{ $menu->price }}"
                                                            data-image="{{ $menu->imageUrl }}" onclick="addToCart(this)">
                                                            <div class="menu_title">
                                                                <figure>
                                                                    <img src="https://resto.bemubaya.com/menu/images/{{ $menu->imageUrl }}"
                                                                        data-src="https://resto.bemubaya.com/menu/images/{{ $menu->imageUrl }}"
                                                                        class="lazy" alt="">
                                                                </figure>
                                                                <h3>{{ $menu->title }}</h3>
                                                                <em>{{ $menu->price }}</em>
                                                            </div>
                                                            <p>{{ $menu->description }}</p>
                                                            <a class="add_to_cart">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No recommendations available at the moment.</p>
                                        @endif
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /card-body -->
                            </div>
                        </div>
                        <!-- /Recommendations Tab Content -->
                    </div>

                    <!-- /tab-content -->
                </div>
                <!-- /tabs_menu-->

                {{-- <p class="text-center"><a href="#0" class="btn_1 outline">Download Menu</a></p> --}}
            </div>
            <!-- /container -->
        </div>
        <!-- /pattern -->

    </main>

    <!-- script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceElements = document.querySelectorAll('.menu_title em');

            priceElements.forEach(function(el) {
                const price = parseFloat(el.textContent.replace(/[^\d.-]/g, ''));
                el.textContent = formatRupiah(price);
            });
        });

        function formatRupiah(number) {
            return 'Rp ' + number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function addToCart(element) {
            var menuId = $(element).data('id');
            var menuTitle = $(element).data('title');
            var menuPrice = $(element).data('price');
            var menuImageUrl = $(element).data('image');

            $.ajax({
                url: '{{ route('cart.add') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: menuId,
                    title: menuTitle,
                    price: menuPrice,
                    imageUrl: menuImageUrl
                },
                success: function(response) {
                    if (response.success) {
                        updateCartView(response.cart, response.cartItemCount);
                    }
                },
                error: function(response) {
                    alert('Terjadi kesalahan saat menambahkan ke dalam keranjang. Silakan coba lagi.');
                }
            });
        }

        function updateCartView(cart, count) {
            // Perbarui jumlah item di keranjang pada layout.user
            var cartItemCount = count;
            document.getElementById('cart-item-count').textContent = cartItemCount;

            // Perbarui tampilan dropdown cart pada layout.user
            var cartItemsList = document.getElementById('cart-items');
            if (cartItemCount > 0) {
                // Buat HTML baru berdasarkan item-item yang ada di keranjang
                var newHTML = '';
                var transaction = 0;

                Object.keys(cart).forEach(function(id) {
                    var item = cart[id];
                    transaction += parseFloat(item.price) * parseInt(item.quantity);

                    newHTML += '<li data-id="' + id + '">';
                    newHTML += '<figure><img src="https://resto.bemubaya.com/menu/images/' + item.imageUrl +
                        '" alt="" width="50" height="50" class="lazy"></figure>';
                    newHTML += '<div class="item-details">';
                    newHTML += '<strong>';
                    newHTML += '<span>' + item.quantity + 'x</span>';
                    newHTML += '<span class="title">' + item.title + '</span>';
                    newHTML += '</strong>';
                    newHTML += '<span class="price">Rp. ' + formatNumber(parseInt(parseFloat(item.price))) +
                        '</span>';
                    newHTML += '<a class="action" onclick="removeRow(this, \'' + id +
                        '\')"><i class="icon_trash_alt"></i></a>';
                    newHTML += '</div>'; // end .item-details
                    newHTML += '</li>';
                });

                cartItemsList.innerHTML = newHTML;

                // Hitung pajak
                var tax = transaction * 0.10; // Pajak 10%

                // Hitung total
                var total = transaction + tax;

                // Perbarui tampilan transaksi, pajak, dan total harga
                document.getElementById('transaction').textContent = 'Rp. ' + formatNumber(transaction);
                document.getElementById('tax').textContent = 'Rp. ' + formatNumber(tax);
                document.getElementById('total').textContent = 'Rp. ' + formatNumber(total);
            } else {
                // Tampilkan pesan "Keranjang Kosong" jika tidak ada item di keranjang
                cartItemsList.innerHTML =
                    `<li id="empty-cart">
                    <div class="item-details">
                        <strong>
                            <span>Keranjang Kosong</span>
                        </strong>
                    </div>
                </li>`;

                // Jika keranjang kosong, set transaksi, pajak, dan total menjadi 0
                document.getElementById('transaction').textContent = 'Rp. 0';
                document.getElementById('tax').textContent = 'Rp. 0';
                document.getElementById('total').textContent = 'Rp. 0';
            }
        }



        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>
    <!-- /script -->
@endsection
