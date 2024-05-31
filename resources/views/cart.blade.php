@extends('Layout.User')

@section('content')
    <!-- main -->
    <main>

        <div class="hero_single inner_pages background-image" data-background="url(img/hero_menu.jpg)">
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
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="img/menu_items/menu_items_placeholder.png" data-src="img/menu_items/1.jpg"
                                        class="lazy" alt="Image">
                                </div>
                                <div class="item_container">
                                    <span class="item_cart">Enchiladas</span>
                                    <a class="remove_row" onclick="removeRow(this)"></a>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 50.000</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1" readonly>
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 50.000</strong>
                            </td>
                            {{-- <td class="options">
                                <a href="#"><i class="ti-trash"></i></a>
                            </td> --}}
                        </tr>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="img/menu_items/menu_items_placeholder.png" data-src="img/menu_items/2.jpg"
                                        class="lazy" alt="Image">
                                </div>
                                <div class="item_container">
                                    <span class="item_cart">Burrito</span>
                                    <a class="remove_row" onclick="removeRow(this)"></a>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 75.000</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_2" class="qty2" name="quantity_2" readonly>
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 75.000</strong>
                            </td>
                            {{-- <td class="options">
                                <a href="#"><i class="ti-trash"></i></a>
                            </td> --}}
                        </tr>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="img/menu_items/menu_items_placeholder.png" data-src="img/menu_items/3.jpg"
                                        class="lazy" alt="Image">
                                </div>
                                <div class="item_container">
                                    <span class="item_cart">Chicken</span>
                                    <a class="remove_row" onclick="removeRow(this)"></a>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 100.500</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_3" class="qty2" name="quantity_3" readonly>
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 100.500</strong>
                            </td>
                            {{-- <td class="options">
                                <a href="#"><i class="ti-trash"></i></a>
                            </td> --}}
                        </tr>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="img/menu_items/menu_items_placeholder.png" data-src="img/menu_items/3.jpg"
                                        class="lazy" alt="Image">
                                </div>
                                <div class="item_container">
                                    <span class="item_cart">Pork Steak</span>
                                    <a class="remove_row" onclick="removeRow(this)"></a>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 350.000</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_4" class="qty2" name="quantity_4" readonly>
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>Rp. 350.000</strong>
                            </td>
                        </tr>
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
                        <a href="/checkout" class="btn_1 full-width cart">Proceed to Checkout</a>
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
                input.value = currentValue + 1; // Menambahkan 1 ke jumlah saat ini
                updateSubtotal.call(input); // Memperbarui subtotal
                updateTransaction();
            }

            // Fungsi untuk mengurangi jumlah barang
            function decrementQuantity() {
                var input = this.parentElement.querySelector('.qty2'); // Mendapatkan elemen input jumlah terkait
                var currentValue = parseInt(input.value); // Mendapatkan nilai jumlah saat ini
                if (currentValue > 1) { // Pastikan jumlah tidak kurang dari 1
                    input.value = currentValue - 1; // Mengurangi 1 dari jumlah saat ini
                    updateSubtotal.call(input); // Memperbarui subtotal
                    updateTransaction();
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

        function removeRow(element) {
            const row = element.closest('tr');
            const itemTotal = parseFloat(row.querySelector('td:nth-child(4) strong').innerText.replace('Rp. ', '').replace(
                /\./g, '').replace(',', '.'));

            // Ambil nilai transaksi saat ini dari DOM
            const currentTransaction = parseFloat(document.getElementById('transactionValue').innerText.replace('Rp. ', '')
                .replace(/\./g, '').replace(',', '.'));

            // Update transaksi
            transaksi = currentTransaction - itemTotal;
            updateTransaction();

            // Remove the row
            row.parentNode.removeChild(row);
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
