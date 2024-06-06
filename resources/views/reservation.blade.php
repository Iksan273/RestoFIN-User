@extends('Layout.User')

@section('content')
    <main>

        <div class="hero_single inner_pages background-image" data-background="url(img/hero_reservation.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Reserve a Table</h1>
                            <p>Per consequat adolescens ex cu nibh commune</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <div class="pattern_2">
            <div class="container margin_120_100 pb-0">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center d-none d-lg-block" data-cue="slideInUp">
                        <img src="img/chef.png" width="400" height="733" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 col-md-8" data-cue="slideInUp">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Lakukan Reservasi</h2>
                            <p class="reservasi-link">atau Hubungi Kami 08xxxxxx</p>
                        </div>
                        <div id="wizard_container">
                            <form id="wrapped" method="POST" action="{{ route('reservation.store') }}">
                                @csrf
                                <input id="website" name="website" type="text" value="">
                                <!-- Leave for security protection, read docs for details -->
                                <div id="middle-wizard">
                                    <div class="step">
                                        <h3 class="main_question"><strong>1/3</strong> Pilih Tanggal </h3>
                                        <div class="form-group">
                                            <input type="hidden" name="datepicker_field" id="datepicker_field"
                                                class="required">
                                        </div>
                                        <div id="DatePicker"></div>
                                    </div>
                                    <!-- /step-->
                                    <div class="step">
                                        <h3 class="main_question"><strong>2/3</strong> Pilih Jam dan Jumlah Orang </h3>
                                        <div class="step_wrapper">
                                            <h4>Waktu / Jam</h4>
                                            <div class="radio_select add_bottom_15">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="time_1" name="time" value="09:00"
                                                            class="required">
                                                        <label for="time_1">09:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_2" name="time" value="09:30"
                                                            class="required">
                                                        <label for="time_2">09:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_3" name="time" value="10:00"
                                                            class="required">
                                                        <label for="time_3">10:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_4" name="time" value="10:30"
                                                            class="required">
                                                        <label for="time_4">10:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_5" name="time" value="11:00"
                                                            class="required">
                                                        <label for="time_5">11:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_6" name="time" value="11:30"
                                                            class="required">
                                                        <label for="time_6">11:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_7" name="time" value="12:00"
                                                            class="required">
                                                        <label for="time_7">12:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_8" name="time" value="12:30"
                                                            class="required">
                                                        <label for="time_8">12:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_9" name="time" value="13:00"
                                                            class="required">
                                                        <label for="time_9">13:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_10" name="time" value="13:30"
                                                            class="required">
                                                        <label for="time_10">13:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_11" name="time"
                                                            value="14:00" class="required">
                                                        <label for="time_11">14:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_12" name="time"
                                                            value="14:30" class="required">
                                                        <label for="time_12">14:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_13" name="time"
                                                            value="15:00" class="required">
                                                        <label for="time_13">15:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_14" name="time"
                                                            value="15:30" class="required">
                                                        <label for="time_14">15:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_15" name="time"
                                                            value="16:00" class="required">
                                                        <label for="time_15">16:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_16" name="time"
                                                            value="16:30" class="required">
                                                        <label for="time_16">16:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_17" name="time"
                                                            value="17:00" class="required">
                                                        <label for="time_17">17:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_18" name="time"
                                                            value="17:30" class="required">
                                                        <label for="time_18">17:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_19" name="time"
                                                            value="18:00" class="required">
                                                        <label for="time_19">18:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_20" name="time"
                                                            value="18:30" class="required">
                                                        <label for="time_20">18:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_21" name="time"
                                                            value="19:00" class="required">
                                                        <label for="time_21">19:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_22" name="time"
                                                            value="19:30" class="required">
                                                        <label for="time_22">19:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_23" name="time"
                                                            value="20:00" class="required">
                                                        <label for="time_23">20:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_24" name="time"
                                                            value="20:30" class="required">
                                                        <label for="time_24">20:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_25" name="time"
                                                            value="21:00" class="required">
                                                        <label for="time_25">21:00</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /time_select -->
                                        </div>
                                        <!-- /step_wrapper -->
                                        <div class="step_wrapper">
                                            <h4>Berapa banyak orang?</h4>
                                            <div class="radio_select">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="people_1" name="people"
                                                            value="1" class="required">
                                                        <label for="people_1">1</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_2" name="people"
                                                            value="2" class="required">
                                                        <label for="people_2">2</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_3" name="people"
                                                            value="3" class="required">
                                                        <label for="people_3">3</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_4" name="people"
                                                            value="4" class="required">
                                                        <label for="people_4">4</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_5" name="people"
                                                            value="5" class="required">
                                                        <label for="people_5">5</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_6" name="people"
                                                            value="6" class="required">
                                                        <label for="people_6">6</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_7" name="people"
                                                            value="7" class="required">
                                                        <label for="people_7">7</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_8" name="people"
                                                            value="8" class="required">
                                                        <label for="people_8">8</label>
                                                    </li>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" id="people_9" name="people"
                                                                value="9" class="required">
                                                            <label for="people_9">9</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="people_10" name="people"
                                                                value="10" class="required">
                                                            <label for="people_10">10</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="people_11" name="people"
                                                                value="11" class="required">
                                                            <label for="people_11">11</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="people_12" name="people"
                                                                value="12" class="required">
                                                            <label for="people_12">12</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="people_13" name="people"
                                                                value="13" class="required">
                                                            <label for="people_13">13</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="people_14" name="people"
                                                                value="14" class="required">
                                                            <label for="people_14">14</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="people_15" name="people"
                                                                value="15" class="required">
                                                            <label for="people_15">15</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="people_16" name="people"
                                                                value="16" class="required">
                                                            <label for="people_16">16</label>
                                                        </li>
                                                    </ul>
                                                </ul>
                                                <div class="centered-div">
                                                    <p>Apabila jumlah lebih banyak, silahkan hubungi link berikut: <a
                                                            href="">Klik Disini.</a></p>
                                                </div>
                                            </div>
                                            <!-- /people_select -->
                                        </div>
                                        <!-- /step_wrapper -->
                                    </div>
                                    <!-- /step-->
                                    <div class="submit step">
                                        <h3 class="main_question"><strong>3/3</strong> Tolong Lengkapi Data Berikut </h3>
                                        <div class="form-group">
                                            <input type="text" name="name_reserve" class="form-control required"
                                                placeholder="First and Last Name">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" name="email_reserve"
                                                        class="form-control required" placeholder="Your Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="telephone_reserve"
                                                        class="form-control required" placeholder="Your Telephone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="opt_message_reserve" placeholder="Please provide any additional info"></textarea>
                                        </div>
                                        <div class="form-group terms">
                                            <label class="container_check">Mohon terima <a href="#"
                                                    data-bs-toggle="modal" data-bs-target="#skModal">Syarat dan
                                                    Ketentuan kami.</a>
                                                <input type="checkbox" name="terms" value="Yes" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /step-->
                                </div>
                                <!-- /middle-wizard -->
                                <div id="bottom-wizard">
                                    <button type="button" name="backward" class="backward">Sebelumnya</button>
                                    <button type="button" name="forward" class="forward">Berikutnya</button>
                                    <button type="button" name="process" class="submit" id="submit-button"
                                        onclick="kirim()">Kirim</button>
                                </div>
                                <!-- /bottom-wizard -->
                            </form>
                        </div>
                        <!-- /Wizard container -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /pattern_2 -->
    </main>

    <!-- Modal Syarat & Ketentuan -->
    <div class="modal fade" id="skModal" tabindex="-1" aria-labelledby="skModalLabel" aria-hidden="true">
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
                        <h2>Syarat & Ketentuan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Syarat & Ketentuan -->

    <!-- style -->
    <style>
        .reservasi-link {
            cursor: pointer;
            color: inherit;
            /* Ini agar teks mengikuti warna dari parent */
            transition: color 0.3s ease;
            /* Menambahkan efek transisi pada warna */
            text-decoration: underline;
        }

        .reservasi-link:hover {
            color: blue;
            /* Ganti warna ini sesuai keinginan Anda */
            text-decoration: underline;
            /* Tambahkan underline saat dihover */
        }

        .centered-div {
            text-align: center;
            margin-top: 10px;
            margin-bottom: -20px;
        }
    </style>
    <!-- /style -->

    <!-- script -->
    <script>
        document.querySelector('.reservasi-link').onclick = function() {
            window.location.href = 'https://example.com'; // Ganti URL ini dengan URL tujuan Anda
        };


        function kirim() {
            var date = document.getElementById('datepicker_field').value;
            var time = document.querySelector('input[name="time"]:checked').value;

            // Ensure the time has ':00' appended if necessary
            if (!time.includes(':')) {
                time += ':00';
            }

            // Log the values to debug
            console.log('Date:', date);
            console.log('Time:', time);

            // Assuming datepicker_value is in the format MM/DD/YYYY
            var dateParts = date.split('/');
            if (dateParts.length !== 3) {
                alert('Invalid date format. Please select a valid date.');
                return;
            }

            var month = parseInt(dateParts[0]);
            var day = parseInt(dateParts[1]);
            var yearPart = dateParts[2];

            // Handle double year
            var year = yearPart.length > 4 ? yearPart.slice(0, 4) : yearPart;

            // Log the parsed date parts
            console.log('Parsed Date Parts:', {
                year,
                month,
                day
            });

            // Combine date and time parts to create a Date object
            var dateTimeStr = `${year}-${('0' + month).slice(-2)}-${('0' + day).slice(-2)}T${time}`;
            console.log('DateTime String:', dateTimeStr);

            var dateTime = new Date(dateTimeStr);
            if (isNaN(dateTime.getTime())) {
                alert('Invalid date or time format. Please select a valid date and time.');
                return;
            }

            // Log the Date object
            console.log('DateTime Object:', dateTime);

            // Format the date to Y-m-d H:i:s
            var formattedDateTime = dateTime.getFullYear() + '-' +
                ('0' + (dateTime.getMonth() + 1)).slice(-2) + '-' +
                ('0' + dateTime.getDate()).slice(-2) + ' ' +
                ('0' + dateTime.getHours()).slice(-2) + ':' +
                ('0' + dateTime.getMinutes()).slice(-2) + ':' +
                ('0' + dateTime.getSeconds()).slice(-2);

            console.log('Formatted DateTime:', formattedDateTime);

            let hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'reservation_date';
            hiddenInput.value = formattedDateTime;

            document.getElementById('wrapped').appendChild(hiddenInput);

            var formData = new FormData(document.getElementById('wrapped'));

            fetch('{{ route('reservation.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData,
                })
                .then(response => {
                    console.log(response); // Log the raw response
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
                        alert('Reservasi berhasil disimpan');
                        window.location.href = '{{ route('reservation') }}';
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
