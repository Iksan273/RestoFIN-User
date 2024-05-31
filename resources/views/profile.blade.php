@extends('Layout.User')

@section('content')
    <!-- main -->
    <main class="pattern_2" style="background-color: #CEBEA5">

        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <!-- /col -->
                <div class="col-xl-4 col-lg-4" id="sidebar_fixed" style="margin-top: 20px">
                    <div class="box_booking box_booking_visible">
                        <div class="head" style="background-color: white">
                            <div class="name-cust" style="margin: 10px;">
                                <h3>Nama User</h3>
                            </div>
                            <div class="email-cust" style="margin: 10px;">
                                <h5>Email</h5>
                            </div>
                            <a href="#points" id="pointButton" class="btn_1 full-width mb_5 icon-points"
                                style="margin-top: 20px" onclick="handleClick(this)">500
                                Points</a>
                            <a href="#struk-pembelian-online" id="strukButton" class="btn_1 full-width mb_5 icon-online"
                                style="margin-top: 20px" onclick="handleClick(this)">Struk Pembelian Online
                            </a>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <p class="navigation-text">------------ Akun Member ------------</p>
                            <a href="#user-profile" id="akunSayaButton" class="btn_1 full-width mb_5 icon-account actived"
                                onclick="handleClick(this)">Akun Member Saya</a>
                            <a href="#change-password" id="passwordButton" class="btn_1 full-width mb_5 icon-password"
                                onclick="handleClick(this)">Ganti
                                Password</a>
                            <a href="#voucher-promo" id="promoButton" class="btn_1 full-width mb_5 icon-my-voucher"
                                onclick="handleClick(this)">Voucher Saya</a>
                            <a href="#transaction" id="transactionButton" class="btn_1 full-width mb_5 icon-history"
                                onclick="handleClick(this)">Transaksi Saya</a>
                        </div>
                        <div class="main" style="margin-top: -30px;">
                            <p class="navigation-text">--------------- Navigasi --------------</p>
                            <a href="{{ route('index') }}" class="btn_1 full-width mb_5 icon-home">Beranda</a>
                            <a href="{{ route('list-menu') }}" class="btn_1 full-width mb_5 icon-menu">Daftar Menu</a>
                            <a href="/promo" class="btn_1 full-width mb_5 icon-promo">Promo</a>
                            <a href="/gallery" class="btn_1 full-width mb_5 icon-gallery">Galeri Makanan</a>
                            <a href="/review" class="btn_1 full-width mb_5 icon-review">Kritik & Saran</a>
                            <a href="https://www.google.co.id/maps/place/Vin+Autism+Gallery/@-7.2950762,112.6521202,17z/data=!4m8!3m7!1s0x2dd7fdc112922645:0xc953059a61c6938!8m2!3d-7.2950762!4d112.6546951!9m1!1b1!16s%2Fg%2F11jr53fzzx?entry=ttu"
                                class="btn_1 full-width mb_5 icon-maps">Review Google</a>
                            <a href="/carrer" class="btn_1 full-width mb_5 icon-career">Sejarah & Karir</a>
                            <a href="/information" class="btn_1 full-width mb_5 icon-contact">Informasi & Kontak</a>
                        </div>
                        <div class="main" style="margin-top: -30px;">
                            <p class="navigation-text">---------------- Aksi ----------------</p>
                            <a href="{{ route('logout') }}" class="btn_1 full-width mb_5" style="background-color: red; color: white;">Logout</a>
                        </div>
                    </div>
                    <!-- /box_booking -->
                </div>

                <div class="col-xl-6 col-lg-8" style="margin-top: 20px">
                    <!-- Profile -->
                    <div class="box_booking_2 style_2 box_booking_hidden box_profile_visible">
                        <div class="head">
                            <div class="title">
                                <h3 class="back_btn">Personal Details</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label>First Name</label>
                                    </div>
                                    <input class="form-control" placeholder="Value First Name" disabled>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label>Last Name</label>
                                    </div>
                                    <input class="form-control" placeholder="Value Last Name" disabled>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label>Email Address</label>
                                        <label><a href="#verifyemail" id="verifyEmailBtn" class="ml-auto disabled-link"
                                                data-bs-toggle="modal"
                                                data-bs-target="#verificationEmailModal">Verify</a></label>
                                    </div>
                                    <input class="form-control" placeholder="Value Phone" disabled>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label>Phone</label>
                                        <label><a href="#verifyphone" id="verifyPhoneBtn" class="ml-auto disabled-link"
                                                data-bs-toggle="modal"
                                                data-bs-target="#verificationPhoneModal">Verify</a></label>
                                    </div>
                                    <input class="form-control" placeholder="Value Phone" disabled>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label>Tanggal dan Bulan Lahir</label>
                                    </div>
                                    <div class="d-flex-2">
                                        <select class="form-control mr-2" aria-label="Tanggal" disabled>
                                            <option value="" disabled selected>Pilih Tanggal</option>
                                            <!-- Options for days 1-31 -->
                                            <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                                echo "<option value=\"$i\">$i</option>";
                                            }
                                            ?>
                                        </select>
                                        <select class="form-control" aria-label="Bulan" disabled>
                                            <option value="" disabled selected>Pilih Bulan</option>
                                            <!-- Options for months 1-12 -->
                                            <?php
                                            $months = ['1 - Januari', '2 - Februari', '3 - Maret', '4 - April', '5 - Mei', '6 - Juni', '7 - Juli', '8 - Agustus', '9 - September', '10 - Oktober', '11 - November', '12 - Desember'];
                                            foreach ($months as $key => $month) {
                                                echo "<option value=\"" . ($key + 1) . "\">$month</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label>Instagram</label>
                                    </div>
                                    <input class="form-control" placeholder="Value Instagram ID" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" onclick="ubahProfile()">Ubah
                                Profile</button>
                        </div>
                    </div>

                    <!-- Change Password -->
                    <div class="box_booking_3 style_2 box_booking_hidden box_password_hidden">
                        <div class="head">
                            <div class="title">
                                <h3 class="back_btn_2">Change Password</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div class="form-group">
                                <label>Password Saat Ini</label>
                                <input type="password" class="form-control" placeholder="Password Saat Ini" disabled>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" placeholder="Password Baru" disabled>
                            </div>
                            <div class="form-group">
                                <label>Re-type Password Baru</label>
                                <input type="password" class="form-control" placeholder="Re-type Password Baru" disabled>
                            </div>
                        </div>
                        <div class="text-right-2">
                            <button id="ubahPasswordBtn" class="btn btn-primary" onclick="ubahPassword()">Ubah
                                Password</button>
                        </div>
                    </div>

                    <!-- Voucher Saya -->
                    <div class="box_booking_4 style_2 box_booking_hidden box_promo_hidden">
                        <div class="head">
                            <div class="title">
                                <h3 class="back_btn_3">Voucher Promo Saya</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="promo">
                            <a href="#detail-promo" class="btn_2 full-width mb_5 btn-with-img" data-bs-toggle="modal"
                                data-bs-target="#promoModal">
                                <div class="img-container">
                                    <img src="{{ asset('desain/1.jpg') }}" alt="Promo Image" width="150"
                                        height="50">
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Transaksi Saya -->
                    <div class="box_booking_5 style_2 box_booking_hidden box_transaksi_hidden">
                        <div class="head">
                            <div class="title">
                                <h3 class="back_btn_4">History Transaksi Saya</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <a href="#detail-point" class="btn_1 full-width mb_5" style="margin-top: 20px"
                                data-bs-toggle="modal" data-bs-target="#transaksiModal">30 Mei 2024 - Rp. 100.000</a>
                        </div>
                    </div>

                    <!-- Points -->
                    <div class="box_booking_6 style_2 box_booking_hidden box_points_hidden">
                        <div class="head">
                            <div class="title">
                                <h3 class="back_btn_5">Point Member Saya</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <a href="#detail-point" class="btn_1 full-width mb_5 icon-points" style="margin-top: 20px"
                                data-bs-toggle="modal" data-bs-target="#pointModal">100
                                Points</a>
                        </div>
                    </div>

                    <!-- Struk Pembelian Online -->
                    <div class="box_booking_7 style_2 box_booking_hidden box_online_hidden">
                        <div class="head">
                            <div class="title-2">
                                <h3 class="back_btn_6">Pembelian Online</h3>
                                <a href="/konversi-point" class="plus_icon"></a>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <a href="#detail-struk" class="btn_1 full-width mb_5" style="margin-top: 20px"
                                data-bs-toggle="modal" data-bs-target="#strukModal">30 Mei 2024</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->

    <!-- Modal Verification Email -->
    <div class="modal fade" id="verificationEmailModal" tabindex="-1" aria-labelledby="verificationEmailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vin Autism Gallery Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 17px;">
                        <p>EMAIL</p>
                        <p id="timerTextEmail" style="text-align: center;"></p>
                    </div>
                    <div class="text-center" style="padding-bottom: 10px;">
                        <input type="text" name="" class="form-control" placeholder="Masukkan Kode" required
                            style="margin-bottom: 20px;">
                        <a href="{{ route('login') }}" class="btn btn-success">Simpan</a>
                        <a class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Verification Email -->

    <!-- Modal Phone -->
    <div class="modal fade" id="verificationPhoneModal" tabindex="-1" aria-labelledby="verificationPhoneModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vin Autism Gallery Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 17px;">
                        <p>PHONE</p>
                        <p id="timerTextPhone" style="text-align: center;"></p>
                    </div>
                    <div class="text-center" style="padding-bottom: 10px;">
                        <input type="text" name="" class="form-control" placeholder="Masukkan Kode" required
                            style="margin-bottom: 20px;">
                        <a href="{{ route('login') }}" class="btn btn-success">Simpan</a>
                        <a class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Phone -->

    <!-- Modal Promo -->
    <div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vin Autism Gallery Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 17px;">
                        <h2>Detail Promo</h2>
                        <p>Deskripsi : </p>
                        <p>Syarat Ketentuan : </p>
                        <p>Mulai : </p>
                        <p>Berakhir : </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Promo -->

    <!-- Modal Point -->
    <div class="modal fade" id="pointModal" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vin Autism Gallery Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Apabila Point didapatkan dari Transaksi -->
                <div class="modal-body">
                    <!-- Detail Promo -->
                    <div style="margin-bottom: 17px;">
                        <h2>Detail Point</h2>
                        <p>Dapat karena hasil dari transaksi senilai Rp. 100.000</p>
                    </div>
                    <!-- History Transaksi -->
                    <div style="margin-bottom: 17px;">
                        <h2>History Transaksi</h2>
                        <p><strong>ID Transaksi:</strong> TRX123456789</p>
                        <p><strong>Tanggal:</strong> 30 Mei 2024</p>
                        <p><strong>Pelanggan:</strong> John Doe</p>
                        <p><strong>Items:</strong></p>
                        <div style="max-height: 100px; overflow-y: auto;">
                            <ul>
                                <li>Item 1 - Rp50.000</li>
                                <li>Item 2 - Rp30.000</li>
                                <li>Item 3 - Rp20.000</li>
                                <li>Item 4 - Rp40.000</li>
                                <li>Item 5 - Rp25.000</li>
                                <!-- Tambahkan lebih banyak item jika diperlukan -->
                            </ul>
                        </div>
                        <p><strong>Total:</strong> Rp100.000</p>
                        <p><strong>Metode Pembayaran:</strong> QRIS</p>
                        <p><strong>Status:</strong> Berhasil</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Point -->

    <!-- Modal Transaksi -->
    <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vin Autism Gallery Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- History Transaksi -->
                    <div style="margin-bottom: 17px;">
                        <h2>History Transaksi</h2>
                        <p><strong>ID Transaksi:</strong> TRX123456789</p>
                        <p><strong>Tanggal:</strong> 30 Mei 2024</p>
                        <p><strong>Pelanggan:</strong> John Doe</p>
                        <p><strong>Items:</strong></p>
                        <div style="max-height: 100px; overflow-y: auto;">
                            <ul>
                                <li>Item 1 - Rp50.000</li>
                                <li>Item 2 - Rp30.000</li>
                                <li>Item 3 - Rp20.000</li>
                                <li>Item 4 - Rp40.000</li>
                                <li>Item 5 - Rp25.000</li>
                                <!-- Tambahkan lebih banyak item jika diperlukan -->
                            </ul>
                        </div>
                        <p><strong>Total:</strong> Rp100.000</p>
                        <p><strong>Metode Pembayaran:</strong> QRIS</p>
                        <p><strong>Status:</strong> Berhasil</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Transaksi -->

    <!-- Modal Struk Pembelian Online -->
    <div class="modal fade" id="strukModal" tabindex="-1" aria-labelledby="strukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vin Autism Gallery Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 17px;">
                        <h2>Foto Struk Pembelian Online</h2>
                        <p><strong>Tanggal : </strong>30 Mei 2024</p>
                        <div class="img-container">
                            <img src="{{ asset('resto/gallery.jpeg') }}" alt="Foto Struk Pembelian Online"
                                style="width: 100%;" data-bs-toggle="modal" data-bs-target="#imageModal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Struk Pembelian Online -->

    <!-- Modal Gambar Struk -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" src="{{ asset('resto/gallery.jpeg') }}" alt="Foto Struk Pembelian Online"
                        style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Gambar Struk -->

    <!-- style -->
    <style>
        /* hilang kan display untuk hp */
        @media (max-width: 991px) {
            .box_booking_hidden {
                display: none !important;
            }

            .box_booking_visible {
                display: block !important;
            }

            .back_btn,
            .back_btn_2,
            .back_btn_3,
            .back_btn_4,
            .back_btn_5,
            .back_btn_6 {
                position: relative;
                padding-left: 20px;
                /* Menambahkan ruang di sebelah kiri untuk panah */
            }

            .back_btn::before,
            .back_btn_2::before,
            .back_btn_3::before,
            .back_btn_4::before,
            .back_btn_5::before,
            .back_btn_6::before {
                content: '\2039';
                position: absolute;
                left: 10px;
                /* Position it 10px from the left edge */
                font-size: 30px;
                /* Adjust size as needed */
                line-height: 1;
                /* Adjust to align with text */
            }

            .col-md-6 {
                margin-bottom: 1rem;
            }

            a.icon-account.actived,
            .icon-account.actived,
            a.icon-password.actived,
            .icon-password.actived,
            a.icon-my-voucher.actived,
            .icon-my-voucher.actived,
            a.icon-history.actived,
            .icon-history.actived,
            a.icon-points.actived,
            .icon-points.actived,
            a.icon-online.actived,
            .icon-online.actived {
                background: white;
            }
        }

        .title-2 {
            position: relative;
        }

        .plus_icon {
            position: absolute;
            top: 0;
            right: 0;
            margin-top: -10px;
        }

        .plus_icon::after {
            content: '+';
            /* Konten ikon tambah */
            /* Atur gaya ikon tambah sesuai kebutuhan */
            font-size: 30px;
            color: white;
            /* Warna ikon */
        }

        /* Style untuk tombol */
        .btn-primary {
            border: 0px;
            border-color: black;
            background-color: #978667;
            color: white;
            padding: 10px;
            font-size: 13px;
        }

        .btn-primary:hover {
            border-color: black;
            background-color: burlywood;
        }

        /* Style untuk container tombol */
        .text-right,
        .text-right-2 {
            text-align: right;
            margin-top: -15px;
            padding-right: 25px;
            padding-bottom: 25px;
        }

        /* button modal */
        p {
            margin-bottom: 3px;
        }

        /* button halaman */
        .d-flex {
            display: flex !important;
            flex-wrap: wrap;
            flex-direction: row;
            bottom: -16px;
        }

        .d-flex-2 {
            display: flex !important;
            flex-wrap: nowrap;
            flex-direction: row;
        }

        .col-md-6 {
            margin-top: -16px;
            margin-bottom: 1rem;
        }

        @media(min-width: 992px) {

            a.icon-account.actived,
            .icon-account.actived,
            a.icon-password.actived,
            .icon-password.actived,
            a.icon-my-voucher.actived,
            .icon-my-voucher.actived,
            a.icon-history.actived,
            .icon-history.actived,
            a.icon-points.actived,
            .icon-points.actived,
            a.icon-online.actived,
            .icon-online.actived {
                background: orange;
                /* Untuk memastikan tombol tetap tidak dapat diklik saat dalam status active */
                pointer-events: none;
                cursor: default;
            }
        }

        a.icon-account:hover,
        .icon-account:hover,
        a.icon-password:hover,
        .icon-password:hover,
        a.icon-my-voucher:hover,
        .icon-my-voucher:hover,
        a.icon-history:hover,
        .icon-history:hover,
        a.icon-points:hover,
        .icon-points:hover,
        a.icon-online:hover,
        .icon-online:hover {
            background: orange;
            /* Tetap menggunakan warna oranye saat hover */
        }


        /* button account & navigasi */
        a.btn_1,
        .btn_1 {
            background: white;
            color: black;
            border: 1px solid black;
            position: relative;
            padding-right: 20px;
            padding-left: 25px;
        }

        a.btn_2,
        .btn_2 {
            background: white;
            color: black;
            border: 1px solid black;
            position: relative;
            padding-right: 20px;
            padding-left: 25px;
            height: 180px;
        }

        a.icon-account::before {
            content: '\1F464';
            /* Unicode untuk ikon akun (👤) */
            position: absolute;
            left: 10px;
            font-size: 16px;
            line-height: 1;
        }

        a.icon-password::before {
            content: '\1F511';
            /* Unicode untuk ikon password (🔑) */
            position: absolute;
            left: 10px;
            font-size: 16px;
            line-height: 1;
        }

        a.icon-my-voucher::before {
            content: '\1F381';
            /* Unicode untuk ikon kotak hadiah (🎁) */
            position: absolute;
            left: 10px;
            font-size: 16px;
            line-height: 1;
        }

        a.icon-history::before {
            content: '\1F4C3';
            /* Unicode untuk ikon transaksi (📃) */
            position: absolute;
            left: 10px;
            font-size: 16px;
            line-height: 1;
        }

        a.icon-points::before {
            content: '\1F4B0';
            /* Unicode untuk ikon koin (💰) */
            position: absolute;
            left: 10px;
            font-size: 16px;
            line-height: 1;
        }

        a.icon-home::before {
            content: '\1F3E0';
            /* Unicode untuk ikon rumah (🏠) */
            position: absolute;
            left: 10px;
            font-size: 16px;
            line-height: 1;
        }

        a.btn_1::after,
        a.btn_2::after {
            content: '\003E';
            /* Unicode for the '>' character */
            position: absolute;
            right: 10px;
            /* Position it 10px from the right edge */
            font-size: 16px;
            /* Adjust size as needed */
            line-height: 1;
            /* Adjust to align with text */
        }

        a.icon-online::before {
            content: '\1F9FE';
            /* Unicode untuk ikon struk pembelian (🧾) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Sesuaikan ukuran sesuai kebutuhan */
            line-height: 1;
            /* Sesuaikan untuk menyelaraskan dengan teks */
        }


        a.icon-menu::before {
            content: '\1F374';
            /* Unicode untuk ikon daftar menu makanan (🍴) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Adjust size as needed */
            line-height: 1;
            /* Adjust to align with text */
        }

        a.icon-promo::before {
            content: '\1F4B8';
            /* Unicode untuk ikon voucher (💸) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Adjust size as needed */
            line-height: 1;
            /* Adjust to align with text */
        }

        a.icon-gallery::before {
            content: '\1F5BC';
            /* Unicode untuk ikon gallery (🖼️) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Adjust size as needed */
            line-height: 1;
            /* Adjust to align with text */
        }

        a.icon-review::before {
            content: '\1F4DD';
            /* Unicode untuk ikon review (📝) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Adjust size as needed */
            line-height: 1;
            /* Adjust to align with text */
        }

        a.icon-maps::before {
            content: '\1F310';
            /* Unicode untuk ikon peta (🌐) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Sesuaikan ukuran sesuai kebutuhan */
            line-height: 1;
            /* Sesuaikan untuk menyelaraskan dengan teks */
        }


        a.icon-career::before {
            content: '\1F4F0';
            /* Unicode untuk ikon karir (📰) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Sesuaikan ukuran sesuai kebutuhan */
            line-height: 1;
            /* Sesuaikan untuk menyelaraskan dengan teks */
        }

        a.icon-contact::before {
            content: '\1F4E9';
            /* Unicode untuk ikon contact (📩) */
            position: absolute;
            left: 10px;
            /* Position it 10px from the left edge */
            font-size: 16px;
            /* Adjust size as needed */
            line-height: 1;
            /* Adjust to align with text */
        }

        .navigation-text {
            margin-bottom: 10px;
            font-size: 15px;
            text-align: center;
        }

        .disabled-link {
            color: white;
            /* Warna teks yang redup */
            cursor: not-allowed;
            /* Mengubah kursor saat diarahkan ke tautan */
            pointer-events: none;
            /* Mencegah tautan dari menerima event mouse */
            text-decoration: none;
            /* Hilangkan dekorasi tautan */
        }

        /* box booking */
        @media (min-width: 992px) {
            .box_profile_visible {
                display: block;
            }

            .box_profile_hidden {
                display: none;
            }

            .box_password_visible {
                display: block;
            }

            .box_password_hidden {
                display: none;
            }

            .box_promo_visible {
                display: block;
            }

            .box_promo_hidden {
                display: none;
            }

            .box_transaksi_visible {
                display: block;
            }

            .box_transaksi_hidden {
                display: none;
            }

            .box_points_visible {
                display: block;
            }

            .box_points_hidden {
                display: none;
            }

            .box_online_visible {
                display: block;
            }

            .box_online_hidden {
                display: none;
            }
        }

        /* button promo */
        .btn-with-img {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .btn-with-img .img-container {
            flex: 0 0 auto;
            margin-right: 10px;
            /* Jarak antara gambar dan teks */
        }

        .btn-with-img .text-container {
            flex: 1 1 auto;
        }

        .btn-with-img img {
            max-width: 100%;
            height: auto;
        }

        .promo {
            height: 180px;
        }
    </style>
    <!-- /style -->

    <script>
        // Timer //
        document.addEventListener("DOMContentLoaded", function() {
            var oneMinute = 60; // Satu menit
            var displayEmail = document.querySelector('#timerTextEmail');
            var displayPhone = document.querySelector('#timerTextPhone');
            var intervalEmail, intervalPhone;

            function startTimer(duration, display) {
                var timer = duration,
                    minutes, seconds;
                var interval = setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(interval);
                        display.textContent = "Verifikasi ulang";
                        var resendLink = document.createElement('a');
                        if (display === displayEmail) {
                            resendLink.href = "/resend_verification_email";
                        } else if (display === displayPhone) {
                            resendLink.href = "/resend_verification_phone";
                        }
                        resendLink.innerText = "Kirim Verifikasi Ulang";
                        display.innerHTML = "";
                        display.appendChild(resendLink);
                    }
                }, 1000);

                display.intervalId = interval;
            }

            function resetTimer(display) {
                clearInterval(display.intervalId);
                display.textContent = "01:00"; // Set ulang timer menjadi 1 menit
            }

            function stopTimer(display) {
                clearInterval(display.intervalId);
            }

            // Event listener untuk modal Email
            $('#verificationEmailModal').on('show.bs.modal', function() {
                resetTimer(displayEmail);
                startTimer(oneMinute, displayEmail);
            });

            $('#verificationEmailModal').on('hide.bs.modal', function() {
                stopTimer(displayEmail);
            });

            // Event listener untuk modal Phone
            $('#verificationPhoneModal').on('show.bs.modal', function() {
                resetTimer(displayPhone);
                startTimer(oneMinute, displayPhone);
            });

            $('#verificationPhoneModal').on('hide.bs.modal', function() {
                stopTimer(displayPhone);
            });
        });

        // // Fungsi untuk mengaktifkan timer email
        // function startTimerEmail(duration, display) {
        //     var timer = duration,
        //         minutes, seconds;
        //     var timerInterval = setInterval(function() {
        //         minutes = parseInt(timer / 60, 10);
        //         seconds = parseInt(timer % 60, 10);

        //         minutes = minutes < 10 ? "0" + minutes : minutes;
        //         seconds = seconds < 10 ? "0" + seconds : seconds;

        //         display.textContent = minutes + ":" + seconds;

        //         if (--timer < 0) {
        //             clearInterval(timerInterval);
        //             display.textContent = "Verifikasi ulang";
        //             var resendLink = document.createElement('a');
        //             resendLink.href = "/resend_verification_email'";
        //             resendLink.innerText = "Kirim Verifikasi Ulang";
        //             display.innerHTML = "";
        //             display.appendChild(resendLink);
        //         }
        //     }, 1000);
        // }

        // // Memulai timer email saat halaman email dimuat
        // document.addEventListener("DOMContentLoaded", function() {
        //     var oneMinute = 60 * 1, // Satu menit
        //         display = document.querySelector('#timerTextEmail');
        //     startTimerEmail(oneMinute, display);
        // });

        // // Fungsi untuk mengaktifkan timer phone
        // function startTimerPhone(duration, display) {
        //     var timer = duration,
        //         minutes, seconds;
        //     var timerInterval = setInterval(function() {
        //         minutes = parseInt(timer / 60, 10);
        //         seconds = parseInt(timer % 60, 10);

        //         minutes = minutes < 10 ? "0" + minutes : minutes;
        //         seconds = seconds < 10 ? "0" + seconds : seconds;

        //         display.textContent = minutes + ":" + seconds;

        //         if (--timer < 0) {
        //             clearInterval(timerInterval);
        //             display.textContent = "Verifikasi ulang";
        //             var resendLink = document.createElement('a');
        //             resendLink.href = "/resend_verification_phone'";
        //             resendLink.innerText = "Kirim Verifikasi Ulang";
        //             display.innerHTML = "";
        //             display.appendChild(resendLink);
        //         }
        //     }, 1000);
        // }

        // // Memulai timer phone saat halaman phone dimuat
        // document.addEventListener("DOMContentLoaded", function() {
        //     var oneMinute = 60 * 1, // Satu menit
        //         display = document.querySelector('#timerTextPhone');
        //     startTimerPhone(oneMinute, display);
        // });

        //-------------------------------------------------------------------------------------------------------------//
        //-------------------------------------------------------------------------------------------------------------//

        // Actived Icon //
        let lastActiveIcon = null; // Variabel global untuk menyimpan elemen ikon yang terakhir aktif

        // Fungsi untuk menambahkan kelas 'actived' jika lebar layar lebih dari 991px
        function addActiveClass(button) {
            if (window.innerWidth > 991) {
                button.classList.add('actived');
            }
            lastActiveIcon = element;
        }

        // Fungsi untuk memeriksa apakah kelas 'actived' diterapkan pada salah satu ikon
        function checkActiveIcon() {
            const iconClasses = ['.icon-account', '.icon-password', '.icon-my-voucher', '.icon-history', '.icon-points',
                '.icon-online'
            ];
            let activeIcon = null;

            iconClasses.forEach(function(iconClass) {
                const icon = document.querySelector(iconClass);
                if (icon && icon.classList.contains('actived')) {
                    activeIcon = icon;
                }
            });

            return activeIcon;
        }

        // Fungsi untuk menghapus kelas 'actived' dari semua ikon
        function removeAllActiveClasses() {
            const iconClasses = ['.icon-account', '.icon-password', '.icon-my-voucher', '.icon-history', '.icon-points',
                '.icon-online'
            ];

            iconClasses.forEach(function(iconClass) {
                const icon = document.querySelector(iconClass);
                if (icon) {
                    icon.classList.remove('actived');
                }
            });
        }

        // Fungsi untuk menangani peristiwa ketika pengguna menekan halaman selain yang diperiksa
        function handlePageClick() {
            // Memilih tombol "Akun Saya"
            const akunSayaButton = document.getElementById('akunSayaButton');
            // Menambahkan event listener untuk tombol "Akun Saya"
            akunSayaButton.addEventListener('click', function(event) {
                const element = event.target; // Mendapatkan elemen yang diklik
                var inputs = document.querySelectorAll('.form-control');
                inputs.forEach(function(input) {
                    if (!input.disabled) {
                        resetPasswordForm();
                    }
                });

                // Jika lebar layar <= 991px
                if (window.innerWidth <= 991) {
                    // Sembunyikan elemen dengan kelas 'box_booking' 1 - 3 - 4 - 5 - 6 - 7, kemudian tampilkan elemen dengan kelas 'box_booking_2'
                    document.querySelector('.box_booking_2').classList.remove('box_booking_hidden');
                    document.querySelector('.box_booking_2').classList.add('box_booking_visible');

                    document.querySelector('.box_booking').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_booking_visible');
                } else {
                    document.querySelector('.box_booking_2').classList.add('box_profile_visible');
                    document.querySelector('.box_booking_2').classList.remove('box_profile_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                    document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                    document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                    document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                    document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                    document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                    document.querySelector('.box_booking_7').classList.add('box_online_hidden');
                }
                // Memanggil handleClick dengan elemen yang diklik sebagai argumen
                handleClick(element);
            });

            // Memilih tombol "Password"
            const passwordButton = document.getElementById('passwordButton');
            // Menambahkan event listener untuk tombol "Akun Saya"
            passwordButton.addEventListener('click', function(event) {
                const element = event.target; // Mendapatkan elemen yang diklik
                var inputs = document.querySelectorAll('.form-control');
                inputs.forEach(function(input) {
                    if (!input.disabled) {
                        resetProfileForm();
                    }
                });

                // Jika lebar layar <= 991px
                if (window.innerWidth <= 991) {
                    // Sembunyikan elemen dengan kelas 'box_booking'1 - 2 - 4 - 5 - 6 - 7, kemudian tampilkan elemen dengan kelas 'box_booking_3'
                    document.querySelector('.box_booking_3').classList.remove('box_booking_hidden');
                    document.querySelector('.box_booking_3').classList.add('box_booking_visible');

                    document.querySelector('.box_booking').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_2').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_booking_visible');
                } else {
                    document.querySelector('.box_booking_2').classList.add('box_profile_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_profile_visible');
                    document.querySelector('.box_booking_3').classList.remove('box_password_hidden');
                    document.querySelector('.box_booking_3').classList.add('box_password_visible');
                    document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                    document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                    document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                    document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                    document.querySelector('.box_booking_7').classList.add('box_online_hidden');
                }
                // Memanggil handleClick dengan elemen yang diklik sebagai argumen
                handleClick(element);
            });

            // Memilih tombol "Promo"
            const promoButton = document.getElementById('promoButton');
            // Menambahkan event listener untuk tombol "Akun Saya"
            promoButton.addEventListener('click', function(event) {
                const element = event.target; // Mendapatkan elemen yang diklik
                var inputs = document.querySelectorAll('.form-control');
                inputs.forEach(function(input) {
                    if (!input.disabled) {
                        resetProfileForm();
                    }
                });

                // Jika lebar layar <= 991px
                if (window.innerWidth <= 991) {
                    // Sembunyikan elemen dengan kelas 'box_booking'1 - 2 - 3 - 5 - 6 - 7, kemudian tampilkan elemen dengan kelas 'box_booking_4'
                    document.querySelector('.box_booking_4').classList.remove('box_booking_hidden');
                    document.querySelector('.box_booking_4').classList.add('box_booking_visible');

                    document.querySelector('.box_booking').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_2').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_booking_visible');
                } else {
                    document.querySelector('.box_booking_2').classList.add('box_profile_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_profile_visible');
                    document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                    document.querySelector('.box_booking_4').classList.remove('box_promo_hidden');
                    document.querySelector('.box_booking_4').classList.add('box_promo_visible');
                    document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                    document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                    document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                    document.querySelector('.box_booking_7').classList.add('box_online_hidden');
                }
                // Memanggil handleClick dengan elemen yang diklik sebagai argumen
                handleClick(element);
            });

            // Memilih tombol "Transaksi"
            const transactionButton = document.getElementById('transactionButton');
            // Menambahkan event listener untuk tombol "Akun Saya"
            transactionButton.addEventListener('click', function(event) {
                const element = event.target; // Mendapatkan elemen yang diklik
                var inputs = document.querySelectorAll('.form-control');
                inputs.forEach(function(input) {
                    if (!input.disabled) {
                        resetProfileForm();
                    }
                });

                // Jika lebar layar <= 991px
                if (window.innerWidth <= 991) {
                    // Sembunyikan elemen dengan kelas 'box_booking'1 - 2 - 3 - 4 - 6 - 7, kemudian tampilkan elemen dengan kelas 'box_booking_5'
                    document.querySelector('.box_booking_5').classList.remove('box_booking_hidden');
                    document.querySelector('.box_booking_5').classList.add('box_booking_visible');

                    document.querySelector('.box_booking').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_2').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_booking_visible');
                } else {
                    document.querySelector('.box_booking_2').classList.add('box_profile_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_profile_visible');
                    document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                    document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                    document.querySelector('.box_booking_5').classList.add('box_transaksi_visible');
                    document.querySelector('.box_booking_5').classList.remove('box_transaksi_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                    document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                    document.querySelector('.box_booking_7').classList.add('box_online_hidden');
                }
                // Memanggil handleClick dengan elemen yang diklik sebagai argumen
                handleClick(element);
            });

            // Memilih tombol "Points"
            const pointButton = document.getElementById('pointButton');
            // Menambahkan event listener untuk tombol "Akun Saya"
            pointButton.addEventListener('click', function(event) {
                const element = event.target; // Mendapatkan elemen yang diklik
                var inputs = document.querySelectorAll('.form-control');
                inputs.forEach(function(input) {
                    if (!input.disabled) {
                        resetProfileForm();
                    }
                });

                // Jika lebar layar <= 991px
                if (window.innerWidth <= 991) {
                    // Sembunyikan elemen dengan kelas 'box_booking'1 - 2 - 3 - 4 - 5 - 7, kemudian tampilkan elemen dengan kelas 'box_booking_6'
                    document.querySelector('.box_booking_6').classList.remove('box_booking_hidden');
                    document.querySelector('.box_booking_6').classList.add('box_booking_visible');

                    document.querySelector('.box_booking').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_2').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_booking_visible');
                } else {
                    document.querySelector('.box_booking_2').classList.add('box_profile_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_profile_visible');
                    document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                    document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                    document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                    document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                    document.querySelector('.box_booking_6').classList.add('box_points_visible');
                    document.querySelector('.box_booking_6').classList.remove('box_points_hidden');
                    document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                    document.querySelector('.box_booking_7').classList.add('box_online_hidden');
                }
                // Memanggil handleClick dengan elemen yang diklik sebagai argumen
                handleClick(element);
            });

            // Memilih tombol "Struk Pembelian"
            const strukButton = document.getElementById('strukButton');
            // Menambahkan event listener untuk tombol "Akun Saya"
            strukButton.addEventListener('click', function(event) {
                const element = event.target; // Mendapatkan elemen yang diklik
                var inputs = document.querySelectorAll('.form-control');
                inputs.forEach(function(input) {
                    if (!input.disabled) {
                        resetProfileForm();
                    }
                });

                // Jika lebar layar <= 991px
                if (window.innerWidth <= 991) {
                    // Sembunyikan elemen dengan kelas 'box_booking'1 - 2 - 3 - 4 - 5 - 6, kemudian tampilkan elemen dengan kelas 'box_booking_7'
                    document.querySelector('.box_booking_7').classList.remove('box_booking_hidden');
                    document.querySelector('.box_booking_7').classList.add('box_booking_visible');

                    document.querySelector('.box_booking').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_2').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                } else {
                    document.querySelector('.box_booking_2').classList.add('box_profile_hidden');
                    document.querySelector('.box_booking_2').classList.remove('box_profile_visible');
                    document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                    document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                    document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                    document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                    document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                    document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                    document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                    document.querySelector('.box_booking_7').classList.add('box_online_visible');
                    document.querySelector('.box_booking_7').classList.remove('box_online_hidden');
                }
                // Memanggil handleClick dengan elemen yang diklik sebagai argumen
                handleClick(element);
            });

            // Menambahkan event listener untuk tombol "Back Profile"
            const backBtn = document.querySelector('.back_btn');
            backBtn.addEventListener('click', function(event) {
                // Hapus kelas "actived" dari semua tombol ikon
                const icons = document.querySelectorAll(
                    '.icon-account, .icon-password, .icon-my-voucher, .icon-history, .icon-points, .icon-online'
                );
                icons.forEach(icon => {
                    icon.classList.remove('actived');
                });

                // Kembalikan tampilan "box_booking" dan "box_booking_2 sampai 7" ke status awalnya
                document.querySelector('.box_booking').classList.remove('box_booking_hidden');
                document.querySelector('.box_booking').classList.add('box_booking_visible');
                document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_booking_visible');
                window.location.hash = "";
            });

            // // Menambahkan event listener untuk tombol "Back Password"
            const backBtn2 = document.querySelector('.back_btn_2');
            backBtn2.addEventListener('click', function(event) {
                // Hapus kelas "actived" dari semua tombol ikon
                const icons = document.querySelectorAll(
                    '.icon-account, .icon-password, .icon-my-voucher, .icon-history, .icon-points, .icon-online'
                );
                icons.forEach(icon => {
                    icon.classList.remove('actived');
                });

                // Kembalikan tampilan "box_booking" dan "box_booking_2 sampai 7" ke status awalnya
                document.querySelector('.box_booking').classList.remove('box_booking_hidden');
                document.querySelector('.box_booking').classList.add('box_booking_visible');
                document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_booking_visible');

                document.querySelector('.box_booking_2').classList.add('box_profile_visible');
                document.querySelector('.box_booking_2').classList.remove('box_profile_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                document.querySelector('.box_booking_7').classList.add('box_online_hidden');

                window.location.hash = "";
            });

            // // Menambahkan event listener untuk tombol "Back Promo"
            const backBtn3 = document.querySelector('.back_btn_3');
            backBtn3.addEventListener('click', function(event) {
                // Hapus kelas "actived" dari semua tombol ikon
                const icons = document.querySelectorAll(
                    '.icon-account, .icon-password, .icon-my-voucher, .icon-history, .icon-points, .icon-online'
                );
                icons.forEach(icon => {
                    icon.classList.remove('actived');
                });

                // Kembalikan tampilan "box_booking" dan "box_booking_2 sampai 7" ke status awalnya
                document.querySelector('.box_booking').classList.remove('box_booking_hidden');
                document.querySelector('.box_booking').classList.add('box_booking_visible');
                document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_booking_visible');

                document.querySelector('.box_booking_2').classList.add('box_profile_visible');
                document.querySelector('.box_booking_2').classList.remove('box_profile_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                document.querySelector('.box_booking_7').classList.add('box_online_hidden');

                window.location.hash = "";
            });

            // // Menambahkan event listener untuk tombol "Back Transaksi"
            const backBtn4 = document.querySelector('.back_btn_4');
            backBtn4.addEventListener('click', function(event) {
                // Hapus kelas "actived" dari semua tombol ikon
                const icons = document.querySelectorAll(
                    '.icon-account, .icon-password, .icon-my-voucher, .icon-history, .icon-points, .icon-online'
                );
                icons.forEach(icon => {
                    icon.classList.remove('actived');
                });

                // Kembalikan tampilan "box_booking" dan "box_booking_2 sampai 7" ke status awalnya
                document.querySelector('.box_booking').classList.remove('box_booking_hidden');
                document.querySelector('.box_booking').classList.add('box_booking_visible');
                document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_booking_visible');

                document.querySelector('.box_booking_2').classList.add('box_profile_visible');
                document.querySelector('.box_booking_2').classList.remove('box_profile_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                document.querySelector('.box_booking_7').classList.add('box_online_hidden');

                window.location.hash = "";
            });

            // // Menambahkan event listener untuk tombol "Back Points"
            const backBtn5 = document.querySelector('.back_btn_5');
            backBtn5.addEventListener('click', function(event) {
                // Hapus kelas "actived" dari semua tombol ikon
                const icons = document.querySelectorAll(
                    '.icon-account, .icon-password, .icon-my-voucher, .icon-history, .icon-points, .icon-online'
                );
                icons.forEach(icon => {
                    icon.classList.remove('actived');
                });

                // Kembalikan tampilan "box_booking" dan "box_booking_2 sampai 7" ke status awalnya
                document.querySelector('.box_booking').classList.remove('box_booking_hidden');
                document.querySelector('.box_booking').classList.add('box_booking_visible');
                document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_booking_visible');

                document.querySelector('.box_booking_2').classList.add('box_profile_visible');
                document.querySelector('.box_booking_2').classList.remove('box_profile_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                document.querySelector('.box_booking_7').classList.add('box_online_hidden');

                window.location.hash = "";
            });

            // // Menambahkan event listener untuk tombol "Back Points"
            const backBtn6 = document.querySelector('.back_btn_6');
            backBtn6.addEventListener('click', function(event) {
                // Hapus kelas "actived" dari semua tombol ikon
                const icons = document.querySelectorAll(
                    '.icon-account, .icon-password, .icon-my-voucher, .icon-history, .icon-points, .icon-online'
                );
                icons.forEach(icon => {
                    icon.classList.remove('actived');
                });

                // Kembalikan tampilan "box_booking" dan "box_booking_2 sampai 7" ke status awalnya
                document.querySelector('.box_booking').classList.remove('box_booking_hidden');
                document.querySelector('.box_booking').classList.add('box_booking_visible');
                document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_4').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_5').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_6').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_booking_visible');
                document.querySelector('.box_booking_7').classList.add('box_booking_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_booking_visible');

                document.querySelector('.box_booking_2').classList.add('box_profile_visible');
                document.querySelector('.box_booking_2').classList.remove('box_profile_hidden');
                document.querySelector('.box_booking_3').classList.remove('box_password_visible');
                document.querySelector('.box_booking_3').classList.add('box_password_hidden');
                document.querySelector('.box_booking_4').classList.remove('box_promo_visible');
                document.querySelector('.box_booking_4').classList.add('box_promo_hidden');
                document.querySelector('.box_booking_5').classList.remove('box_transaksi_visible');
                document.querySelector('.box_booking_5').classList.add('box_transaksi_hidden');
                document.querySelector('.box_booking_6').classList.remove('box_points_visible');
                document.querySelector('.box_booking_6').classList.add('box_points_hidden');
                document.querySelector('.box_booking_7').classList.remove('box_online_visible');
                document.querySelector('.box_booking_7').classList.add('box_online_hidden');

                window.location.hash = "";
            });


            // Menambahkan event listener untuk setiap tombol ikon
            const buttons = document.querySelectorAll(
                '.icon-account, .icon-password, .icon-my-voucher, .icon-history, .icon-points, .icon-online');
            buttons.forEach(button => {
                button.addEventListener('click', function(event) {
                    const targetElement = event.target;
                    const activeIcon = checkActiveIcon();
                    if (activeIcon && activeIcon !== targetElement) {
                        activeIcon.classList.remove('actived');
                    }
                    targetElement.classList.add('actived');
                });
            });
        }


        // Fungsi untuk menangani perubahan ukuran jendela
        function handleResize() {
            // Check 'actived' untuk last actived
            lastActiveIcon = checkActiveIcon();

            // Jika lebar layar lebih dari 991px, tambahkan kelas 'actived' ke ikon yang terakhir aktif
            if (lastActiveIcon) {
                document.querySelector('.icon-account').classList.remove('actived');
                addActiveClass(lastActiveIcon);
            } else {
                // Jika tidak ada ikon yang aktif terakhir, aktifkan ikon default
                const defaultIcon = document.querySelector('.icon-account');
                if (defaultIcon) {
                    window.location.hash = "#user-profile";
                    addActiveClass(defaultIcon);
                    document.querySelector('.box_booking').classList.remove('box_booking_hidden');
                    document.querySelector('.box_booking').classList.add('box_booking_visible');
                    document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
                    document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
                    document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
                }
            }

            // if (window.innerWidth <= 991) {
            //     removeAllActiveClasses();
            // } else {
            //     // Jika lebar layar lebih dari 991px, tambahkan kelas 'actived' ke ikon yang terakhir aktif
            //     if (lastActiveIcon) {
            //         addActiveClass(lastActiveIcon);
            //     } else {
            //         // Jika tidak ada ikon yang aktif terakhir, aktifkan ikon default
            //         const defaultIcon = document.querySelector('.icon-account');
            //         if (defaultIcon) {
            //             addActiveClass(defaultIcon);
            //             document.querySelector('.box_booking').classList.remove('box_booking_hidden');
            //             document.querySelector('.box_booking').classList.add('box_booking_visible');
            //             document.querySelector('.box_booking_2').classList.remove('box_booking_visible');
            //             document.querySelector('.box_booking_3').classList.add('box_booking_hidden');
            //             document.querySelector('.box_booking_3').classList.remove('box_booking_visible');
            //         }
            //     }
            // }
        }

        // Tambahkan event listener untuk perubahan ukuran jendela
        window.addEventListener('resize', handleResize);

        // Panggil fungsi untuk menangani peristiwa ketika pengguna menekan halaman selain yang diperiksa
        handlePageClick();

        // Panggil fungsi handleResize saat halaman pertama kali dimuat
        handleResize();

        // --------------------------------------------------------------------------------------------------//

        // Button Ubah, Save, Cancel
        function ubahProfile() {
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(function(input) {
                input.disabled = !input.disabled;
            });

            enableVerifyButton();

            // Ganti tombol "Ubah Profile" dengan tombol "Save" dan "Cancel"
            var buttonContainer = document.querySelector('.text-right');
            buttonContainer.innerHTML = `
        <button class="btn btn-success" onclick="saveProfile()">Save</button>
        <button class="btn btn-secondary" onclick="cancelProfile()">Cancel</button>
    `;
        }

        function saveProfile() {
            // Simpan perubahan profil (tambahkan logika penyimpanan di sini)
            console.log('Profile saved');
            // Kembalikan tombol "Ubah Profile" dan nonaktifkan input
            resetProfileForm();
        }

        function cancelProfile() {
            // Batalkan perubahan dan kembalikan nilai asli
            console.log('Profile edit canceled');
            // Kembalikan tombol "Ubah Profile" dan nonaktifkan input
            resetProfileForm();
        }


        function resetProfileForm() {
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(function(input) {
                input.disabled = true;
            });

            disableVerifyButton();

            // Kembalikan tombol "Ubah Profile"
            var buttonContainer = document.querySelector('.text-right');
            buttonContainer.innerHTML = `
        <button class="btn btn-primary" onclick="ubahProfile()">Ubah Profile</button>
    `;
        }

        // Menangani klik pada tautan "Verify"
        document.getElementById('verifyEmailBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah aksi standar (membuka modal)
            event.stopPropagation(); // Mencegah penyebaran event ke atas (jika ada event listener lain)
        });

        document.getElementById('verifyPhoneBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah aksi standar (membuka modal)
            event.stopPropagation(); // Mencegah penyebaran event ke atas (jika ada event listener lain)
        });

        // Fungsi untuk mengaktifkan tautan "Verify"
        function enableVerifyButton() {
            var verifyEmailBtn = document.getElementById('verifyEmailBtn');
            var verifyPhoneBtn = document.getElementById('verifyPhoneBtn');
            verifyEmailBtn.classList.remove('disabled-link');
            verifyPhoneBtn.classList.remove('disabled-link');
        }

        // Fungsi untuk menonaktifkan tautan "Verify"
        function disableVerifyButton() {
            var verifyEmailBtn = document.getElementById('verifyEmailBtn');
            var verifyPhoneBtn = document.getElementById('verifyPhoneBtn');
            verifyEmailBtn.classList.add('disabled-link');
            verifyPhoneBtn.classList.add('disabled-link');
        }

        //--------------------------------------------------------------------------------------------------------//

        // Button Ubah Password
        function ubahPassword() {
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(function(input) {
                input.disabled = !input.disabled;
            });

            // Ganti tombol "Ubah Password" dengan tombol "Save" dan "Cancel"
            var buttonContainer = document.querySelector('.text-right-2');
            buttonContainer.innerHTML = `
        <button class="btn btn-success" onclick="savePassword()">Save</button>
        <button class="btn btn-secondary" onclick="cancelPassword()">Cancel</button>
    `;
        }

        function savePassword() {
            // Simpan perubahan Password (tambahkan logika penyimpanan di sini)
            console.log('Password saved');
            // Kembalikan tombol "Ubah Password" dan nonaktifkan input
            resetPasswordForm();
        }

        function cancelPassword() {
            // Batalkan perubahan dan kembalikan nilai asli
            console.log('Password edit canceled');
            // Kembalikan tombol "Ubah Password" dan nonaktifkan input
            resetPasswordForm();
        }


        function resetPasswordForm() {
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(function(input) {
                input.disabled = true;
            });

            // Kembalikan tombol "Ubah Profile"
            var buttonContainer = document.querySelector('.text-right-2');
            buttonContainer.innerHTML = `
        <button class="btn btn-primary" onclick="ubahPassword()">Ubah Profile</button>
    `;
        }
    </script>
@endsection
