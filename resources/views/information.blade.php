@extends('Layout.User')

@section('content')
    <main>

        <div class="hero_single inner_pages background-image" data-background="url({{ asset('resto/gallery6.jpg') }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Information & Contact</h1>
                            <p>Vinautism Art & Resto</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <div class="bg_gray">
            <div class="container margin_60_40">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="box_contacts">
                            <i class="icon_tag_alt"></i>
                            <h2>Reservasi</h2>
                            <a href="https://wa.me/6282230002770">+62 822-3000-2770</a> - <a
                                href="mailto:vinresto1@gmail.com">vinresto1@gmail.com</a>
                            <small>- <a href="/reservation">atau melalui Form berikut</a> -</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box_contacts">
                            <i class="icon_pin_alt"></i>
                            <h2>Alamat</h2>
                            <div>G Walk, Junction TL 6</div>
                            <div>Jl. Citraland Surabaya No.11, Sambikerep, Kec. Sambikerep, Surabaya, Jawa Timur 60217</div>
                            <br>
                            <small style="margin-top: -10px;">- <a href="https://maps.app.goo.gl/Tamxt7FJ142nxLbk8">Lihat
                                    Petunjuk</a> -</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box_contacts">
                            <i class="icon_clock_alt"></i>
                            <h2>Jam Buka</h2>
                            <div>Senin sampai Minggu </div>
                            <div>09:00 - 21:00</div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_gray -->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: -40px;">
                {{ session('success') }}
                <button type="button" class="close-custom" onclick="this.parentElement.style.display='none';"
                    aria-label="Close">
                </button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: -40px;">
                {{ session('error') }}
                <button type="button" class="close-custom" onclick="this.parentElement.style.display='none';"
                    aria-label="Close">
                </button>
            </div>
        @endif
        <div class="container margin_60_40">
            <h5 class="mb_5">Kirimkan Pesan Anda</h5>
            <div class="row">
                <div class="col-lg-4 col-md-6 add_bottom_25">
                    <form method="POST" id="contactform" autocomplete="off" enctype="multipart/form-data"
                        action="{{ route('send-email') }}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nama" id="name_contact"
                                name="name_contact" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" id="email_contact"
                                name="email_contact" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" style="height: 150px;" placeholder="Pesan" id="message_contact" name="message_contact"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="verify_contact">Apakah kamu manusia? || {{ $question }}</label>
                            <input class="form-control" type="number" id="verify_contact" name="verify_contact"
                                placeholder="Jawaban" required>
                        </div>
                        <div class="form-group">
                            <input class="btn_1 full-width" type="submit" value="Submit" id="submit-contact"
                                onclick="kirim()">
                        </div>
                    </form>
                    <div id="message-contact"></div>
                </div>
                <div class="col-lg-8 col-md-6 add_bottom_25">
                    <iframe class="map_contact"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d267.73897025264!2d112.65477774243918!3d-7.295013483125319!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fd4d915bc2f1%3A0x80f066347cb54c3!2sVinautism%20Art%20%26%20Resto!5e0!3m2!1sen!2sid!4v1720095725989!5m2!1sen!2sid"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <!-- /container -->

    </main>

    <style>
        .close-custom {
            background: none;
            border: none;
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
            padding: 1rem 1rem;
            line-height: 1;
        }

        .close-custom:before {
            content: '\00d7';
            /* Unicode for multiplication sign (×) */
        }
    </style>

    <script>
        function kirim() {
            event.preventDefault(); // Mencegah submit form otomatis

            // Jika semua validasi terpenuhi, kirim formulir
            var form = document.getElementById('contactform');
            form.submit();
        }
    </script>
@endsection
