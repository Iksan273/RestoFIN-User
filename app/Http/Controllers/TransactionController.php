<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    public function getTransactionDetail($orderId)
    {
        // Ambil transaksi berdasarkan $orderId dari tabel orders
        $order = Order::where('id', $orderId)
            ->where('users_id', auth()->id())
            ->first();

        $orderItems = $order->orderItems()
            ->with('menu') // Mengambil detail menu dari relasi menu pada order item
            ->get();

        if (!$orderItems) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Format data transaksi sesuai kebutuhan Anda
        $formattedTransaction = [
            'id_transaksi' => $order->order_number, // Sesuaikan dengan nama kolom yang benar di model Order
            'tanggal' => $order->order_date, // Sesuaikan dengan nama kolom yang benar di model Transaction
            'total' => $order->total_price, // Ambil total harga dari tabel orders
            'metode_pembayaran' => $order->payment_method, // Ambil metode pembayaran dari tabel orders
            'status' => $order->status_pembayaran, // Ambil status dari tabel orders
            'items' => [],
        ];

        // Ambil detail menu dari tabel menus berdasarkan orderItems
        foreach ($orderItems as $orderItem) {
            $formattedTransaction['items'][] = [
                'title' => $orderItem->menu->title,
                'price' => $orderItem->price,
            ];
        }


        return response()->json($formattedTransaction);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
