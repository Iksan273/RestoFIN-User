<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        try {
            $cart = session()->get('cart', []);

            $id = $request->input('id');
            $title = $request->input('title');
            $price = $request->input('price');
            $imageUrl = $request->input('imageUrl');

            // Check if the item already exists in the cart
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "title" => $title,
                    "price" => $price,
                    "quantity" => 1,
                    "imageUrl" => $imageUrl
                ];
            }

            // Hitung jumlah item dalam keranjang
            $cartItemCount = count($cart);

            session()->put('cart', $cart);

            // Mengembalikan data keranjang dan jumlah item sebagai respons JSON
            return response()->json([
                'success' => true,
                'message' => 'Berhasil dimasukkan ke dalam keranjang',
                'cart' => $cart,
                'cartItemCount' => $cartItemCount
            ]);
        } catch (\Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menambahkan ke dalam keranjang. Silakan coba lagi.']);
        }
    }


    public function removeFromCart(Request $request)
    {
        try {
            $id = $request->input('id');
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            // Hitung kembali jumlah item di keranjang
            $cartItemCount = count($cart);

            // Hitung ulang jumlah transaksi, pajak, dan total
            $transaction = 0;
            foreach ($cart as $item) {
                $transaction += $item['price'] * $item['quantity'];
            }
            $tax = $transaction * 0.10; // Pajak 10%
            $total = $transaction + $tax;


            return response()->json([
                'success' => true,
                'message' => 'Item berhasil dihapus dari keranjang',
                'transaction' => $transaction,
                'tax' => $tax,
                'total' => $total,
                'cartItemCount' => $cartItemCount,
                'cart' => $cart
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus item dari keranjang'
            ]);
        }
    }

    public function updateCartQuantity(Request $request)
    {
        try {
            $id = $request->input('id');
            $quantity = $request->input('quantity');
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
                session()->put('cart', $cart);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Item not found in cart'
                ]);
            }

            // Hitung kembali jumlah item di keranjang
            $cartItemCount = count($cart);

            $transaction = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));

            $tax = $transaction * 0.10; // Pajak 10%
            $total = $transaction + $tax;

            return response()->json([
                'success' => true,
                'message' => 'Quantity updated successfully',
                'transaction' => $transaction,
                'tax' => $tax,
                'total' => $total,
                'cartItemCount' => $cartItemCount,
                'cart' => $cart
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update quantity'
            ]);
        }
    }





    // public function removeFromCart(Request $request)
    // {
    //     try {
    //         $cart = session()->get('cart', []);

    //         $id = $request->input('id');

    //         if (isset($cart[$id])) {
    //             unset($cart[$id]);
    //             session()->put('cart', $cart);
    //             return response()->json(['success' => true, 'message' => 'Item berhasil dihapus dari keranjang']);
    //         }

    //         return response()->json(['success' => false, 'message' => 'Item tidak ditemukan dalam keranjang']);
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menghapus item dari keranjang']);
    //     }
    // }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
