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
                    <img src="{{ asset('uploads/produk/' . $item->gambar) }}"
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

    <form action="{{ route('keranjang.tambah', $item->id_produk) }}"
          method="POST">

        @csrf

        <button
            class="bg-yellow-400 p-3 rounded-full hover:bg-yellow-500 transition">

            <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                 width="24">

        </button>

    </form>

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
                    <img src="{{ asset('uploads/produk/' . $item->gambar) }}"
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

                            <a href="/keranjang"
                               class="bg-yellow-400 p-3 rounded-full hover:bg-yellow-500 transition">

                                <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                                     width="24">

                            </a>

                        @endguest

                    </div>

                </div>

            @endforeach

        </div>

    </section>

</div>

<x-footer />

</body>
</html>