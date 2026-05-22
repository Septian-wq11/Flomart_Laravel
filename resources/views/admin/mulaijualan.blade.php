<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulai Jualan - FLOMART</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

<!-- HEADER -->
<header class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow z-50">

    <!-- TOP -->
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

                <!-- AVATAR -->
                <div class="w-6 h-6 rounded-full border-2 border-green-500
                flex items-center justify-center text-green-600 text-xs">

                    {{ strtoupper(substr($nama, 0, 1)) }}

                </div>

            </nav>

            <!-- LOGIN / LOGOUT -->
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
    <nav class="border-t px-10 py-3 flex justify-center gap-10 text-gray-500 font-medium">

        <a href="/"
           class="hover:text-green-600">

            Beranda

        </a>

        <a href="{{ route('mulaijualan') }}"
           class="text-green-600 border-b-2 border-green-600 pb-1">

            Mulai Jualan

        </a>

        <a href="#"
           class="hover:text-green-600">

            Tentang Kami

        </a>

    </nav>

</header>

<!-- CONTENT -->
<div class="pt-32 px-10 max-w-7xl mx-auto">

    <!-- GREETING -->
    <section class="mb-6 mt-10">

        <h1 class="text-4xl font-bold">

            Selamat datang,
            {{ $nama }}!

        </h1>

    </section>

    <!-- BANNER -->
    <section class="mb-20">

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

                Kelola Toko <br>
                dan Mulai Jualan <br>
                dengan Mudah

            </h1>

            <p class="text-gray-500 mb-8 text-lg leading-8">

                Masuk sebagai admin untuk menambahkan produk,
                mengatur stok, memantau pesanan,
                dan mengelola penjualan toko Anda di FLOMART.

            </p>

            {{-- GUEST --}}
            @guest

                <a href="{{ route('login') }}"
                   class="inline-block bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 font-semibold shadow-md transition">

                    Login

                </a>

            @else

                {{-- PEMBELI --}}
                @if($role === 'pembeli')

                    <a href="{{ route('login') }}"
                       class="inline-block bg-yellow-400 text-black px-6 py-3 rounded-xl hover:bg-yellow-500 font-semibold shadow-md transition">

                        Login sebagai Admin

                    </a>

                    <p class="text-sm text-gray-600 mt-3">

                        Anda sedang login sebagai pembeli.
                        Silakan login dengan akun admin
                        untuk mengakses dashboard admin.

                    </p>

                @endif

            @endguest

        </div>

        <!-- IMAGE -->
        <img
            src="{{ asset('assets/img/FotoJualan.png') }}"
            class="w-[320px]">

    </div>

</div>

</div>
<x-footer />

</body>
</html>