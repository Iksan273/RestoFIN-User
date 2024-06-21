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

    <!-- Modal Login -->
    <div class="popup_wrapper">
        <div class="popup_content newsletter_c">
            <span class="popup_close"><a href="{{ route('index') }}" style="color: black"><i
                        class="icon_close"></i></a></span>
            <div class="row g-0">
                <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
                    <figure><img src="{{ asset('resto/gallery2.jpeg') }}" alt=""></figure>
                </div>
                <div class="col-md-7">
                    <div class="content">
                        <div class="wrapper">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('resto/logo.png') }}" alt=""
                                    style="width: auto; height: auto; max-width: 140px; max-height: 35px;">
                            </a>
                            <h3>Selamat Datang</h3>
                            <p>Vinautism Art & Resto</p>
                            <form id="loginForm" action="{{ route('login-2') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required style="margin-bottom: 1rem;">
                                    <input id="password" type="password" name="password" class="form-control" placeholder="Password"
                                        required>
                                    <input type="checkbox" onclick="pass()" style="margin-top: 10px;"> Show
                                    Password
                                    @error('password')
                                        <p style="margin-bottom: 10px;"><span class="text-danger">{{ $message }}</span></p>
                                    @enderror
                                    <a href="{{ route('lupa-password') }}" class="forgot-password">Lupa Password</a>
                                    <button type="submit" class="btn_1 mt-2 mb-4">Masuk</button>
                                    <p>Belum menjadi Membership? <a href="{{ route('register-2') }}"
                                            class="regist-member">Buat
                                            Membership</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
    <!-- /Modal Login -->

    <!-- Style -->
    <style>
        .forgot-password,
        .regist-member,
        .guest {
            display: block;
            margin-top: 5px;
            color: #007bff;
            /* Customize color as needed */
            text-decoration: none;
        }

        .forgot-password:hover,
        .regist-member:hover,
        .guest:hover {
            text-decoration: underline;
        }
    </style>
    <!-- /Style -->

    <!-- script -->
    <script>
        function pass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- /script -->
@endsection
