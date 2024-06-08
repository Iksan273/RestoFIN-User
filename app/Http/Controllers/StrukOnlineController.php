<?php

namespace App\Http\Controllers;

use App\Models\StrukOnline;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class StrukOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('strukonline');
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
        // Validasi input
        $request->validate([
            'user' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil email pengguna dari session
        $userEmail = $request->session()->get('email');

        // Cek apakah email dari user cocok dengan email pengguna yang sedang login
        $user = User::where('email', $userEmail)->first();

        if ($user && $user->email === $request->user || $user && $user->phone === $request->user) {
            $struk = new StrukOnline();
            $struk->users_id = $user->id;
            $struk->status = "Pending";
            $struk->point = 0;

            // Handle file upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('strukonline'), $filename);
                $struk->file = $filename;
            }

            $struk->save();
            return response()->json(['success' => true, 'message' => 'Review berhasil dikirim']);
        } else {
            return redirect()->back()->with('error', 'Email tidak sesuai dengan pengguna yang sedang login.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukOnline $strukOnline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukOnline $strukOnline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukOnline $strukOnline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukOnline $strukOnline)
    {
        //
    }
}
