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
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('resto/logo.png') }}" alt=""
                                    style="width: auto; height: auto; max-width: 140px; max-height: 35px;">
                            </a>
                            <h3>Verifikasi Email Registrasi</h3>
                            <p>Masukkan Kode Verifikasi yang telah di kirim ke Email Anda</p>
                            <form id="emailRegistForm" action="{{ route('verif-reg-2') }}" method="POST">
                                @csrf
                                <p id="timerTextEmail" style="text-align: center; margin-bottom: 10px;">
                                    Timer</p>
                                <div class="form-group">
                                    <input type="text" name="verification_code" class="form-control"
                                        placeholder="Masukkan Kode Verifikasi" required>
                                    <p style="margin-bottom: -10px; margin-top: 5px;">4 Angka Kode Verifikasi</p>
                                </div>
                                <button type="submit" class="btn_1 mt-2 mb-4">Submit</button>
                                <button id="cancel-button" type="button" class="btn_1 mt-2 mb-4"
                                    onclick="window.location.href='{{ route('register-2') }}'">Batalkan</button>
                                <p style="margin-bottom: 10px;">Sudah menjadi Membership? <a href="{{ route('login-2') }}"
                                        class="login-member">Login</a>
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
        // Timer //
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the timer
            let timer = 60;
            const timerTextEmail = document.getElementById('timerTextEmail');
            const form = document.getElementById('emailRegistForm');

            // Function to update the timer
            // Fungsi untuk mengupdate timer
            function updateTimer() {
                if (timer > 0) {
                    timer--;
                    timerTextEmail.textContent = `Waktu tersisa: ${timer} detik`;
                } else {
                    timerTextEmail.innerHTML = '<a href="#" id="resendLink">Kirim Kode Verifikasi Ulang</a>';
                    clearInterval(timerInterval);
                    document.getElementById('resendLink').addEventListener('click', function(e) {
                        e.preventDefault();
                        // Submit form untuk mengirim ulang kode verifikasi
                        const resendForm = document.createElement('form');
                        resendForm.method = 'POST';
                        resendForm.action =
                        '{{ route('resend-verification') }}'; // Ubah dengan route yang sesuai

                        const csrfToken = document.querySelector('input[name="_token"]').value;
                        const csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = csrfToken;
                        resendForm.appendChild(csrfInput);

                        document.body.appendChild(resendForm);
                        resendForm.submit();
                    });

                    // Hapus sesi verification_code setelah timer habis
                    fetch('{{ route('clear-verification-session') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => console.log(data)) // Handle response jika diperlukan
                        .catch(error => console.error('Error:', error));
                }
            }

            // Start the timer interval
            const timerInterval = setInterval(updateTimer, 1000);

            // Reset the timer if the page is refreshed or reopened
            window.addEventListener('beforeunload', function() {
                clearInterval(timerInterval);
            });
        });

        // Untuk masuk ke Halaman Login
        document.addEventListener('DOMContentLoaded', function() {
            var backToLogin = document.querySelector('.back-to-login');

            backToLogin.addEventListener('click', function() {
                // Kirim permintaan AJAX untuk menghapus session
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('session-clear') }}', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        window.location.href = '{{ route('register-2') }}';
                    } else {
                        console.error('Gagal menghapus session');
                    }
                };
                xhr.send();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var cancelButton = document.getElementById('cancel-button');

            cancelButton.addEventListener('click', function() {
                // Kirim permintaan AJAX untuk menghapus session
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('session-clear') }}', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        window.location.href = '{{ route('register') }}';
                    } else {
                        console.error('Gagal menghapus session');
                    }
                };
                xhr.send();
            });
        });
    </script>
    <!-- /script -->
@endsection
