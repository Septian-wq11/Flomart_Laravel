<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Keranjang;

class PesananController extends Controller
{
    // PESANAN SAYA
    public function index()
    {
        $pesanan = Pesanan::where('id_user', Auth::user()->id_user)
            ->latest('tanggal_pesanan')
            ->get();

        return view('user.pesanan_saya', compact('pesanan'));
    }

    // CHECKOUT
    public function checkout(Request $request)
{
    $user = Auth::user();

    if (!$request->has('selected_items')) {
        return back()->with('error', 'Pilih produk dulu!');
    }

    $selected = $request->selected_items ?? [];

    $keranjang = Keranjang::with('produk')
        ->where('id_user', $user->id_user)
        ->whereIn('id_keranjang', $selected)
        ->get();

    if ($keranjang->count() == 0) {
        return back()->with('error', 'Keranjang kosong!');
    }

    // VALIDASI STOK
    foreach ($keranjang as $item) {

        if ($item->produk->stok < $item->qty) {

    return back()->with(
        'error',
        'Maaf, stok '.$item->produk->nama_produk.
        ' hanya tersisa '.$item->produk->stok.' pcs.'
    );
}
    }

    $subtotal = 0;

    foreach ($keranjang as $item) {

        $subtotal += $item->produk->harga * $item->qty;
    }

    $ongkir = (int) $request->ongkir;
    $total = $subtotal + $ongkir;

    try {

        DB::beginTransaction();

        $pesanan = Pesanan::create([

            'id_user' => $user->id_user,
            'tanggal_pesanan' => now(),
            'total_harga' => $total,
            'ongkir' => $ongkir,
            'status_pesanan' => $request->metode_pembayaran == 'COD'
                ? 'diproses'
                : 'pending',
            'alamat_kirim' => $user->alamat,
            'metode_pembayaran' => $request->metode_pembayaran,
            'catatan' => $request->catatan,
            'nama_penerima' => $user->nama,
            'no_hp' => $user->no_hp

        ]);

        foreach ($keranjang as $item) {

            DetailPesanan::create([

                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk' => $item->id_produk,
                'qty' => $item->qty,
                'harga' => $item->produk->harga,
                'subtotal' => $item->produk->harga * $item->qty

            ]);

            $item->produk->decrement('stok', $item->qty);
        }

        Keranjang::whereIn(
            'id_keranjang',
            $selected
        )->delete();

        DB::commit();

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            'Terjadi kesalahan saat checkout.'
        );
    }

    if ($request->metode_pembayaran == 'COD') {

        return redirect()
            ->route('pesanan.saya')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    return redirect()
        ->route('pembayaran', $pesanan->id_pesanan)
        ->with('success', 'Pesanan berhasil dibuat!');
}

    // HALAMAN PEMBAYARAN
    public function pembayaran($id)
    {
        $pesanan = Pesanan::with('detailPesanan.produk')
            ->findOrFail($id);

        return view('user.pembayaran', compact('pesanan'));
    }

    // UPLOAD BUKTI
    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti' => 'required|image'
        ]);

        $pesanan = Pesanan::findOrFail($id);

        $file = $request->file('bukti');

        $namaFile = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('uploads/bukti'), $namaFile);

        $pesanan->update([
    'bukti_pembayaran' => $namaFile,
    'status_pesanan' => 'menunggu'
]);

        return back()->with(
    'success',
    'Bukti pembayaran berhasil diupload!'
);
    }

    // BATALKAN PESANAN
    public function batalkan($id)
{
    $pesanan = Pesanan::with('detailPesanan.produk')
        ->findOrFail($id);

    if ($pesanan->status_pesanan != 'pending') {
        return back();
    }

    try {

        DB::beginTransaction();

        $pesanan->update([
            'status_pesanan' => 'dibatalkan'
        ]);

        foreach ($pesanan->detailPesanan as $detail) {

            $detail->produk->increment(
                'stok',
                $detail->qty
            );

        }

        DB::commit();

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            'Gagal membatalkan pesanan.'
        );
    }

    return back()->with(
        'success',
        'Pesanan berhasil dibatalkan.'
    );
}

    public function detail($id)
{
    $user = Auth::user();

    // ambil pesanan
    $pesanan = Pesanan::where('id_pesanan', $id)
        ->where('id_user', $user->id_user)
        ->first();

    if (!$pesanan) {

        abort(404);

    }

    // ambil detail produk
    $detail = DetailPesanan::where('id_pesanan', $id)
        ->with('produk')
        ->get();

    return view('user.detail_pesanan', compact(
        'pesanan',
        'detail'
    ));
}

}