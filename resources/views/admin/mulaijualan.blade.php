{{-- resources/views/admin/mulaijualan.blade.php --}}

@extends('layouts.app')

@section('title', 'Mulai Jualan')

@section('content')

<div class="bg-gray-100 font-sans min-h-screen">

    <!-- HEADER -->
    <header class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow z-50">

        <div class="flex items-center justify-between px-10 py-4">

            <!-- LOGO -->
            <img src="{{ asset('assets/img/LogoFlomart.png') }}" width="150">

            <div class="flex items-center gap-8">

                <!-- MENU -->
                <nav class="flex items-center gap-6 text-gray-700 font-medium text-sm">

                    <a href="#" class="hover:text-green-600">
                        Chat
                    </a>

                    <a href="#" class="hover:text-green-600">
                        Pesanan
                    </a>

                    <a href="#" class="hover:text-green-600">
                        Notifikasi
                    </a>

                    <!-- ICON PROFILE -->
                    <div class="w-6 h-6 rounded-full border-2 border-green-500 flex items-center justify-center text-green-600 text-xs">
                        {{ strtoupper(substr($nama, 0, 1)) }}
                    </div>

                </nav>

                <!-- LOGIN / LOGOUT -->
                @if($isLogin)

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                            Logout
                        </button>
                    </form>

                @else

                    <a href="{{ route('login') }}"
                       class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Login
                    </a>

                @endif

            </div>

        </div>

        <!-- NAVBAR -->
        <nav class="border-t px-10 py-3 flex justify-center gap-10 text-gray-500 font-medium">

            <a href="/dashboard" class="hover:text-green-600">
                Beranda
            </a>

            <a href="/mulaijualan"
               class="text-green-600 border-b-2 border-green-600 pb-1">
                Mulai Jualan
            </a>

            <a href="/tentang-kami" class="hover:text-green-600">
                Tentang Kami
            </a>

        </nav>

    </header>

    <!-- CONTENT -->
    <div class="pt-32 px-10 max-w-7xl mx-auto">

        <!-- WELCOME -->
        <section class="mb-6 mt-10">

            <h1 class="text-4xl font-bold">
                Selamat datang, {{ $nama }}!
            </h1>

        </section>

        <!-- BANNER -->
        <section class="mb-20">

            <div class="relative rounded-2xl px-10 py-12 flex items-center justify-between bg-cover bg-center overflow-hidden"
                 style="background-image: url({{ asset('assets/img/BannerBg.png') }});">
                <!-- TEXT -->
                <div class="max-w-xl">

                    <h1 class="text-4xl font-bold mb-6">
                        Kelola Toko <br>
                        dan Mulai Jualan <br>
                        dengan Mudah
                    </h1>

                    <p class="text-gray-500 mb-8 text-lg">
                        Masuk sebagai admin untuk menambahkan produk,
                        mengatur stok, memantau pesanan,
                        dan mengelola penjualan toko Anda di FLOMART.
                    </p>

                    <!-- BUTTON -->
                    @if(!$isLogin)

                        <a href="{{ $loginUrl }}"
                           class="inline-block bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 font-semibold shadow-md transition">
                            Login
                        </a>

                    @elseif($role === 'pembeli')

                        <a href="{{ $loginUrl }}"
                           class="inline-block bg-yellow-400 text-black px-6 py-3 rounded-xl hover:bg-yellow-500 font-semibold shadow-md transition">
                            Login sebagai Admin
                        </a>

                        <p class="text-sm text-gray-600 mt-3">
                            Anda sedang login sebagai pembeli.
                            Silakan login dengan akun admin
                            untuk mengakses dashboard admin.
                        </p>

                    @endif

                </div>

                <!-- IMAGE -->
                <div class="relative">

                    <img src="{{ asset('assets/img/FotoJualan.png') }}"
                         width="300">

                </div>

            </div>

        </section>

    </div>

    <!-- FOOTER -->
    <footer class="w-full bg-green-700 text-white py-14 mt-10">

        <div class="max-w-7xl mx-auto px-10">

            <div class="grid grid-cols-4 gap-10">

                <!-- BRAND -->
                <div>

                    <img src="{{ asset('assets/img/contrasLogoFlomart.png') }}"
                         width="150">

                    <p class="text-sm mb-4">
                        Marketplace tanaman ramah lingkungan terpercaya
                    </p>

                    <div class="flex">

                        <input type="email"
                               placeholder="Write Email"
                               class="px-3 py-2 rounded-l-lg text-black w-full bg-white">

                        <button class="bg-yellow-400 px-4 rounded-r-lg">
                            ➤
                        </button>

                    </div>

                    <p class="text-xs mt-6">
                        Copyright <br>
                        © 2025 FLOMART. All rights reserved. <br>
                        Grow green, live better.
                    </p>

                </div>

                <!-- LAYANAN -->
                <div>

                    <h3 class="font-semibold mb-4">
                        Layanan
                    </h3>

                    <ul class="space-y-2 text-sm">

                        <li>
                            <a href="#" class="hover:underline">
                                Belanja Tanaman
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:underline">
                                Bibit & Media Tanaman
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:underline">
                                Filter Kecocokan Tanaman
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:underline">
                                Start Sell (jual tanaman)
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- BANTUAN -->
                <div>

                    <h3 class="font-semibold mb-4">
                        Bantuan
                    </h3>

                    <ul class="space-y-2 text-sm">

                        <li>
                            <a href="#" class="hover:underline">
                                Cara Belanja
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:underline">
                                Cara Menjual Tanaman
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:underline">
                                Pengiriman & Perawatan
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:underline">
                                Kebijakan Pengembalian
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- SOSIAL -->
                <div>

                    <h3 class="font-semibold mb-4">
                        Ikuti Kami
                    </h3>

                    <ul class="space-y-2 text-sm">

                        <li>
                            Instagram - @flomart.id
                        </li>

                        <li>
                            Facebook - FLOMART
                        </li>

                        <li>
                            Twitter/X - @flomart_id
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </footer>

</div>

@endsection