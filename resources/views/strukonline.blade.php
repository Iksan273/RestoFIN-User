@extends('Layout.User')

@section('content')
    <main class="pattern_2">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-8" style="margin-top: 20px">
                    <div class="write_review">
                        <h1>Struk Pembelian Online</h1>
                        <br>
                        <div class="form-group">
                            <label>Masukkan Nomor Telepon atau Email Anda</label>
                            <input class="form-control" type="text" placeholder="Nomor Telepon atau Email">
                        </div>
                        <div class="form-group mb-5">
                            <label>Upload Gambar Anda</label>
                            <input type="file" class="form-control" id="imageUpload" accept="image/*">
                            <div id="imagePreview" style="margin-top: 10px;" class="">
                                <p>Pilih gambar untuk melihat pratinjau di sini</p>
                            </div>
                        </div>
                        <p><a class="btn_1" data-bs-toggle="modal"
                                data-bs-target="#pembelianOnlineModal">Submit</a></p>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>

    <!-- Modal Pembelian Online -->
    <div class="modal fade" id="pembelianOnlineModal" tabindex="-1" aria-labelledby="pembelianOnlineModalLabel"
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
                        <p>Validasi Akun</p>
                        <p>Apakah Anda yakin ingin melakukan penambahan point pada Akun ini?</p>
                    </div>
                    <div class="text-center" style="padding-bottom: 10px;">
                        <a href="{{ route('login') }}" class="btn btn-success">Kirim</a>
                        <a class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Pembelian Online -->

    <!-- script -->
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = ''; // Clear previous previews

            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '280px';
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = '<p>Pilih gambar untuk melihat pratinjau di sini</p>';
            }
        });
    </script>
    <!-- /script -->
@endsection
