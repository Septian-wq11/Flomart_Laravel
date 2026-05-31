<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang FLOMART</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

<x-header />

<div class="max-w-7xl mx-auto px-10 pt-44 pb-20">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-4xl font-bold text-gray-800">

            Keranjang Saya

        </h1>

        <a href="{{ route('home') }}"
           class="text-green-600 hover:underline font-medium">

            ← Kembali

        </a>

    </div>

    @if($keranjang->count() == 0)

        <!-- KOSONG -->
        <div class="bg-white p-12 rounded-2xl shadow text-center">

            <h2 class="text-2xl font-semibold text-gray-700 mb-3">

                Keranjang kosong 😢

            </h2>

            <p class="text-gray-500">

                Yuk tambahkan produk ke keranjang

            </p>

        </div>

    @else

    <form action="{{ route('checkout') }}"
      method="POST">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LIST PRODUK -->
            <div class="lg:col-span-2 space-y-5">

                @foreach($keranjang as $item)

                @php
                    $totalItem = $item->produk->harga * $item->qty;
                @endphp

                <div class="bg-white rounded-2xl shadow p-5 flex items-center justify-between hover:shadow-lg transition">

                    <!-- KIRI -->
                    <div class="flex items-center gap-5 flex-1">

                        <!-- CHECKBOX -->
                       <input type="checkbox"
                            name="selected_items[]"
                            value="{{ $item->id_keranjang }}"
                            class="item-check w-5 h-5 accent-green-600"
                            data-total="{{ $totalItem }}">

                        <!-- GAMBAR -->
                        <img src="{{ asset('storage/' . $item->produk->gambar)}}"
                             class="w-24 h-24 object-cover rounded-xl border">

                        <!-- DETAIL -->
                        <div>

                            <p class="text-sm text-gray-400">

                                {{ $item->produk->kategori->nama_kategori ?? '-' }}

                            </p>

                            <h2 class="text-2xl font-semibold">

                                {{ $item->produk->nama_produk }}

                            </h2>

                            <p class="text-gray-500 mt-1">

                                Rp {{ number_format($item->produk->harga, 0, ',', '.') }}

                            </p>

                            <p class="text-green-600 font-semibold mt-1">

                                Total:
                                Rp {{ number_format($totalItem, 0, ',', '.') }}

                            </p>

                        </div>

                    </div>

                    <!-- QTY -->
                    <div class="flex items-center gap-3">

                        <!-- KURANG -->
<form action="{{ route('keranjang.updateQty') }}"
      method="POST">

    @csrf

    <input type="hidden"
           name="id"
           value="{{ $item->id_keranjang }}">

    <input type="hidden"
           name="aksi"
           value="kurang">

    <button
        class="w-9 h-9 rounded-full bg-gray-200 hover:bg-gray-300">

        -

    </button>

</form>

                        <span class="font-semibold text-lg">

                            {{ $item->qty }}

                        </span>

                        <!-- TAMBAH -->
<form action="{{ route('keranjang.updateQty') }}"
      method="POST">

    @csrf

    <input type="hidden"
           name="id"
           value="{{ $item->id_keranjang }}">

    <input type="hidden"
           name="aksi"
           value="tambah">

    <button
        class="w-9 h-9 rounded-full bg-gray-200 hover:bg-gray-300">

        +

    </button>

</form>

                    </div>

                    <!-- DELETE -->
                    <form action="{{ route('keranjang.hapus') }}"
      method="POST"
      class="ml-4">

    @csrf
    @method('DELETE')

    <input type="hidden"
           name="id"
           value="{{ $item->id_keranjang }}">

    <button
        onclick="return confirm('Hapus item ini?')"
        class="text-2xl text-gray-400 hover:text-red-500">

        🗑️

    </button>

