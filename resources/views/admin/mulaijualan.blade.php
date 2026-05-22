<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulai Jualan - FLOMART</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

<x-header />

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