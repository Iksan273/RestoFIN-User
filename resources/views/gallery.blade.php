@extends('Layout.User')

@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(img/hero_general.jpg)">
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
                                    <img src="img/gallery/large/pic_1.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_1.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="img/gallery/large/pic_2.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_2.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="img/gallery/large/pic_3.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_3.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="img/gallery/large/pic_4.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_4.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="img/gallery/large/pic_5.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_5.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="img/gallery/large/pic_6.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_6.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="img/gallery/large/pic_7.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_7.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="item-img" data-cue="slideInUp">
                                    <img src="img/gallery/large/pic_8.jpg" alt="">
                                    <div class="content">
                                        <a href="img/gallery/large/pic_8.jpg" title="Photo title"
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
                                <img src="img/gallery/large/pic_4.jpg" alt="" />
                                <div class="content">
                                    <a href="https://vimeo.com/45830194" class="video" title="Video Vimeo"><i
                                            class="arrow_expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <div class="item-img" data-cue="slideInUp">
                                <img src="img/gallery/large/pic_1.jpg" alt="" />
                                <div class="content">
                                    <a href="https://www.youtube.com/watch?v=Zz5cu72Gv5Y" class="video"
                                        title="Video Youtube"><i class="arrow_expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <div class="item-img" data-cue="slideInUp">
                                <img src="img/gallery/large/pic_3.jpg" alt="" />
                                <div class="content">
                                    <a href="https://vimeo.com/45830194" class="video" title="Video Vimeo"><i
                                            class="arrow_expand"></i></a>
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
@endsection
