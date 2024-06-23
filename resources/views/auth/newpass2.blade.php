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

    <!-- Modal New Pass -->
    <div class="popup_wrapper">
        <div class="popup_content newsletter_c">
            <span class="popup_close back-to-lupa-pass"><i class="icon_close"></i></span>
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
                            <h3>Lupa Password</h3>
                            <p>Masukkan Password baru Akun Member Anda</p>
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert"
                                    style="padding: 0px; margin-top: 10px; margin-bottom: 10px; font-size: 12px;">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form id="newPassForm" action="{{ route('new-pass-submit-2') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input id="new-pass" type="password" name="password" class="form-control"
                                        placeholder="Password" required>
                                    @error('password')
                                        <p style="margin-bottom: -10px;"><span class="text-danger">{{ $message }}</span>
                                        </p>
                                    @else
                                        <p style="margin-bottom: -10px;">Password Minimal 8 Karakter</p>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <input id="re-pass" type="password" name="password_confirmation" class="form-control"
                                        placeholder="Re-type Password" required>
                                    <input type="checkbox" onclick="pass()" style="margin-top: 10px;"> Show
                                    Password
                                </div>
                                <button type="submit" class="btn_1 mt-2 mb-4">Submit</button>
                                <button type="button" class="btn_1 mt-2 mb-4 back-to-lupa-pass"
                                    onclick="window.location.href='{{ route('lupa-password-2') }}'">Batalkan</button>
                                <p>Sudah menjadi Membership? <a href="{{ route('login-2') }}" class="login-member">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
    <!-- /Modal New Pass -->

    <!-- Style -->
    <style>
        .login-member,
        .guest {
            display: block;
            margin-top: 5px;
            color: #007bff;
            /* Customize color as needed */
            text-decoration: none;
        }

        .login-member:hover,
        .guest:hover {
            text-decoration: underline;
        }
    </style>
    <!-- /Style -->

    <!-- script -->
    <script>
        // Untuk masuk ke Halaman Lupa Password
        document.addEventListener('DOMContentLoaded', function() {
            var backToLogin = document.querySelector('.back-to-lupa-pass');

            backToLogin.addEventListener('click', function() {
                window.location.href =
                    '{{ route('lupa-password-2') }}'; // Arahkan kembali ke halaman lupa password
            });
        });

        // Untuk melakukan verifikasi Password dan Re-Password
        document.getElementById('newPassForm').addEventListener('submit', function(event) {
            var password = document.querySelector('input[name="password"]').value;
            var passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value;

            if (password !== passwordConfirmation) {
                var errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger';
                errorDiv.setAttribute('role', 'alert');
                errorDiv.style.padding = '0px';
                errorDiv.style.marginTop = '-10px';
                errorDiv.style.marginBottom = '10px';
                errorDiv.style.fontSize = '12px';
                errorDiv.textContent = 'Password dan Re-type Password tidak sama.';

                // Menyisipkan errorDiv di atas form
                var form = document.getElementById('newPassForm');
                form.parentNode.insertBefore(errorDiv, form);

                event.preventDefault(); // Mencegah form submit
            }
        });

        function pass() {
            var x = document.getElementById("new-pass");
            var y = document.getElementById("re-pass");
            if (x.type === "password" && y.type == "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
    <!-- /script -->
@endsection
