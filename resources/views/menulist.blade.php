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
            <div class="container margin_60_40" data-cue="slideInUp">
                <div class="banner lazy" data-bg="url(img/banner_bg_recommendations.jpg)">
                    <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                        data-opacity-mask="rgba(0, 0, 0, 0.6)">
                        <div>
                            <small>Voucher Saat Ini</small>
                            <h3>Mix and Match Menu $20 only</h3>
                            <p>Pizza, Pasta, Salad, Wine, Dessert</p>
                            <a href="reservations.html" class="btn_1">Lihat Detail Voucher</a>
                            <br><br>
                            <a href="reservations.html" class="btn_1">Lihat Voucher Lainnya</a>
                        </div>
                        <figure class="d-none d-lg-block"><img src="img/banner.svg" alt="" width="200"
                                height="200" class="img-fluid"></figure>
                    </div>
                </div>
                <!-- Tombol untuk membuka modal -->
                <div class="tabs_menu add_bottom_25">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($categories as $index => $category)
                            <li class="nav-item">
                                <a id="tab-{{ $index }}" href="#pane-{{ $index }}"
                                    class="nav-link{{ $index == 0 ? ' active' : '' }}" data-bs-toggle="tab"
                                    role="tab">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content add_bottom_25" role="tablist">
                        @foreach ($categories as $categoryIndex => $category)
                            <div id="pane-{{ $categoryIndex }}"
                                class="card tab-pane fade{{ $categoryIndex == 0 ? ' show active' : '' }}" role="tabpanel"
                                aria-labelledby="tab-{{ $categoryIndex }}">
                                <div class="card-header" role="tab" id="heading-{{ $categoryIndex }}">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-{{ $categoryIndex }}"
                                            aria-expanded="false" aria-controls="collapse-{{ $categoryIndex }}"
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
                                        {{-- <div class="banner lazy" data-bg="url(img/banner_bg_{{ $categoryIndex + 1 }}.jpg)">
                                            <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                                                data-opacity-mask="rgba(0, 0, 0, 0.6)">
                                                <div>
                                                    <small>{{ $category->title }} Special Offer</small>
                                                    <h3>Mix {{ $category->title }} Menu $18 only</h3>
                                                    <p>Hamburgher, Chips, Mix Sausages, Beer, Muffin</p>
                                                    <a href="reservations.html" class="btn_1">Reserve now</a>
                                                </div>
                                                <figure class="d-none d-lg-block"><img src="img/banner.svg" alt=""
                                                        width="200" height="200" class="img-fluid"></figure>
                                            </div>
                                            <!-- /wrapper -->
                                        </div> --}}
                                        <!-- /banner -->
                                        <div class="row magnific-gallery add_top_10">
                                            @if (isset($menus[$categoryIndex + 1]))
                                                @foreach ($menus[$categoryIndex + 1] as $menu)
                                                    <div class="col-lg-6">
                                                        <div class="menu_item order">
                                                            <figure>
                                                                <a href="{{ asset('' . $menu->imageUrl . '.jpg') }}"
                                                                    title="{{ $menu->title }}" data-effect="mfp-zoom-in">
                                                                    <img src="{{ asset('' . $menu->imageUrl . '.jpg') }}"
                                                                        data-src="{{ asset('' . $menu->imageUrl . '.jpg') }}"
                                                                        class="lazy" alt="">
                                                                </a>
                                                            </figure>
                                                            <div class="menu_title">
                                                                <h3>{{ $menu->title }}</h3>
                                                                <em>${{ $menu->price }}</em>
                                                            </div>
                                                            <p>{{ $menu->description }}</p>
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
                                    {{-- <div class="banner lazy" data-bg="url(img/banner_bg_recommendations.jpg)">
                                        <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                                            data-opacity-mask="rgba(0, 0, 0, 0.6)">
                                            <div>
                                                <small>Special Recommendations</small>
                                                <h3>Mix and Match Menu $20 only</h3>
                                                <p>Pizza, Pasta, Salad, Wine, Dessert</p>
                                                <a href="reservations.html" class="btn_1">Reserve now</a>
                                            </div>
                                            <figure class="d-none d-lg-block"><img src="img/banner.svg" alt=""
                                                    width="200" height="200" class="img-fluid"></figure>
                                        </div>
                                        <!-- /wrapper -->
                                    </div> --}}
                                    <!-- /banner -->
                                    <div class="row magnific-gallery">
                                        @if (isset($recommendedMenus) && count($recommendedMenus) > 0)
                                            @foreach ($recommendedMenus as $menu)
                                                <div class="col-lg-6" data-cue="slideInUp">
                                                    <div class="menu_item order">
                                                        <figure>
                                                            <a href="{{ asset('' . $menu->imageUrl . '.jpg') }}"
                                                                title="{{ $menu->title }}" data-effect="mfp-zoom-in">
                                                                <img src="{{ asset('' . $menu->imageUrl . '.jpg') }}"
                                                                    data-src="{{ asset('' . $menu->imageUrl . '.jpg') }}"
                                                                    class="lazy" alt="">
                                                            </a>
                                                        </figure>
                                                        <div class="menu_title">
                                                            <h3>{{ $menu->title }}</h3>
                                                            <em>${{ $menu->price }}</em>
                                                        </div>
                                                        <p>{{ $menu->description }}</p>
                                                        <a href="#0" class="add_to_cart">Add To Cart</a>
                                                    </div>
                                                </div>
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
            </div>
            <!-- /container -->
        </div>
        <!-- /pattern -->

    </main>

    <!-- Modal Pesan -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{route('index')}}" class="d-flex align-items-center">
                            <img src="{{ asset('resto/logo.png') }}" alt=""
                                style="width: auto; height: auto; max-width: 140px; max-height: 35px; margin-right: 5px;">
                            <b><span>Vin Autism Gallery Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda dapat melakukan reservasi atau melakukan pemesanan makanan sekarang.</p>
                    <div class="text-center">
                        <a href="/reservation" class="btn_1">Reservasi</a>
                        <a href="{{ route('login') }}" class="btn_1">Pesan Makanan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Pesan -->

    <!-- style -->
    <style>
        a.d-flex.align-items-center span {
            margin: 10px;
            text-align: center;
            color: black;
        }
    </style>
    <!-- /style -->

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
    </script>
    <!-- /script -->
@endsection