</form>

                </div>

                @endforeach

            </div>

            <!-- RINGKASAN -->
            <div class="bg-white rounded-2xl shadow-lg p-6 h-fit sticky top-32">

                <h2 class="text-2xl font-bold mb-5">

                    Ringkasan Belanja

                </h2>

                <div class="space-y-4">

                    <!-- NAMA -->
                    <div>

                        <label class="block mb-1 text-gray-700">

                            Nama

                        </label>

                        <input type="text"
                               value="{{ Auth::user()->nama }}"
                               class="w-full border rounded-lg px-4 py-2">

                    </div>

                    <!-- NO HP -->
                    <div>

                        <label class="block mb-1 text-gray-700">

                            No HP

                        </label>

                        <input type="text"
                               value="{{ Auth::user()->no_hp }}"
                               class="w-full border rounded-lg px-4 py-2">

                    </div>

                    <!-- ALAMAT -->
                    <div>

                        <label class="block mb-1 text-gray-700">

                            Alamat

                        </label>

                        <textarea
                            class="w-full border rounded-lg px-4 py-2">{{ Auth::user()->alamat }}</textarea>

                    </div>

                    <!-- ONGKIR -->
                    <div>

                        <label class="block mb-1 text-gray-700">

                            Wilayah

                        </label>

                        <select id="ongkir" name="ongkir"
                                class="w-full border rounded-lg px-4 py-2">

                            <option value="0">Pilih Wilayah</option>
                            <option value="10000">Surabaya</option>
                            <option value="12000">Sidoarjo</option>
                            <option value="15000">Jakarta</option>

                        </select>

                    </div>

                    <!-- CATATAN -->
                    <div>

                        <label class="block mb-1 text-gray-700">

                            Catatan

                        </label>

                        <textarea name="catatan"
                            class="w-full border rounded-lg px-4 py-2"
                            placeholder="Contoh: kirim sore hari"></textarea>

                    </div>

                    <!-- METODE -->
                    <div>

                        <label class="block mb-1 text-gray-700">

                            Metode Pembayaran

                        </label>

                        <select name="metode_pembayaran"
                            class="w-full border rounded-lg px-4 py-2">

                            <option>COD</option>
                            <option>Transfer</option>

                        </select>

                    </div>

                </div>

                <!-- TOTAL -->
                <div class="mt-6 space-y-2">

                    <p>

                        Subtotal:
                        <span id="subtotal">

                            Rp 0

                        </span>

                    </p>

                    <p>

                        Ongkir:
                        <span id="ongkirText">

                            Rp 0

                        </span>

                    </p>

                    <hr>

                    <p class="text-2xl font-bold">

                        Total:
                        <span id="total">

                            Rp 0

                        </span>

                    </p>

                </div>

                <!-- CHECKOUT -->
                    <button
                        type="submit"
                        onclick="return validasi()"
                        class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold transition">

                        Checkout

                    </button>



            </div>

        </div>

    </form>

    @endif

</div>

<x-footer />

<script>

function hitungTotal()
{
    let subtotal = 0;

    document.querySelectorAll('.item-check:checked').forEach(cb => {

        subtotal += parseInt(cb.dataset.total);

    });

    let ongkir = parseInt(document.getElementById('ongkir').value);

    let total = subtotal + ongkir;

    document.getElementById('subtotal').innerText =
        "Rp " + subtotal.toLocaleString();

    document.getElementById('ongkirText').innerText =
        "Rp " + ongkir.toLocaleString();

    document.getElementById('total').innerText =
        "Rp " + total.toLocaleString();
}

document.querySelectorAll('.item-check').forEach(cb => {

    cb.addEventListener('change', hitungTotal);

});

document.getElementById('ongkir').addEventListener('change', hitungTotal);

window.onload = hitungTotal;

function validasi()
{
    if(document.querySelectorAll('.item-check:checked').length == 0){

        alert("Pilih produk dulu!");

        return false;
    }

    if(document.getElementById('ongkir').value == 0){

        alert("Pilih wilayah dulu!");

        return false;
    }

    return true;
}

</script>

</body>
</html>