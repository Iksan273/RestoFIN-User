@extends('Layout.User')

@section('content')
    <main class="pattern_2">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-8" style="margin-top: 20px">
                    <form id="strukForm" method="POST" action="{{ route('struk.store') }}">
                        @csrf
                        <div class="write_review">
                            <h1>Struk Pembelian Online</h1>
                            <br>
                            <div class="form-group">
                                <label>Masukkan Nomor Telepon atau Email Anda</label>
                                <input class="form-control" type="text" id="contactInfo"
                                    placeholder="Nomor Telepon atau Email" name="user">
                            </div>
                            <div class="form-group mb-5">
                                <label>Upload Gambar Anda</label>
                                <input type="file" class="form-control" id="imageUpload" accept="image/*" name="foto">
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
                            <b><span>Vin Autism Gallery Resto</span></b>
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
            var form = document.getElementById('strukForm');
            var formData = new FormData(form);

            fetch('{{ route('struk.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
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
                        alert('Struk berhasil dikirim');
                        window.location.href = '{{ route('struk') }}';
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
