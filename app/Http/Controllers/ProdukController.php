<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function detail($id)
{
    $produk = Produk::with('kategori')
        ->findOrFail($id);

    return view(
        'toko.detail_produk',
        compact('produk')
    );
}
}
