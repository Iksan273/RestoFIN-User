@extends('Layout.User')

@section('content')
    <!-- main -->
    <main>
        <div class="hero_single inner_pages background-image"
            style="background-image: url({{ asset('resto/gallery.jpeg') }}); height: 100vh; background-size: cover; background-position: center;">
            <div class="opacity-mask" style="background: rgba(0, 0, 0, 0.6); height: 100%;">
                <div class="container d-flex align-items-center justify-content-center" style="height: 100%;">
                    <div class="row justify-content-center text-center">
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </div>
        <!-- /hero_single -->
    </main>
    <!-- /main -->

    <!-- Modal Forgot -->
    <div class="popup_wrapper">
        <div class="popup_content newsletter_c">
            <span class="popup_close back-to-login"><i class="icon_close"></i></span>
            <div class="row g-0">
                <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
                    <figure><img src="{{ asset('resto/gallery2.jpeg') }}" alt=""></figure>
                </div>
                <div class="col-md-7">
                    <div class="content">
                        <div class="wrapper">
                            <a href="{{route('index')}}">
                                <img src="{{ asset('resto/logo.png') }}" alt=""
                                    style="width: auto; height: auto; max-width: 140px; max-height: 35px;">
                            </a>
                            <h3>Lupa Password</h3><br>
                            <form id="forgotForm" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <button type="submit" class="btn_1 mt-2 mb-4">Submit</button>
                                <button type="button" class="btn_1 mt-2 mb-4" onclick="window.location.href='{{route('login')}}'">Batalkan</button>
                                <p style="margin-bottom: 10px;">Sudah menjadi Membership? <a href="{{route('login')}}" class="login-member">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
    <!-- /Modal Forgot -->

    <!-- Style -->
    <style>
        .login-member, .guest {
            display: block;
            margin-top: 5px;
            color: #007bff;
            /* Customize color as needed */
            text-decoration: none;
        }

        .login-member:hover, .guest:hover {
            text-decoration: underline;
        }
    </style>
    <!-- /Style -->

    <!-- script -->
    <script>
    </script>
    <!-- /script -->
@endsection
