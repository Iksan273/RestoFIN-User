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
                    <form id="strukForm" method="POST" action="{{ route('struk.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="write_review">
                            <h1>Struk Pembelian Online</h1>
                            <br>
                            <div class="form-group">
                                <label for="contactInfo">Masukkan Email Anda</label>
                                <input class="form-control" type="text" id="contactInfo"
                                    placeholder="Masukkan Email Anda" name="user" required>
                            </div>
                            <div class="form-group mb-5">
                                <label for="imageUpload">Upload Gambar Anda</label>
                                <input type="file" class="form-control" id="imageUpload" accept="image/*" name="foto"
                                    required>
                                <div id="imagePreview" style="margin-top: 10px; text-align: center;">
                                    <p>Pilih gambar untuk melihat pratinjau di sini</p>
                                    <br>
                                </div>
                            </div>
                            <p><a class="btn_1" id="submitBtn" data-bs-toggle="modal"
                                    data-bs-target="#pembelianOnlineModal">Submit</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Pembelian Online -->
    <div class="modal fade" id="pembelianOnlineModal" tabindex="-1" aria-labelledby="pembelianOnlineModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <b><span>Vinautism Art & Resto</span></b>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 17px;">
                        <p>Validasi Akun</p>
                        <p id="modalMessage">Apakah Anda yakin ingin melakukan penambahan point pada Akun ini?</p>
                    </div>
                    <div class="text-center" style="padding-bottom: 10px;">
                        <a class="btn btn-success" onclick="kirim()">Kirim</a>
                        <a class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Pembelian Online -->

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

        document.getElementById('submitBtn').addEventListener('click', function() {
            var contactInfo = document.getElementById('contactInfo').value;
            var modalMessage = document.getElementById('modalMessage');
            modalMessage.textContent = 'Apakah Anda yakin ingin melakukan penambahan point pada Akun - ' +
                contactInfo + '?';
        });

        function kirim() {
            event.preventDefault(); // Mencegah submit form otomatis
            var form = document.getElementById('strukForm');

            // Periksa apakah input email dan file tidak kosong
            var emailInput = document.getElementById('contactInfo');
            var fileInput = document.getElementById('imageUpload');

            if (!emailInput.value.trim() || !fileInput.value.trim()) {
                alert('Harap lengkapi semua kolom sebelum mengirimkan formulir.');
                return;
            }

            // Periksa tipe file yang dipilih
            var file = fileInput.files[0];
            var fileType = file.type;

            // Validasi tipe file
            if (!fileType.startsWith('image/')) {
                alert('Harap pilih file gambar.');
                return;
            }

            form.submit();
        }
    </script>
    <!-- /script -->
@endsection
