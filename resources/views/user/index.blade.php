<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLOMART</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans scroll-smooth">

<x-header />

<!-- CONTENT -->
<div class="pt-36 px-10 max-w-7xl mx-auto">

    <!-- GREETING -->
    <section class="mb-6">

        <h1 class="text-4xl font-bold">

            Selamat datang,
            {{ Auth::user()->nama ?? 'Guest' }}!

        </h1>

    </section>

    <!-- BANNER -->
<section class="mb-12">

    <div class="relative rounded-2xl overflow-hidden">

        <!-- BACKGROUND -->
        <img
            src="{{ asset('assets/img/BannerBg.png') }}"
            class="absolute inset-0 w-full h-full object-cover -z-10">

        <!-- CONTENT -->
        <div class="px-10 py-12 flex items-center justify-between">

            <!-- TEXT -->
            <div class="max-w-xl">

                <h1 class="text-4xl font-bold mb-6 leading-tight">

                    Belanja Pintar <br>
                    untuk Masa Depan <br>
                    yang Lebih Hijau

                </h1>

                <p class="text-gray-500 mb-6 text-[15px] leading-7">

                    Temukan produk tanaman ramah lingkungan
                    dari penjual terpercaya dengan proses
                    belanja yang mudah dan aman

                </p>

            </div>

            <!-- IMAGE -->
            <img
                src="{{ asset('assets/img/FotoLogin.png') }}"
                width="300">

        </div>

    </div>

</section>

    <!-- REKOMENDASI -->
    <section class="mb-14">

        <h2 class="text-3xl font-bold mb-2">

            Rekomendasi Benih Berkualitas

        </h2>

        <p class="text-gray-500 mb-8">

            Produk rekomendasi berdasarkan jumlah penjualan terbanyak.

        </p>

        <div class="grid grid-cols-4 gap-6">

            @foreach($rekomendasi as $item)

                <div class="bg-white rounded-2xl shadow-md p-4 hover:shadow-xl transition">

                    <!-- IMAGE -->
                    <img src="{{  asset('storage/' . $item->gambar) }}"
                         class="w-full h-48 object-cover rounded-xl mb-4">

                    <!-- KATEGORI -->
                    <p class="text-sm text-gray-400">

                        {{ $item->kategori->nama_kategori ?? '-' }}

                    </p>

                    <!-- NAMA -->
                    <h3 class="font-semibold text-lg mb-2">

                        {{ $item->nama_produk }}

                    </h3>

                    <!-- HARGA -->
<p class="text-green-600 font-bold text-lg">

    Rp {{ number_format($item->harga, 0, ',', '.') }}

</p>

<!-- BUTTON KERANJANG -->
<div class="flex justify-end mt-4">

    @guest

        <!-- Jika belum login -->
        <a href="{{ route('login') }}"
            onclick="return confirm('Anda harus login terlebih dahulu. Login sekarang?')"
           class="bg-yellow-400 p-3 rounded-full hover:bg-yellow-500 transition">

            <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                 width="24">

        </a>

   @else

    <button
    onclick="openModal({{ $item->id_produk }})"
    class="bg-yellow-400 p-3 rounded-full hover:bg-yellow-500 transition">

    <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
         width="24">

</button>

@endguest
</div>

