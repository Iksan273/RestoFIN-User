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

    <!-- Modal Register -->
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
                            <h3>Lupa Password</h3>
                            <p>Masukkan Password baru Akun Member Anda</p>
                            <form id="registrationForm" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Re-type Password" required>
                                </div>
                                <button type="submit" class="btn_1 mt-2 mb-4">Submit</button>
                                <button type="button" class="btn_1 mt-2 mb-4" onclick="window.location.href='{{route('login')}}'">Batalkan</button>
                                <p>Sudah menjadi Membership? <a href="{{route('login')}}" class="login-member">Login</a></p>
                                <a href="{{route('menu-order')}}" class="guest">Masuk sebagai Guest</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
    <!-- /Modal Register -->

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
        // Untuk masuk ke Halaman Login
        document.addEventListener('DOMContentLoaded', function() {
            var backToLogin = document.querySelector('.back-to-login');

            backToLogin.addEventListener('click', function() {
                window.location.href = '{{route('login')}}'; // Arahkan kembali ke halaman login
            });
        });

        // Untuk melakukan verifikasi Password dan Re-Password
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            var password = document.querySelector('input[name="password"]').value;
            var passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value;

            if (password !== passwordConfirmation) {
                alert('Password dan Re-type Password tidak sama.');
                event.preventDefault(); // Mencegah form submit
            }
        });
    </script>
    <!-- /script -->
@endsection
