<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Produk;

class OwnerProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('owner.produk.index', compact('produk'));
    }
}
