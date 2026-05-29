```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Saya</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

<x-header />

<div class="max-w-6xl mx-auto pt-40 pb-20 px-6">

    <!-- HEADER -->
<div class="bg-white p-5 rounded-xl shadow mb-6 flex justify-between items-center">

    <h1 class="text-2xl font-bold text-gray-800">

        Pesanan Saya

    </h1>

    <a href="{{ route('home') }}"
       class="text-green-600 hover:underline">

        ← Kembali

    </a>

</div>

<!-- ALERT -->
@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif

    @if($pesanan->count() == 0)

        <div class="bg-white p-10 rounded-xl shadow text-center text-gray-500">

            Belum ada pesanan 😢

        </div>

    @else

    <div class="space-y-4">

        @foreach($pesanan as $p)

        @php

            $warna = "bg-gray-200 text-gray-700";

            if ($p->status_pesanan == 'menunggu')
                $warna = "bg-yellow-100 text-yellow-700";

            if ($p->status_pesanan == 'diproses')
                $warna = "bg-blue-100 text-blue-700";

            if ($p->status_pesanan == 'dikirim')
                $warna = "bg-purple-100 text-purple-700";

            if ($p->status_pesanan == 'selesai')
                $warna = "bg-green-100 text-green-700";

            if ($p->status_pesanan == 'dibatalkan')
                $warna = "bg-red-100 text-red-700";

        @endphp

        <!-- CARD -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-2">

                <div>

                    <p class="font-semibold text-gray-800">

                        Pesanan #{{ $p->id_pesanan }}

                    </p>

                    <p class="text-sm text-gray-500">

                        {{ \Carbon\Carbon::parse($p->tanggal_pesanan)->format('d M Y, H:i') }}

                    </p>

                </div>

                <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $warna }}">

                    {{ ucfirst($p->status_pesanan) }}

                </span>

            </div>

            <!-- DATA -->
            <p class="text-sm text-gray-700">

                {{ $p->nama_penerima }}
                ({{ $p->no_hp }})

            </p>

            <p class="text-sm text-gray-500 mt-1">

                {{ $p->alamat_kirim }}

            </p>

            @if($p->catatan)

            <p class="text-sm text-yellow-700 bg-yellow-50 p-2 rounded mt-2">

                📝 {{ $p->catatan }}

            </p>

            @endif

            <p class="text-sm text-gray-500 mt-2">

                Metode: {{ $p->metode_pembayaran }}

            </p>

            <!-- TOTAL -->
            <div class="flex justify-between items-center border-t pt-3 mt-3">

                <span class="text-gray-600">

                    Total Belanja

                </span>

                <span class="font-bold text-green-600">

                    Rp {{ number_format($p->total_harga, 0, ',', '.') }}

                </span>

            </div>

            <!-- ACTION -->
            <div class="mt-4 flex justify-between items-center">

                <!-- DETAIL -->
                <a href="{{ route('pesanan.detail', $p->id_pesanan) }}"
                   class="text-blue-600 text-sm hover:underline">

                    Detail

                </a>

                <!-- BUTTON -->
                <div class="flex gap-2">

                    @if($p->metode_pembayaran == 'Transfer')

    {{-- BELUM UPLOAD --}}
    @if($p->status_pesanan == 'pending')

        <a href="{{ route('pembayaran', $p->id_pesanan) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">

            Upload Bukti

        </a>

    {{-- SUDAH UPLOAD --}}
    @elseif($p->status_pesanan == 'menunggu')

        <span class="text-sm text-yellow-600 italic font-medium">

            Menunggu Verifikasi Admin

        </span>

    @endif

@endif

                    <!-- BATALKAN -->
                    @if($p->status_pesanan == 'pending')

                    <form action="{{ route('batalkan.pesanan', $p->id_pesanan) }}"
                          method="POST">

                        @csrf

                        <button
                            onclick="return confirm('Yakin ingin membatalkan pesanan ini?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">

                            Batalkan

                        </button>

                    </form>

                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @endif

</div>

<x-footer />

</body>
</html>
```
