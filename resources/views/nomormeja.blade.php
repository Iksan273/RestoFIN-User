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

    <!-- Modal Nomor Meja -->
    <div class="popup_wrapper">
        <div class="popup_content newsletter_c">
            <div class="row g-0">
                <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
                    <figure><img src="{{ asset('resto/gallery2.jpeg') }}" alt=""></figure>
                </div>
                <div class="col-md-7">
                    <div class="content">
                        <div class="wrapper">
                            <a href="{{route('index')}}">
                                <img src="{{ asset('resto/logo.png') }}" alt="" style="width: auto; height: auto; max-width: 140px; max-height: 35px;">
                            </a>
                            <h3>Nomor Meja</h3>
                            <p>Diharapkan untuk memasukkan nomor meja sebelum melakukan pembelian.</p>
                            <form id="tableNumberForm" action="{{route('save-table-number')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="number" name="table_number" class="form-control" placeholder="Nomor Meja"
                                        required min="1" max="30" step="1">
                                </div>
                                <button type="submit" class="btn_1 mt-2 mb-4">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
    <!-- /Modal Nomor Meja -->

    <!-- script -->
    <script>
        //Event listener untuk submit nomor meja dan simpan di session
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('tableNumberForm');

            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Menghindari perilaku default pengiriman form

                var formData = new FormData(form);

                fetch('{{route('save-table-number')}}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = '{{route('login')}}'; // Arahkan ke halaman login
                        } else {
                            alert('Gagal menyimpan nomor meja. Silakan coba lagi.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    });
            });
        });

        // function insertnomeja(){
        //     $('#tableNumberForm').submit();
        // }
    </script>
    <!-- /script -->
@endsection
