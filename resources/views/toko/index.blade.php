<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>Toko FLOMART</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-100">

<x-header />

<div class="pt-40 px-10 pb-20">

    <!-- SEARCH -->
    <form method="GET"
          action="{{ route('toko') }}"
          class="mb-10 flex gap-4">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari produk..."
            class="flex-1 border rounded-xl px-5 py-3">

        <button
            class="bg-green-600 text-white
                   px-10 rounded-xl">

            Cari

        </button>

    </form>

    <div class="grid grid-cols-12 gap-8">

        <!-- FILTER -->
        <div class="col-span-3">

            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="text-2xl font-bold mb-6">

                    Filters

                </h2>

                <form method="GET"
                      action="{{ route('toko') }}">

                    <!-- KATEGORI -->
                    <div class="mb-8">

                        <h3 class="font-bold text-lg mb-4">

                            Jenis Benih

                        </h3>

                        <div class="space-y-4">

                            @foreach($kategori as $kat)

                            <label class="flex items-center gap-3">

                                <input
                                    type="radio"
                                    name="kategori"
                                    value="{{ $kat->id_kategori }}"
                                    {{ request('kategori') == $kat->id_kategori ? 'checked' : '' }}

                                    class="accent-green-600">

                                <span>

                                    {{ $kat->nama_kategori }}

                                </span>

                            </label>

                            @endforeach

                        </div>

                    </div>

                    <!-- HARGA -->
                    <div class="mb-8">

                        <h3 class="font-bold text-lg mb-4">

                            Batas Harga

                        </h3>

                        <div class="flex gap-3">

                            <input
                                type="number"
                                name="min"
                                value="{{ request('min') }}"
                                placeholder="Min"

                                class="w-full border
                                       rounded-xl px-3 py-2">

                            <input
                                type="number"
                                name="max"
                                value="{{ request('max') }}"
                                placeholder="Max"

                                class="w-full border
                                       rounded-xl px-3 py-2">

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="space-y-3">

                        <button
                            class="w-full bg-yellow-400
                                   py-3 rounded-xl
                                   font-semibold">

                            Terapkan

                        </button>

                        <a href="{{ route('toko') }}"
                           class="block text-center
                                  w-full bg-gray-200
                                  py-3 rounded-xl
                                  font-semibold">

                            Atur Ulang

                        </a>

                    </div>

                </form>

            </div>

        </div>

        <!-- PRODUK -->
        <div class="col-span-9">

            <div class="grid grid-cols-4 gap-6">

                @foreach($produk as $item)

                <div class="bg-white rounded-3xl
                            shadow hover:shadow-lg
                            transition overflow-hidden">

                    <!-- KLIK CARD -->
                    <a href="{{ route('produk.detail', $item->id_produk) }}"
   class="bg-gray-50 flex items-center justify-center h-48">

    <img
        src="{{ asset('assets/img/' . $item->gambar) }}"
        class="max-h-40 object-contain">

</a>

                    <div class="p-5">

                        <p class="text-green-600 text-sm mb-2">

                            {{ $item->kategori->nama_kategori }}

                        </p>

                        <a href="{{ route('produk.detail', $item->id_produk) }}">

                            <h3 class="font-bold text-2xl mb-2">

                                {{ $item->nama_produk }}

                            </h3>

                        </a>

                        <p class="text-xl font-bold mb-4">

                            Rp{{ number_format($item->harga,0,',','.') }}

                        </p>

                        <!-- BUTTON -->
                        <div class="flex items-center justify-between">

                            <!-- DETAIL -->
                            <a href="{{ route('produk.detail', $item->id_produk) }}"
                               class="bg-gray-100
                                      px-4 py-2 rounded-xl
                                      hover:bg-gray-200">

                                Lihat Detail

                            </a>

                            <!-- GUEST -->
                            @guest

                            <a href="{{ route('login') }}"
                               onclick="return confirm('Silakan login terlebih dahulu')"
                               class="bg-yellow-400
                                      p-3 rounded-full">

                                <img
                                    src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                                    width="22">

                            </a>

                            @else

                            <!-- PEMBELI -->
                            <button
                                onclick="openModal({{ $item->id_produk }})"
                                class="bg-yellow-400
                                       hover:bg-yellow-500
                                       transition
                                       p-3 rounded-full">

                                <img
                                    src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                                    width="22">

                            </button>

                            @endguest

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

            <!-- PAGINATION -->
            <div class="mt-10">

                {{ $produk->links() }}

            </div>

        </div>

    </div>

</div>

<!-- MODAL -->
<div id="modalKeranjang"
     class="hidden fixed inset-0
            bg-black/50 z-50
            flex items-center justify-center">

    <div class="bg-white rounded-2xl p-8 w-[450px]">

        <h2 class="text-3xl font-bold mb-8">

            Tambah ke Keranjang

        </h2>

        <form id="formKeranjang"
              method="POST">

            @csrf

            <label class="block mb-3 text-lg">

                Jumlah

            </label>

            <input
                type="number"
                name="jumlah"
                value="1"
                min="1"

                class="w-full border
                       rounded-xl px-5 py-4">

            <div class="flex justify-end gap-4 mt-8">

                <button
                    type="button"
                    onclick="closeModal()"

                    class="bg-gray-300
                           px-6 py-3 rounded-xl">

                    Batal

                </button>

                <button
                    class="bg-green-600 text-white
                           px-6 py-3 rounded-xl">

                    Tambah

                </button>

            </div>

        </form>

    </div>

</div>

<script>

function openModal(id)
{
    document
        .getElementById('modalKeranjang')
        .classList.remove('hidden');

    document
        .getElementById('formKeranjang')
        .action = '/keranjang/tambah/' + id;
}

function closeModal()
{
    document
        .getElementById('modalKeranjang')
        .classList.add('hidden');
}

</script>

<x-footer />