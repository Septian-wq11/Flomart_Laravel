@extends('admin.layouts.app')

@section('title', 'Detail Pesanan')

@section('content')

@if(session('success'))

<div class="mb-4 p-4 rounded-xl bg-green-100 text-green-700">

    {{ session('success') }}

</div>

@endif

<div class="mb-6">

    <h1 class="text-3xl font-bold text-slate-800">
        Detail Pesanan #{{ $pesanan->id_pesanan }}
    </h1>

    <p class="text-slate-500 mt-2">
        Informasi lengkap pesanan pelanggan
    </p>

</div>

<div class="grid lg:grid-cols-3 gap-6">

    {{-- DATA PEMBELI --}}
    <div class="bg-white rounded-3xl shadow-sm p-6">

        <h2 class="text-xl font-bold mb-4">
            Data Pembeli
        </h2>

        <div class="space-y-4">

            <div>

                <p class="text-slate-500 text-sm">
                    Nama Penerima
                </p>

                <p class="font-semibold">
                    {{ $pesanan->nama_penerima }}
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">
                    No HP
                </p>

                <p class="font-semibold">
                    {{ $pesanan->no_hp }}
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">
                    Alamat Pengiriman
                </p>

                <p class="font-semibold">
                    {{ $pesanan->alamat_kirim }}
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">
                    Metode Pembayaran
                </p>

                <p class="font-semibold">
                    {{ $pesanan->metode_pembayaran }}
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">
                    Tanggal Pesanan
                </p>

                <p class="font-semibold">
                    {{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d M Y H:i') }}
                </p>

            </div>

            @if($pesanan->catatan)

            <div>

                <p class="text-slate-500 text-sm">
                    Catatan Pembeli
                </p>

                <p class="font-semibold">
                    {{ $pesanan->catatan }}
                </p>

            </div>

            @endif

            <div>

                <p class="text-slate-500 text-sm">
                    Status Pesanan
                </p>

                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium

                    @if($pesanan->status_pesanan == 'pending')
                        bg-red-100 text-red-600
                    @elseif($pesanan->status_pesanan == 'menunggu')
                        bg-yellow-100 text-yellow-600
                    @elseif($pesanan->status_pesanan == 'diproses')
                        bg-blue-100 text-blue-600
                    @elseif($pesanan->status_pesanan == 'selesai')
                        bg-green-100 text-green-600
                    @elseif($pesanan->status_pesanan == 'dibatalkan')
                        bg-gray-100 text-gray-600
                    @endif">

                    {{ ucfirst($pesanan->status_pesanan) }}

                </span>

            </div>

        </div>

    </div>

    {{-- PRODUK --}}
    <div class="bg-white rounded-3xl shadow-sm p-6 lg:col-span-2">

        <h2 class="text-xl font-bold mb-4">
            Produk Dipesan
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b">

                        <th class="text-left py-3">
                            Produk
                        </th>

                        <th class="text-left py-3">
                            Qty
                        </th>

                        <th class="text-left py-3">
                            Harga
                        </th>

                        <th class="text-left py-3">
                            Subtotal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($pesanan->detailPesanan as $detail)

                    <tr class="border-b">

                        <td class="py-4">
                            {{ $detail->produk->nama_produk }}
                        </td>

                        <td>
                            {{ $detail->qty }}
                        </td>

                        <td>
                            Rp {{ number_format($detail->harga,0,',','.') }}
                        </td>

                        <td>
                            Rp {{ number_format($detail->subtotal,0,',','.') }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="mt-4 text-right">

            <span class="font-semibold">

                Total Item :
                {{ $pesanan->detailPesanan->sum('qty') }}

            </span>

        </div>

    </div>

</div>

{{-- BUKTI PEMBAYARAN --}}
<div class="bg-white rounded-3xl shadow-sm p-6 mt-6">

    <h2 class="text-xl font-bold mb-4">
        Bukti Pembayaran
    </h2>

    @if($pesanan->bukti_pembayaran)

        <img
            src="{{ asset('uploads/bukti/' . $pesanan->bukti_pembayaran) }}"
            alt="Bukti Pembayaran"
            class="w-96 rounded-xl border">

    @else

        <p class="text-slate-500">
            Belum ada bukti pembayaran.
        </p>

    @endif

</div>

{{-- TOTAL --}}
<div class="bg-white rounded-3xl shadow-sm p-6 mt-6">

    <h2 class="text-xl font-bold mb-4">
        Ringkasan Pembayaran
    </h2>

    <div class="space-y-2">

        <div class="flex justify-between">

            <span>Ongkir</span>

            <span>
                Rp {{ number_format($pesanan->ongkir,0,',','.') }}
            </span>

        </div>

        <div class="flex justify-between font-bold text-lg border-t pt-3">

            <span>Total</span>

            <span>
                Rp {{ number_format($pesanan->total_harga,0,',','.') }}
            </span>

        </div>

    </div>

</div>

{{-- AKSI ADMIN --}}
<div class="mt-6 flex flex-wrap gap-3">

    @if($pesanan->status_pesanan == 'menunggu')

    <form
        action="{{ route('pesanan.verifikasi', $pesanan->id_pesanan) }}"
        method="POST">

        @csrf
        @method('PUT')

        <button
            type="submit"
            class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl">

            Verifikasi Pembayaran

        </button>

    </form>

    @endif

    @if($pesanan->status_pesanan == 'diproses')

    <form
        action="{{ route('pesanan.selesai', $pesanan->id_pesanan) }}"
        method="POST">

        @csrf
        @method('PUT')

        <button
            type="submit"
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl">

            Tandai Selesai

        </button>

    </form>

    @endif

    <a
        href="{{ route('pesanan.index') }}"
        class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-xl">

        Kembali

    </a>

</div>

@endsection