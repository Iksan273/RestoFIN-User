@extends('Layout.User')

@section('content')
    <main class="pattern_2">
        <div class="container margin_60_40">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: -10px;">
                    {{ session('success') }}
                    <button type="button" class="close-custom" onclick="this.parentElement.style.display='none';"
                        aria-label="Close">
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: -10px;">
                    {{ session('error') }}
                    <button type="button" class="close-custom" onclick="this.parentElement.style.display='none';"
                        aria-label="Close">
                    </button>
                </div>
            @endif
            
            <div class="row justify-content-center">
                <div class="col-lg-8" style="margin-top: 20px">
                    <form id="reviewForm" method="POST" action="{{ route('review.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="write_review">
                            <h1>Kritik dan Saran</h1>
                            <div class="rating_submit">
                                <div class="form-group mb-2">
                                    <label class="d-block">Rating Resto</label>
                                    <span class="rating mb-0">
                                        <input type="radio" class="rating-input" id="5_star" name="rating-input"
                                            value="5.0"><label for="5_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="4_star" name="rating-input"
                                            value="4.0"><label for="4_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="3_star" name="rating-input"
                                            value="3.0"><label for="3_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="2_star" name="rating-input"
                                            value="2.0"><label for="2_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="1_star" name="rating-input"
                                            value="1.0"><label for="1_star" class="rating-star"></label>
                                    </span>
                                </div>
                            </div>
                            <!-- /rating_submit -->
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" type="text" placeholder="Masukkan Nama Anda" name="name">
                            </div>
                            <div class="form-group">
                                <label>Judul Kritik & Saran</label>
                                <input class="form-control" type="text" placeholder="Judul Kritik & Saran Anda"
                                    name="title">
                            </div>
                            <div class="form-group mb-5">
                                <label>Isi Kritik & Saran</label>
                                <textarea class="form-control" style="height: 280px;" placeholder="Masukkan Penjelasan Kritik & Saran Anda"
                                    name="description"></textarea>
                            </div>
                            <p><button type="button" class="btn_1" onclick="kirim()">Submit review</button></p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
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

    <!-- script -->
    <script>
        function kirim() {
            event.preventDefault(); // Mencegah submit form otomatis

            // Mengambil nilai input
            var ratingInput = document.querySelector('input[name="rating-input"]:checked');
            var nameInput = document.querySelector('input[name="name"]');
            var titleInput = document.querySelector('input[name="title"]');
            var descriptionInput = document.querySelector('textarea[name="description"]');

            // Memeriksa apakah nilai input sudah terisi
            if (!ratingInput) {
                alert('Silakan beri rating untuk restoran.');
                return; // Menghentikan eksekusi fungsi jika rating belum terisi
            }

            if (!nameInput.value.trim()) {
                alert('Silakan masukkan nama Anda.');
                return;
            }

            if (!titleInput.value.trim()) {
                alert('Silakan masukkan judul kritik & saran Anda.');
                return;
            }

            if (!descriptionInput.value.trim()) {
                alert('Silakan masukkan isi kritik & saran Anda.');
                return;
            }

            // Jika semua validasi terpenuhi, kirim formulir
            var form = document.getElementById('reviewForm');
            form.submit();
        }
    </script>
    <!-- /script -->
@endsection
