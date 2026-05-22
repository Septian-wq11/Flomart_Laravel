<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard FLOMART</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans scroll-smooth">

<!-- HEADER -->
<header class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow z-50">

    <!-- TOP BAR -->
    <div class="flex items-center justify-between px-10 py-4">

        <!-- LOGO -->
        <img src="{{ asset('assets/img/LogoFlomart.png') }}" width="150">

        <div class="flex items-center gap-8">

            <!-- MENU -->
            <nav class="flex items-center gap-6 text-gray-700 font-medium text-sm">

                {{-- CHAT --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="hover:text-green-600">
                        Chat
                    </a>
                @else
                    <a href="/chat"
                       class="hover:text-green-600">
                        Chat
                    </a>
                @endguest

                {{-- PESANAN --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="hover:text-green-600">
                        Pesanan
                    </a>
                @else
                    <a href="/pesanan"
                       class="hover:text-green-600">
                        Pesanan
                    </a>
                @endguest

                {{-- NOTIFIKASI --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="hover:text-green-600">
                        Notifikasi
                    </a>
                @else
                    <a href="/notifikasi"
                       class="hover:text-green-600">
                        Notifikasi
                    </a>
                @endguest

                {{-- KERANJANG --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="hover:text-green-600">
                        Keranjang
                    </a>
                @else
                    <a href="/keranjang"
                       class="hover:text-green-600">
                        Keranjang
                    </a>
                @endguest

                <!-- AVATAR -->
                <div class="w-6 h-6 rounded-full border-2 border-green-500
                flex items-center justify-center text-green-600 text-xs">

                    {{ strtoupper(substr(Auth::user()->nama ?? 'G', 0, 1)) }}

                </div>

            </nav>

            {{-- LOGIN / LOGOUT --}}
            @guest

                <a href="{{ route('login') }}"
                   class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">

                    Login

                </a>

            @else

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">

                        Logout

                    </button>

                </form>

            @endguest

        </div>

    </div>

    <!-- NAVBAR -->
    <div class="px-10">

        <nav class="border-t-2 border-gray-200 py-3 flex justify-center gap-10 text-gray-700 font-medium">

            <a href="/"
               class="text-green-600 border-b-2 border-green-600 pb-1">

                Beranda

            </a>

            @guest
                <a href="{{ route('login') }}">
                    Mulai Jualan
                </a>
            @else
                <a href="/admin/dashboard">
                    Mulai Jualan
                </a>
            @endguest

            <a href="#">
                Tentang Kami
            </a>

        </nav>

    </div>

</header>

<!-- CONTENT -->
<div class="pt-32 px-10 max-w-7xl mx-auto">

    <!-- GREETING -->
    <section class="mb-6 mt-10">

        <h1 class="text-4xl font-bold">

            Selamat datang,
            {{ Auth::user()->nama ?? 'Guest' }}!

        </h1>

    </section>

    <!-- BANNER -->
    <section class="mb-12">

        <div class="rounded-2xl px-10 py-12 flex items-center justify-between
        bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/BannerBg.png') }}');">

            <div class="max-w-xl">

                <h1 class="text-4xl font-bold mb-6">

                    Belanja Pintar <br>
                    untuk Masa Depan <br>
                    yang Lebih Hijau

                </h1>

                <p class="text-gray-500 mb-6">

                    Temukan produk tanaman ramah lingkungan
                    dari penjual terpercaya dengan proses
                    belanja yang mudah dan aman

                </p>

            </div>

            <img src="{{ asset('assets/img/FotoLogin.png') }}"
                 width="300">

        </div>

    </section>

    <!-- REKOMENDASI -->
    <section class="mb-12">

        <h2 class="text-2xl font-bold mb-2">
            Rekomendasi Benih Berkualitas
        </h2>

        <p class="text-gray-500 mb-6">
            Produk rekomendasi terbaik FLOMART.
        </p>

        <div class="grid grid-cols-4 gap-6">

            @foreach($rekomendasi as $item)

                <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition">

                    <div class="mb-4">

                        <img src="{{ asset('uploads/produk/' . $item->gambar) }}"
                             class="w-full h-40 object-cover rounded-lg">

                    </div>

                    <p class="text-xs text-gray-400">

                        {{ $item->kategori->nama_kategori ?? '-' }}

                    </p>

                    <h3 class="font-semibold text-lg">

                        {{ $item->nama_produk }}

                    </h3>

                    <p class="text-green-600 font-bold">

                        Rp {{ number_format($item->harga, 0, ',', '.') }}

                    </p>

                </div>

            @endforeach

        </div>

    </section>

    <!-- KATEGORI -->
    <section class="mb-10">

        <h2 class="text-2xl font-bold mb-2">
            Pilihan Benih Terbaik
        </h2>

        <p class="text-gray-500 mb-4">
            Pilih produk berdasarkan kategori.
        </p>

        <div class="flex gap-3 flex-wrap">

            @foreach($kategori as $item)

                <button
                    class="px-4 py-2 rounded-full text-sm transition border
                    bg-white border-gray-200 hover:bg-green-100 hover:text-green-700">

                    {{ $item->nama_kategori }}

                </button>

            @endforeach

        </div>

    </section>

    <!-- PRODUK -->
    <section class="mb-32">

        <div class="grid grid-cols-4 gap-6">

            @foreach($produk as $item)

                <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition">

                    <div class="mb-4">

                        <img src="{{ asset('uploads/produk/' . $item->gambar) }}"
                             class="w-full h-40 object-cover rounded-lg">

                    </div>

                    <p class="text-xs text-gray-400">

                        {{ $item->kategori->nama_kategori }}

                    </p>

                    <h3 class="font-semibold text-lg">

                        {{ $item->nama_produk }}

                    </h3>

                    <p class="text-green-600 font-bold">

                        Rp {{ number_format($item->harga, 0, ',', '.') }}

                    </p>

                    <div class="flex justify-end mt-4">

                        @guest

                            <a href="{{ route('login') }}"
                               class="bg-yellow-400 p-2 rounded-full hover:bg-yellow-500">

                                <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                                     width="23">

                            </a>

                        @else

                            <a href="/keranjang"
                               class="bg-yellow-400 p-2 rounded-full hover:bg-yellow-500">

                                <img src="{{ asset('assets/img/logoKeranjangPutih.png') }}"
                                     width="23">

                            </a>

                        @endguest

                    </div>

                </div>

            @endforeach

        </div>

    </section>

</div>

<!-- FOOTER -->
<footer class="bg-green-700 text-white py-14 mt-10">

    <div class="max-w-7xl mx-auto px-10">

        <div class="grid grid-cols-4 gap-10">

            <!-- BRAND -->
            <div>

                <img src="{{ asset('assets/img/contrasLogoFlomart.png') }}"
                     width="150">

                <p class="text-sm mb-4">

                    Marketplace tanaman ramah lingkungan terpercaya

                </p>

            </div>

            <!-- LAYANAN -->
            <div>

                <h3 class="font-semibold mb-4">
                    Layanan
                </h3>

                <ul class="space-y-2 text-sm">

                    <li>Belanja Tanaman</li>
                    <li>Bibit & Media Tanaman</li>
                    <li>Filter Kecocokan Tanaman</li>

                </ul>

            </div>

            <!-- BANTUAN -->
            <div>

                <h3 class="font-semibold mb-4">
                    Bantuan
                </h3>

                <ul class="space-y-2 text-sm">

                    <li>Cara Belanja</li>
                    <li>Cara Menjual Tanaman</li>
                    <li>Pengiriman & Perawatan</li>

                </ul>

            </div>

            <!-- SOSMED -->
            <div>

                <h3 class="font-semibold mb-4">
                    Ikuti Kami
                </h3>

                <ul class="space-y-2 text-sm">

                    <li>Instagram - @flomart.id</li>
                    <li>Facebook - FLOMART</li>

                </ul>

            </div>

        </div>

    </div>

</footer>

</body>
</html>