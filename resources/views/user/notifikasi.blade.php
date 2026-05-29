<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>Notifikasi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

<x-header />

@if(session('success'))

<div class="max-w-5xl mx-auto pt-32 px-6">

    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl">

        {{ session('success') }}

    </div>

</div>

@endif

@if(session('error'))

<div class="max-w-5xl mx-auto pt-32 px-6">

    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl">

        {{ session('error') }}

    </div>

</div>

@endif

<div class="pt-40 pb-20 px-6 max-w-6xl mx-auto">

    <div class="bg-white rounded-2xl shadow p-8">

        <h1 class="text-3xl font-bold mb-8">

            Notifikasi

        </h1>

        <div class="space-y-6">

            @forelse($pesanan as $p)

                <div class="flex items-start justify-between border-b pb-6">

                    <div class="flex gap-4">

                        {{-- GAMBAR --}}
                        @php
                            $gambar = $p->detailPesanan->first()?->produk?->gambar;
                        @endphp

                        <img
                            src="{{ asset('storage/' . $gambar) }}"
                            class="w-20 h-20 rounded-xl object-cover border">

                        {{-- ISI --}}
                        <div>

                            {{-- PENDING --}}
                            @if($p->status_pesanan == 'pending')

                                <h2 class="font-bold text-lg">

                                    Selesaikan Pembayaranmu

                                </h2>

                                <p class="text-gray-600 text-sm mt-1">

                                    Hai {{ $p->nama_penerima }},
                                    segera upload bukti pembayaran
                                    untuk pesanan #{{ $p->id_pesanan }}

                                </p>

                            {{-- MENUNGGU --}}
                            @elseif($p->status_pesanan == 'menunggu')

                                <h2 class="font-bold text-lg">

                                    Menunggu Verifikasi Admin

                                </h2>

                                <p class="text-gray-600 text-sm mt-1">

                                    Bukti pembayaran pesanan
                                    #{{ $p->id_pesanan }}
                                    sedang diperiksa admin.

                                </p>

                            {{-- DIPROSES --}}
                            @elseif($p->status_pesanan == 'diproses')

                                <h2 class="font-bold text-lg">

                                    Pesanan Sedang Diproses

                                </h2>

                                <p class="text-gray-600 text-sm mt-1">

                                    Pesanan #{{ $p->id_pesanan }}
                                    sedang disiapkan penjual.

                                </p>

                            {{-- DIKIRIM --}}
                            @elseif($p->status_pesanan == 'dikirim')

                                <h2 class="font-bold text-lg">

                                    Pesanan Sedang Dikirim

                                </h2>

                                <p class="text-gray-600 text-sm mt-1">

                                    Pesananmu sedang dalam perjalanan.

                                </p>

                            {{-- SELESAI --}}
                            @elseif($p->status_pesanan == 'selesai')

                                <h2 class="font-bold text-lg">

                                    Pesanan Selesai

                                </h2>

                                <p class="text-gray-600 text-sm mt-1">

                                    Pesanan berhasil diselesaikan.
                                    Terima kasih telah berbelanja.

                                </p>

                            {{-- DIBATALKAN --}}
                            @elseif($p->status_pesanan == 'dibatalkan')

                                <h2 class="font-bold text-lg text-red-500">

                                    Pesanan Dibatalkan

                                </h2>

                                <p class="text-gray-600 text-sm mt-1">

                                    Pesanan #{{ $p->id_pesanan }}
                                    telah dibatalkan.

                                </p>

                            @endif

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <a href="{{ route('pesanan.detail', $p->id_pesanan) }}"
                       class="bg-yellow-100 hover:bg-yellow-200
                              text-yellow-700 text-sm px-4 py-2 rounded-lg">

                        Tampilkan Rincian

                    </a>

                </div>

            @empty

                <div class="text-center text-gray-500 py-10">

                    Belum ada notifikasi

                </div>

            @endforelse

        </div>

    </div>

</div>

<x-footer />

</body>
</html>