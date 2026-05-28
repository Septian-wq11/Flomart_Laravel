<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>Detail Pesanan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

<x-header />
<div class="bg-gray-100 min-h-screen p-6 pt-40">

    <a href="{{ route('pesanan.saya') }}"
       class="text-green-600 hover:underline">

        ← Kembali

    </a>

    <div class="bg-white rounded-2xl shadow p-6 mt-4">

        <h2 class="text-2xl font-bold mb-6">

            Pesanan #{{ $pesanan->id_pesanan }}

        </h2>

        <p>
            <b>Nama:</b>
            {{ $pesanan->nama_penerima }}
        </p>

        <p>
            <b>No HP:</b>
            {{ $pesanan->no_hp }}
        </p>

        <p>
            <b>Alamat:</b>
            {{ $pesanan->alamat_kirim }}
        </p>

        <hr class="my-6">

        <h3 class="font-semibold text-lg mb-4">

            Daftar Produk

        </h3>

        @foreach($detail as $d)

        <div class="flex items-center justify-between border-b py-4 gap-4">

            <!-- GAMBAR -->
            <img src="{{ asset('storage/' . $d->produk->gambar) }}"
                 class="w-20 h-20 object-cover rounded-xl border">

            <!-- INFO -->
            <div class="flex-1">

                <p class="font-semibold text-lg">

                    {{ $d->produk->nama_produk }}

                </p>

                <p class="text-sm text-gray-500">

                    {{ $d->qty }} x
                    Rp {{ number_format($d->harga, 0, ',', '.') }}

                </p>

            </div>

            <!-- TOTAL -->
            <div class="font-bold text-green-600">

                Rp {{ number_format($d->subtotal, 0, ',', '.') }}

            </div>

        </div>

        @endforeach

        <div class="mt-6 space-y-2">

    <!-- ONGKIR -->
    <div class="flex justify-between text-gray-700">

        <span>Ongkos Kirim</span>

        <span>
            Rp {{ number_format($pesanan->ongkir, 0, ',', '.') }}
        </span>

    </div>

    <!-- SUBTOTAL -->
    <div class="flex justify-between text-gray-700">

        <span>Subtotal Produk</span>

        <span>
            Rp {{ number_format($pesanan->total_harga - $pesanan->ongkir, 0, ',', '.') }}
        </span>

    </div>


    <hr>

    <!-- TOTAL -->
    <div class="flex justify-between font-bold text-2xl text-green-600">

        <span>Total Belanja</span>

        <span>
            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
        </span>

    </div>

</div>

    </div>

</div>

<x-footer />