<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    // View Nomor Meja
    public function table_number()
    {
        return view('nomormeja');
    }

    // Simpan Session Nomor Meja
    public function save_table(Request $request)
    {
        $request->validate([
            'table_number' => 'required|integer|min:1|max:30',
        ]);

        // Simpan di session
        $table_number = $request->input('table_number');
        $request->session()->put('table_number', $table_number);

        // Kirim respons JSON bahwa berhasil tersimpan
        return response()->json(['success' => true]);
    }

    // Hapus Session Nomor Meja
    public function delete_table()
    {
        // Hapus session nomor meja di sini
        session()->forget('table_number');

        // Kirim respons JSON bahwa penghapusan berhasil
        return response()->json(['success' => true]);
    }
}
