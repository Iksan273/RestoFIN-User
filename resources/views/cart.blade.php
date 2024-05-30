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
                                <span class="item_cart">1x Enchiladas</span>
                            </td>
                            <td>
                                <strong>$11.00</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>$11.00</strong>
                            </td>
                            <td class="options">
                                <a href="#"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="img/menu_items/menu_items_placeholder.png" data-src="img/menu_items/2.jpg"
                                        class="lazy" alt="Image">
                                </div>
                                <span class="item_cart">2x Burrito</span>
                            </td>
                            <td>
                                <strong>$15.00</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_2" class="qty2" name="quantity_2">
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>$15.00</strong>
                            </td>
                            <td class="options">
                                <a href="#"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="img/menu_items/menu_items_placeholder.png" data-src="img/menu_items/3.jpg"
                                        class="lazy" alt="Image">
                                </div>
                                <span class="item_cart">1x Chicken</span>
                            </td>
                            <td>
                                <strong>$9.00</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_3" class="qty2" name="quantity_3">
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>$9.00</strong>
                            </td>
                            <td class="options">
                                <a href="#"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-end">
                        <button type="button" class="btn_1 outline">Update Cart</button>
                    </div>
                    <div class="col-sm-8">
                        <div class="apply-coupon">
                            <div class="form-group form-inline">
                                <input type="text" name="coupon-code" value="" placeholder="Promo code"
                                    class="form-control d-inline" style="width: 150px;"><button type="button"
                                    class="btn_1 outline">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /cart_actions -->
            </div>
            <!-- /container -->
        </div>

        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>Transaksi</span> Rp 35.000
                            </li>
                            <li>
                                <span>Pajak - 10%</span> Rp 3.500
                            </li>
                            <li>
                                <span>Total</span> Rp 38.500
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
@endsection
