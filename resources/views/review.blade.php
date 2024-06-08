@extends('Layout.User')

@section('content')
    <main class="pattern_2">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-8" style="margin-top: 20px">
                    <form id="reviewForm" method="POST" action="{{ route('review.store') }}">
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

    <!-- script -->
    <script>
        function kirim() {
            var form = document.getElementById('reviewForm');
            var formData = new FormData(form);

            fetch('{{ route('review.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData,
                })
                .then(response => {
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        return response.text().then(text => {
                            throw new Error(text);
                        });
                    }
                })
                .then(data => {
                    if (data.success) {
                        alert('Review berhasil dikirim');
                        window.location.href = '{{ route('review') }}';
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
        }
    </script>
    <!-- /script -->
@endsection
