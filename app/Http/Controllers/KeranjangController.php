<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // TAMBAH KERANJANG
    public function tambah(Request $request, $id)
{
    $qty = $request->jumlah;

    // minimal qty 1
    if ($qty < 1) {

        $qty = 1;
    }

    // ambil produk
    $produk = \App\Models\Produk::find($id);

    if (!$produk) {

        return back();
    }

    $stok = $produk->stok;

    // qty tidak boleh melebihi stok
    if ($qty > $stok) {

        $qty = $stok;
    }

    // cek keranjang
    $cek = Keranjang::where('id_user', Auth::user()->id_user)
        ->where('id_produk', $id)
        ->first();

    // kalau produk sudah ada
    if ($cek) {

        $jumlahBaru = $cek->qty + $qty;

        // jangan melebihi stok
        if ($jumlahBaru > $stok) {

            $jumlahBaru = $stok;
        }

        $cek->qty = $jumlahBaru;

        $cek->save();

    }

    // kalau belum ada
    else {

        Keranjang::create([

            'id_user' => Auth::user()->id_user,

            'id_produk' => $id,

            'qty' => $qty

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

     // UPDATE QTY
public function updateQty(Request $request)
{
    $idKeranjang = $request->id;
    $aksi = $request->aksi;

    $keranjang = Keranjang::with('produk')
        ->where('id_keranjang', $idKeranjang)
        ->where('id_user', Auth::user()->id_user)
        ->first();

    if (!$keranjang) {

        return back();
    }

    $qty = $keranjang->qty;

    $stok = $keranjang->produk->stok;

    // TAMBAH
    if ($aksi == 'tambah') {

        if ($qty < $stok) {

            $qty++;
        }
    }

    // KURANG
    else {

        if ($qty > 1) {

            $qty--;
        }
    }

    $keranjang->qty = $qty;

    $keranjang->save();

    return back();
}


// HAPUS KERANJANG
public function hapus(Request $request)
{
    Keranjang::where('id_keranjang', $request->id)
        ->where('id_user', Auth::user()->id_user)
        ->delete();

    return back()->with('success', 'Produk dihapus dari keranjang!');
}
}