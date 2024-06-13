<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('checkout');
    }

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
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'customer_name' => 'nullable|string|max:255',
                'customer_email' => 'nullable|string|max:255',
                'customer_phone' => 'nullable|string|max:16',
                'payment_method' => 'required|string',
                'nomor_meja' => 'required|integer|min:1|max:30',
            ]);

            // Find user by email
            $user = null;
            if (auth()->check()) {
                $user = auth()->user();
            }

            // Determine user_id or guest name
            $userId = $user ? $user->id : null;
            $guest = $user ? null : ($validatedData['customer_name'] ?? 'Guest');

            // Retrieve the session cart
            $cart = session('cart', []);

            // Calculate total price and tax
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            $tax = $subtotal * 0.10; // 10% tax
            $totalPrice = $subtotal + $tax;

            // Transaction block
            DB::transaction(function () use ($validatedData, $cart, $userId, $guest, $totalPrice) {
                $orderNumber = 'TRX' . date('dmY');
                $orderCount = Order::whereDate('created_at', now()->format('Y-m-d'))->count();
                $order = Order::create([
                    'order_number' => $orderNumber . str_pad($orderCount + 1, 4, '0', STR_PAD_LEFT),
                    'total_price' => $totalPrice,
                    'payment_method' => $validatedData['payment_method'],
                    'order_date' => now(),
                    'status_pembayaran' => 'Belum Bayar',
                    'no_meja' => $validatedData['nomor_meja'],
                    'guest' => $guest,
                    'users_id' => $userId,
                ]);

                foreach ($cart as $id => $item) {
                    OrderItem::create([
                        'orders_id' => $order->id,
                        'menus_id' => $id,
                        'jumlah' => $item['quantity'],
                        'price' => $item['price'],
                        'total_price' => $item['quantity'] * $item['price'],
                    ]);
                }

                Transaction::create([
                    'orders_id' => $order->id,
                    'payment_method' => $validatedData['payment_method'],
                    'total_amount' => $totalPrice,
                    'status' => 'Belum Bayar',
                ]);
            });

            $request->session()->forget('cart');
            return redirect()->route('confirm')->with('success', 'Order berhasil dilakukan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal melakukan order: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
