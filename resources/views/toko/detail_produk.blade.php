<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>{{ $produk->nama_produk }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-100">

<x-header />

<div class="pt-40 pb-20 max-w-7xl mx-auto px-6">

    <!-- KEMBALI -->
    <a href="{{ route('toko') }}"
       class="text-green-600 hover:underline">

        ← Kembali ke Toko

    </a>

    <!-- CARD DETAIL -->
    <div class="bg-white rounded-2xl shadow p-8 mt-4">

        <div class="grid grid-cols-2 gap-10">

            <!-- KOLOM KIRI -->
<div>

    <div class="bg-gray-100 rounded-2xl p-5">

        <img
            src="{{ asset('uploads/produk/'.$produk->gambar) }}"
            alt="{{ $produk->nama_produk }}"
            class="w-full h-[500px] object-cover rounded-xl">

    </div>

</div>

            <!-- KOLOM KANAN -->
            <div>

                <!-- NAMA -->
                <h1 class="text-5xl font-bold mb-4">

                    {{ $produk->nama_produk }}

                </h1>

                <!-- RATING -->
                <div class="flex items-center gap-3 mb-5">

                    <span class="text-yellow-400 text-2xl">

                        ★★★★★

                    </span>

                    <span class="text-green-600">

                        50 Ulasan

                    </span>

                </div>

                <!-- HARGA -->
                <h2 class="text-4xl font-bold mb-6">

                    Rp {{ number_format($produk->harga,0,',','.') }}

                </h2>

                <!-- DESKRIPSI SINGKAT -->
                <p class="text-gray-700 leading-8 mb-5">

                    {{ $produk->deskripsi }}

                </p>

                <!-- BADGE -->
                <div class="flex gap-2 mb-6">

                    <span
                        class="bg-green-100 text-green-700
                               px-4 py-2 rounded-full text-sm">

                        {{ $produk->kategori->nama_kategori }}

                    </span>

                    <span
                        class="bg-green-100 text-green-700
                               px-4 py-2 rounded-full text-sm">

                        Ready Stock

                    </span>

                </div>

                <!-- STOK -->
                <div class="mb-5">

                    <span class="font-semibold">

                        Stok :

                    </span>

                    {{ $produk->stok }}

                </div>

                <!-- QUANTITY -->
                <div class="flex items-center gap-3 mb-8">

                    <button
                        type="button"
                        onclick="decreaseQty()"
                        class="bg-gray-200 px-5 py-3 rounded-xl text-xl">

                        -

                    </button>

                    <input
                        id="qty"
                        type="number"
                        value="1"
                        min="1"
                        max="{{ $produk->stok }}"
                        class="w-20 text-center border rounded-xl py-3">

                    <button
                        type="button"
                        onclick="increaseQty()"
                        class="bg-gray-200 px-5 py-3 rounded-xl text-xl">

                        +

                    </button>

                </div>

                <!-- BUTTON -->
                <div class="flex gap-4">

                    @guest

                    <!-- GUEST -->
                    <a href="{{ route('login') }}"
                       onclick="return confirm('Silakan login terlebih dahulu')"
                       class="bg-yellow-400
                              px-8 py-4 rounded-xl
                              font-semibold">

                        Tambah Keranjang

                    </a>

                    

                    @else

                    <!-- PEMBELI -->
                    <form action="{{ route('keranjang.tambah', $produk->id_produk) }}"
      method="POST">

                        @csrf

                        <input
    type="hidden"
    name="qty"
    id="hiddenQty"
    value="1">

                        <input
                            type="hidden"
                            name="id_produk"
                            value="{{ $produk->id_produk }}">

                        <button
                            class="bg-yellow-400
                                   px-8 py-4 rounded-xl
                                   font-semibold">

                            Tambah Keranjang
                        </button>

                    </form>

                    @endguest

                </div>

                <!-- PENJUAL -->
                <div class="border-t mt-8 pt-6">

                    <h3 class="font-bold text-xl mb-2">

                        Penjual

                    </h3>

                    <p class="text-gray-700">

                        FLOMART Official Store

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- DESKRIPSI PRODUK -->
    <div class="bg-white rounded-2xl shadow p-8 mt-8">

        <h2 class="text-3xl font-bold mb-6">

            Deskripsi Produk

        </h2>

        <p class="leading-9 text-gray-700">

            {{ $produk->deskripsi }}

        </p>

    </div>

</div>

<x-footer />

<script>

function increaseQty()
{
    let qtyInput = document.getElementById('qty');

    let hiddenQty = document.getElementById('hiddenQty');

    let currentQty = parseInt(qtyInput.value);

    let maxQty = parseInt(qtyInput.max);

    if(currentQty < maxQty)
    {
        qtyInput.value = currentQty + 1;

        hiddenQty.value = qtyInput.value;
    }
}

function decreaseQty()
{
    let qtyInput = document.getElementById('qty');

    let hiddenQty = document.getElementById('hiddenQty');

    let currentQty = parseInt(qtyInput.value);

    if(currentQty > 1)
    {
        qtyInput.value = currentQty - 1;

        hiddenQty.value = qtyInput.value;
    }
}

</script>

</body>
</html>