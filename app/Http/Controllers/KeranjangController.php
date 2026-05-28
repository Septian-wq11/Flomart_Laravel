<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // TAMBAH KERANJANG
    public function tambah($id)
    {
        $cek = Keranjang::where('id_user', Auth::user()->id_user)
            ->where('id_produk', $id)
            ->first();

        // kalau produk sudah ada
        if ($cek) {

            $cek->qty += 1;

            $cek->save();

        }

        // kalau belum ada
        else {

            Keranjang::create([

                'id_user' => Auth::user()->id_user,

                'id_produk' => $id,

                'qty' => 1

            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // HALAMAN KERANJANG
    public function index()
    {
        $keranjang = Keranjang::where('id_user', Auth::user()->id_user)
            ->with('produk')
            ->get();

        return view('user.keranjang', compact('keranjang'));
    }
}