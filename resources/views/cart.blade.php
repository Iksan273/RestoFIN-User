@extends('Layout.User')

@section('content')
    <!-- main -->
    <main>

        <div class="hero_single inner_pages background-image" data-background="url({{asset('resto/gallery8.jpg')}})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Your orders</h1>
                            <p>Order food with home delivery or take away</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame gray"></div>
        </div>
        <!-- /hero_single -->

        <div class="bg_gray">
            <div class="container margin_60_40">
                <table class="table table-striped cart-list">
                    <thead>
                        <tr>
                            <th>
                                Product
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Subtotal
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($cart) && count($cart) > 0)
                            @foreach ($cart as $id => $item)
                                <tr data-id="{{ $id }}">
                                    <td>
                                        <div class="thumb_cart">
                                            <img src="https://resto.bemubaya.com/menu/images/{{ $item['imageUrl'] }}"
                                                class="lazy" alt="Image">
                                        </div>
                                        <div class="item_container">
                                            <span class="item_cart">{{ $item['title'] }}</span>
                                            <a class="remove_row" onclick="removeRow2(this, '{{ $id }}')">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>Rp. {{ number_format($item['price'], 0, ',', '.') }}</strong>
                                    </td>
                                    <td>
                                        <div class="numbers-row">
                                            <input type="text" value="{{ $item['quantity'] }}" class="qty2"
                                                name="quantity_{{ $id }}" readonly>
                                            <div class="inc button_inc" onclick="incrementQuantity.call(this)">+</div>
                                            <div class="dec button_inc" onclick="decrementQuantity.call(this)">-</div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>Rp.
                                            {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /container -->
        </div>

        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>Transaksi</span><strong id="transactionValue">Rp. 0</strong>
                            </li>
                            <li>
                                <span>Pajak - 10%</span><strong id="taxValue">Rp. 0</strong>
                            </li>
                            <li>
                                <span>Total</span><strong id="totalValue">Rp. 0</strong>
                            </li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="btn_1 full-width cart">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /box_cart -->

    </main>
    <!-- /main -->

    <!-- style -->
    <style>
        .thumb_cart {
            position: relative;
        }

        .item_container {
            display: flex;
            align-items: baseline;
            flex-direction: row;
        }

        .item_cart {
            margin-right: 10px;
            /* Adjust the spacing between text and icon */
        }

        .remove_row {
            color: grey;
            cursor: pointer;
            position: relative;
        }

        .remove_row::before {
            content: "\f2ed";
            /* Unicode value for Font Awesome trash icon */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            /* For solid icon */
            font-size: 14px;
            color: grey;
            margin-right: 10px;
        }
    </style>
    <!-- /style -->

    <!-- script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mendapatkan semua elemen tombol plus dan minus
            var incButtons = document.querySelectorAll('.inc');
            var decButtons = document.querySelectorAll('.dec');
            var transaksi = 0;

            // Memasang event listener untuk setiap tombol plus
            incButtons.forEach(function(button) {
                button.addEventListener('click', incrementQuantity);
            });

            // Memasang event listener untuk setiap tombol minus
            decButtons.forEach(function(button) {
                button.addEventListener('click', decrementQuantity);
            });

            // Fungsi untuk menambah jumlah barang
            function incrementQuantity() {
                var input = this.parentElement.querySelector('.qty2'); // Mendapatkan elemen input jumlah terkait
                var currentValue = parseInt(input.value); // Mendapatkan nilai jumlah saat ini
                var newQuantity = currentValue + 1;
                input.value = newQuantity; // Menambahkan 1 ke jumlah saat ini

                updateSubtotal.call(input); // Memperbarui subtotal
                updateTransaction();

                var row = this.closest('tr');
                var id = row.getAttribute('data-id'); // Mendapatkan ID dari atribut data-id

                // Kirim permintaan AJAX ke server untuk mengupdate quantity di session
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        if (response.success) {
                            updateCartView(response.cart, response.cartItemCount);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengupdate quantity. Silakan coba lagi.');
                    }
                });
            }

            function decrementQuantity() {
                var input = this.parentElement.querySelector('.qty2'); // Mendapatkan elemen input jumlah terkait
                var currentValue = parseInt(input.value); // Mendapatkan nilai jumlah saat ini
                if (currentValue > 1) { // Pastikan jumlah tidak kurang dari 1
                    var newQuantity = currentValue - 1;
                    input.value = newQuantity; // Mengurangi 1 dari jumlah saat ini

                    updateSubtotal.call(input); // Memperbarui subtotal
                    updateTransaction();

                    var row = this.closest('tr');
                    var id = row.getAttribute('data-id'); // Mendapatkan ID dari atribut data-id

                    // Kirim permintaan AJAX ke server untuk mengupdate quantity di session
                    $.ajax({
                        url: '{{ route('cart.update') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            quantity: newQuantity
                        },
                        success: function(response) {
                            if (response.success) {
                                updateCartView(response.cart, response.cartItemCount);
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengupdate quantity. Silakan coba lagi.');
                        }
                    });
                }
            }

            // Fungsi untuk memperbarui subtotal
            function updateSubtotal() {
                var row = this.closest('tr'); // Mendapatkan elemen tr terdekat dari input jumlah
                var price = parseFloat(row.querySelector('td:nth-child(2) strong').innerText.replace('Rp. ', '')
                    .replace(/\./g, '').replace(',', '.')); // Mendapatkan harga
                var quantity = parseInt(this.value); // Mendapatkan jumlah barang yang diinputkan
                var subtotal = price * quantity; // Menghitung subtotal
                row.querySelector('td:nth-child(4) strong').innerText = 'Rp. ' + formatRupiah(subtotal.toFixed(
                    0)); // Memperbarui subtotal di dalam tabel

                // Perbarui total transaksi
                transaksi = calculateTransaction();
            }

            // Fungsi untuk menghitung total transaksi
            function calculateTransaction() {
                var subtotalElements = document.querySelectorAll('.cart-list tbody td:nth-child(4) strong');
                var totalTransaction = 0;

                subtotalElements.forEach(function(subtotalElement) {
                    var subtotalValue = parseFloat(subtotalElement.innerText.replace('Rp. ', '').replace(
                        /\./g, '').replace(',', '.'));
                    totalTransaction += subtotalValue;
                });

                return totalTransaction;
            }

            // Fungsi untuk mengubah angka menjadi format Rupiah
            function formatRupiah(angka) {
                var reverse = angka.toString().split('').reverse().join('');
                var ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return ribuan;
            }

            // Fungsi untuk memperbarui transaksi, pajak, dan total
            function updateTransaction() {
                var transactionValue = transaksi;
                var taxValue = transactionValue * 0.1;
                var totalValue = transactionValue + taxValue;

                document.getElementById('transactionValue').innerText = 'Rp. ' + formatRupiah(transactionValue
                    .toFixed(0));
                document.getElementById('taxValue').innerText = 'Rp. ' + formatRupiah(taxValue.toFixed(0));
                document.getElementById('totalValue').innerText = 'Rp. ' + formatRupiah(totalValue.toFixed(0));
            }

            // Memanggil fungsi updateTransaction untuk pertama kali saat DOM dimuat
            transaksi = calculateTransaction();
            updateTransaction();
        });

        function removeRow2(element, id) {
            const row = element.closest('tr');
            const itemTotal = parseFloat(row.querySelector('td:nth-child(4) strong').innerText.replace('Rp. ', '').replace(
                /\./g, '').replace(',', '.'));

            // Ambil nilai transaksi saat ini dari DOM
            const currentTransaction = parseFloat(document.getElementById('transactionValue').innerText.replace('Rp. ', '')
                .replace(/\./g, '').replace(',', '.'));

            // Update transaksi
            transaksi = currentTransaction - itemTotal;

            // Kirim permintaan AJAX ke server untuk menghapus item dari session
            $.ajax({
                url: '{{ route('cart.remove') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        // Hapus baris dari tabel
                        row.parentNode.removeChild(row);
                        updateTransaction();
                        updateCartView(response.cart, response.cartItemCount);
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menghapus item dari keranjang. Silakan coba lagi.');
                }
            });
        }

        function updateCartView(cart, count) {
            // Perbarui jumlah item di keranjang pada layout.user
            var cartItemCount = count;
            document.getElementById('cart-item-count').textContent = cartItemCount;

            // Perbarui tampilan dropdown cart pada layout.user
            var cartItemsList = document.getElementById('cart-items');
            if (cartItemCount > 0) {
                // Buat HTML baru berdasarkan item-item yang ada di keranjang
                var newHTML = '';
                var transaction = 0;

                Object.keys(cart).forEach(function(id) {
                    var item = cart[id];
                    transaction += parseFloat(item.price) * parseInt(item.quantity);

                    newHTML += '<li data-id="' + id + '">';
                    newHTML += '<figure><img src="https://resto.bemubaya.com/menu/images/' + item.imageUrl +
                        '" alt="" width="50" height="50" class="lazy"></figure>';
                    newHTML += '<div class="item-details">';
                    newHTML += '<strong>';
                    newHTML += '<span>' + item.quantity + 'x</span>';
                    newHTML += '<span class="title">' + item.title + '</span>';
                    newHTML += '</strong>';
                    newHTML += '<span class="price">Rp. ' + formatNumber(parseInt(parseFloat(item.price))) +
                        '</span>';
                    newHTML += '<a class="action" onclick="removeRow(this, \'' + id +
                        '\')"><i class="icon_trash_alt"></i></a>';
                    newHTML += '</div>'; // end .item-details
                    newHTML += '</li>';
                });

                cartItemsList.innerHTML = newHTML;

                // Hitung pajak
                var tax = transaction * 0.10; // Pajak 10%

                // Hitung total
                var total = transaction + tax;

                // Perbarui tampilan transaksi, pajak, dan total harga
                document.getElementById('transaction').textContent = 'Rp. ' + formatNumber(transaction);
                document.getElementById('tax').textContent = 'Rp. ' + formatNumber(tax);
                document.getElementById('total').textContent = 'Rp. ' + formatNumber(total);
            } else {
                // Tampilkan pesan "Keranjang Kosong" jika tidak ada item di keranjang
                cartItemsList.innerHTML =
                `<li id="empty-cart">
                    <div class="item-details">
                        <strong>
                            <span>Keranjang Kosong</span>
                        </strong>
                    </div>
                </li>`;

                // Jika keranjang kosong, set transaksi, pajak, dan total menjadi 0
                document.getElementById('transaction').textContent = 'Rp. 0';
                document.getElementById('tax').textContent = 'Rp. 0';
                document.getElementById('total').textContent = 'Rp. 0';
            }
        }


        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function updateTransaction() {
            var transactionValue = transaksi;
            var taxValue = transactionValue * 0.1;
            var totalValue = transactionValue + taxValue;

            document.getElementById('transactionValue').innerText = 'Rp. ' + formatRupiah(transactionValue.toFixed(0));
            document.getElementById('taxValue').innerText = 'Rp. ' + formatRupiah(taxValue.toFixed(0));
            document.getElementById('totalValue').innerText = 'Rp. ' + formatRupiah(totalValue.toFixed(0));
        }

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
    </script>
    <!-- /script -->
@endsection
