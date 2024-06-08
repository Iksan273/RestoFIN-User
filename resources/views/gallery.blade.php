@extends('Layout.User')

@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url({{ asset('resto/gallery8.jpg') }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Media Gallery</h1>
                            <p>Cooking delicious and tasty food since 2005</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame gray"></div>
        </div>
        <!-- /hero_single -->
        <div class="bg_gray">
            <div class="container margin_60_40">
                <div class="main_title center">
                    <span><em></em></span>
                    <h2>Here some pictures</h2>
                    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                </div>
                <div class="grid">
                    <ul class="magnific-gallery clearfix">
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery.jpeg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery.jpeg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery2.jpeg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery2.jpeg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery3.jpg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery3.jpg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery4.jpg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery4.jpg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery5.jpg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery5.jpg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery6.jpg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery6.jpg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery7.jpg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery7.jpg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="{{ asset('resto/gallery8.jpg') }}" alt="">
                                    <div class="content">
                                        <a href="{{ asset('resto/gallery8.jpg') }}" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /grid gallery -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_gray -->
        <div class="container margin_60_40">
            <div class="main_title center">
                <span><em></em></span>
                <h2>Here some videos</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="grid">
                <ul class="magnific-gallery" data-cues="zoomIn">
                    <li>
                        <div class="item">
                            <div class="item-img" data-cue="slideInUp">
                                <img src="{{ asset('resto/logo.png') }}" alt="" />
                                <div class="content">
                                    <a href="https://www.youtube.com/watch?v=Gj1PAk9uEzE" class="video"
                                        title="Video Youtube"><i class="arrow_expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <div class="item-img" data-cue="slideInUp">
                                <img src="{{ asset('resto/logo.png') }}" alt="" />
                                <div class="content">
                                    <a href="https://www.youtube.com/watch?v=Gj1PAk9uEzE" class="video"
                                        title="Video Youtube"><i class="arrow_expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <div class="item-img" data-cue="slideInUp">
                                <img src="{{ asset('resto/logo.png') }}" alt="" />
                                <div class="content">
                                    <a href="https://www.youtube.com/watch?v=Gj1PAk9uEzE" class="video"
                                        title="Video Youtube"><i class="arrow_expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /grid -->
        </div>
        <!-- /container -->
    </main>

    <style>
        .item-img img {
            max-width: 100%;
            height: auto;
            width: 100%;
            height: 200px;
            /* Atur tinggi gambar sesuai kebutuhan */
            object-fit: cover;
            /* Memastikan gambar mengisi area dengan proporsi yang tepat */
        }

        .item {
            margin: 10px;
        }

        @media (max-width: 767px) {
            .item {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection
