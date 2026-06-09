<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPesanan;

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

public function detailPesanan()
{
    return $this->hasMany(
        DetailPesanan::class,
        'id_produk'
    );
}

}
