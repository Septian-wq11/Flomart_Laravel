<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index()
{
    $status = request('status');

    $query = Pesanan::with('user');

    if ($status && $status != 'semua') {

        $query->where(
            'status_pesanan',
            $status
        );
    }

    $pesanan = $query
        ->latest('tanggal_pesanan')
        ->get();

    return view(
        'admin.pesanan.index',
        compact(
            'pesanan',
            'status'
        )
    );
}

    public function show($id)
{
    $pesanan = Pesanan::with(
        'detailPesanan.produk',
        'user'
    )->findOrFail($id);

    $jenisProduk = $pesanan->detailPesanan->count();

    $totalItem = $pesanan->detailPesanan->sum('qty');

    return view(
        'admin.pesanan.show',
        compact(
            'pesanan',
            'jenisProduk',
            'totalItem'
        )
    );
}

    public function verifikasi($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        if($pesanan->status_pesanan == 'menunggu')
        {
            $pesanan->update([
                'status_pesanan' => 'diproses'
            ]);
        }

        return back()
            ->with(
                'success',
                'Pembayaran berhasil diverifikasi'
            );
    }

    public function selesai($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([
            'status_pesanan' => 'selesai'
        ]);

        return back()
            ->with(
                'success',
                'Pesanan selesai'
            );
    }
}