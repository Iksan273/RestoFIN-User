@extends('Layout.User')

@section('content')
    <main class="pattern_2">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-8" style="margin-top: 20px">
                    <div class="write_review">
                        <h1>Kritik dan Saran</h1>
                        <div class="rating_submit">
                            <div class="form-group mb-2">
                                <label class="d-block">Overall rating</label>
                                <span class="rating mb-0">
                                    <input type="radio" class="rating-input" id="5_star" name="rating-input"
                                        value="5 Stars"><label for="5_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="4_star" name="rating-input"
                                        value="4 Stars"><label for="4_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="3_star" name="rating-input"
                                        value="3 Stars"><label for="3_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="2_star" name="rating-input"
                                        value="2 Stars"><label for="2_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="1_star" name="rating-input"
                                        value="1 Star"><label for="1_star" class="rating-star"></label>
                                </span>
                            </div>
                        </div>
                        <!-- /rating_submit -->
                        <div class="form-group">
                            <label>Title of your review</label>
                            <input class="form-control" type="text"
                                placeholder="If you could say it in one sentence, what would you say?">
                        </div>
                        <div class="form-group mb-5">
                            <label>Your review</label>
                            <textarea class="form-control" style="height: 280px;"
                                placeholder="Write your review to help others learn about this online business"></textarea>
                        </div>
                        <p><a href="#0" class="btn_1">Submit review</a></p>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection
