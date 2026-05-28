```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

<x-header />

<div class="max-w-5xl mx-auto pt-40 pb-20 px-6">

    <a href="{{ route('pesanan.saya') }}"
       class="text-green-600 hover:underline">

        ← Kembali

    </a>

    <div class="bg-white rounded-xl shadow p-6 mt-4">

        <h2 class="text-xl font-bold mb-4">

            Pembayaran Pesanan #{{ $pesanan->id_pesanan }}

        </h2>

        <p><b>Nama:</b> {{ $pesanan->nama_penerima }}</p>

        <p><b>No HP:</b> {{ $pesanan->no_hp }}</p>

        <p><b>Alamat:</b> {{ $pesanan->alamat_kirim }}</p>

        <p><b>Metode:</b> {{ $pesanan->metode_pembayaran }}</p>

        <hr class="my-4">

        <h3 class="font-semibold mb-3">

            Detail Produk

        </h3>

        @foreach($pesanan->detailPesanan as $d)

        <div class="flex justify-between border-b py-2 text-sm">

            <span>

                {{ $d->produk->nama_produk }}
                ({{ $d->qty }}x)

            </span>

            <span>

                Rp {{ number_format($d->subtotal, 0, ',', '.') }}

            </span>

        </div>

        @endforeach

        <div class="text-right font-bold text-green-600 mt-4">

            Total:
            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}

        </div>

        <hr class="my-4">

        <h3 class="font-semibold mb-3">

            Upload Bukti Pembayaran

        </h3>

        @if($pesanan->bukti_pembayaran)

            <p class="text-green-600 mb-2">

                Bukti berhasil diupload

            </p>

            <img src="{{ asset('uploads/bukti/' . $pesanan->bukti_pembayaran) }}"
                 class="w-64 rounded border">

        @else

        <form action="{{ route('upload.bukti', $pesanan->id_pesanan) }}"
              method="POST"
              enctype="multipart/form-data"
              class="mt-3">

            @csrf

            <input
                type="file"
                name="bukti"
                required
                class="border rounded px-3 py-2 w-full">

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded mt-3">

                Upload Bukti

            </button>

        </form>

        @endif

    </div>

</div>

<x-footer />

</body>
</html>
```