</div>

            @endforeach

        </div>

    </section>

    <!-- KATEGORI -->
    <section class="mb-10">

        <h2 class="text-3xl font-bold mb-2">

            Pilihan Benih Terbaik

        </h2>

        <p class="text-gray-500 mb-6">

            Pilih produk berdasarkan kategori.

        </p>

        <div class="flex gap-4 flex-wrap">

            <!-- SEMUA -->
    <a href="/#produk"
       class="{{ request('kategori') == null
            ? 'bg-green-600 text-white'
            : 'bg-white hover:bg-green-100 hover:text-green-700' }}
       px-5 py-2 rounded-full border transition">

        Semua

    </a>


            @foreach($kategori as $item)

                <a href="/?kategori={{ $item->id_kategori }}#produk"
                   class="px-5 py-2 rounded-full border transition
           {{ request('kategori') == $item->id_kategori
                ? 'bg-green-600 text-white'
                : 'bg-white text-black hover:bg-green-100 hover:text-green-700' }}">

                    {{ $item->nama_kategori }}

                </a>

            @endforeach

        </div>

    </section>

    <!-- PRODUK -->
    <section id="produk" class="mb-32">

        <div class="grid grid-cols-4 gap-6">    
        
        @foreach($produk as $item)

                <div class="bg-white rounded-2xl shadow-md p-4 hover:shadow-xl transition">

                    <!-- IMAGE -->
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                         class="w-full h-48 object-cover rounded-xl mb-4">

                    <!-- KATEGORI -->
                    <p class="text-sm text-gray-400">

                        {{ $item->kategori->nama_kategori }}

                    </p>

                    <!-- NAMA -->
                    <h3 class="font-semibold text-lg mb-2">

                        {{ $item->nama_produk }}

                    </h3>

                    <!-- HARGA -->
                    <p class="text-green-600 font-bold text-lg">

                        Rp {{ number_format($item->harga, 0, ',', '.') }}

                    </p>

                    <!-- BUTTON -->
<div class="flex justify-end mt-4">

    @guest

        <a href="{{ route('login') }}"
           onclick="return confirm('Anda harus login terlebih dahulu. Login sekarang?')"
           class="bg-yellow-400 p-3 rounded-full hover:bg-yellow-500 transition">

            <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                 width="24">

        </a>

    @else

        <!-- TOMBOL BUKA MODAL -->
        <button
            onclick="document.getElementById('modal{{ $item->id_produk }}').classList.remove('hidden')"
            class="bg-yellow-400 p-3 rounded-full hover:bg-yellow-500 transition">

            <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                 width="24">

        </button>

        <!-- MODAL -->
        <div id="modal{{ $item->id_produk }}"
             class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

            <div class="bg-white p-8 rounded-2xl w-[400px]">

                <h2 class="text-2xl font-bold mb-6">

                    Tambah ke Keranjang

                </h2>

                <form action="{{ route('keranjang.tambah', $item->id_produk) }}"
                      method="POST">

                    @csrf

                    <label class="block mb-2">

                        Jumlah

                    </label>

                    <input type="number"
                           name="qty"
                           value="1"
                           min="1"
                           class="w-full border rounded-lg px-4 py-2 mb-6">

                    <div class="flex justify-end gap-3">

                        <button type="button"
                                onclick="document.getElementById('modal{{ $item->id_produk }}').classList.add('hidden')"
                                class="bg-gray-300 px-4 py-2 rounded-lg">

                            Batal

                        </button>

                        <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg">

                            Tambah

                        </button>

                    </div>

                </form>

            </div>

        </div>

    @endguest

</div>

                </div>

            @endforeach

        </div>

    </section>

</div>

<!-- MODAL KERANJANG -->
<div id="cartModal"
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl p-8 w-[380px]">

        <h2 class="text-2xl font-bold mb-6">

            Tambah ke Keranjang

        </h2>

        <form id="cartForm" method="POST">

            @csrf

            <!-- JUMLAH -->
            <div class="mb-6">

                <label class="block mb-2 text-gray-700">

                    Jumlah

                </label>

                <input type="number"
                       name="qty"
                       value="1"
                       min="1"
                       class="w-full border rounded-lg px-4 py-2">

            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3">

                <button type="button"
                        onclick="closeModal()"
                        class="bg-gray-300 px-5 py-2 rounded-lg">

                    Batal

                </button>

                <button type="submit"
                        class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">

                    Tambah

                </button>

            </div>

        </form>

    </div>

</div>

<script>

function openModal(idProduk)
{
    const modal = document.getElementById('cartModal');

    const form = document.getElementById('cartForm');

    form.action = `/keranjang/tambah/${idProduk}`;

    modal.classList.remove('hidden');

    modal.classList.add('flex');
}

function closeModal()
{
    const modal = document.getElementById('cartModal');

    modal.classList.remove('flex');

    modal.classList.add('hidden');
}

</script>

<x-footer />

</body>
</html>