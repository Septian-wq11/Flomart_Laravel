<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if($keranjang->count() == 0){
            return back();
        }

        $subtotal = 0;

        foreach($keranjang as $item){
            $subtotal += $item->produk->harga * $item->qty;
        }

        $ongkir = $request->ongkir;
        $total = $subtotal + $ongkir;

        // SIMPAN PESANAN
        $pesanan = Pesanan::create([
            'id_user' => $user->id_user,
            'tanggal_pesanan' => now(),
            'total_harga' => $total,
            'status_pesanan' => 'pending',
            'alamat_kirim' => $user->alamat,
            'metode_pembayaran' => $request->metode_pembayaran,
            'catatan' => $request->catatan,
            'nama_penerima' => $user->nama,
            'no_hp' => $user->no_hp
        ]);

        // DETAIL PESANAN
        foreach($keranjang as $item){

            DetailPesanan::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk' => $item->id_produk,
                'qty' => $item->qty,
                'harga' => $item->produk->harga,
                'subtotal' => $item->produk->harga * $item->qty
            ]);

            // KURANGI STOK
            $item->produk->decrement('stok', $item->qty);
        }

        // HAPUS KERANJANG
        Keranjang::where('id_user', $user->id_user)->delete();

        // REDIRECT
        if($request->metode_pembayaran == 'COD'){
            return redirect()->route('pesanan.saya');
        }

        return redirect()->route('pembayaran', $pesanan->id_pesanan);
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
            'bukti_pembayaran' => $namaFile
        ]);

        return back();
    }

    // BATALKAN PESANAN
    public function batalkan($id)
    {
        $pesanan = Pesanan::with('detailPesanan')
            ->findOrFail($id);

        if($pesanan->status_pesanan == 'pending'){

            $pesanan->update([
                'status_pesanan' => 'dibatalkan'
            ]);

            foreach($pesanan->detailPesanan as $detail){

                $detail->produk->increment('stok', $detail->qty);
            }
        }

        return back();
    }
}