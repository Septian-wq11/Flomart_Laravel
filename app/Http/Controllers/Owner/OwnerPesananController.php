<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class OwnerPesananController extends Controller
{
    public function index(Request $request)
{
    $query = Pesanan::latest();

    if ($request->filled('status')) {
        $query->where(
            'status_pesanan',
            $request->status
        );
    }

    $pesanan = $query->get();

    return view(
        'owner.pesanan.index',
        compact('pesanan')
    );
}

    public function show($id)
{
    $pesanan = Pesanan::with([
        'detailPesanan.produk'
    ])->findOrFail($id);

    $jenisProduk = $pesanan->detailPesanan->count();

    $totalItem = $pesanan->detailPesanan->sum('qty');

    return view(
        'owner.pesanan.show',
        compact(
            'pesanan',
            'jenisProduk',
            'totalItem'
        )
    );
}
}