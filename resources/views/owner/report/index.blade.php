@extends('admin.layouts.app')

@section('title','Laporan')

@section('content')

<div class="mb-6">

    <h1 class="text-4xl font-bold">
        Laporan FLOMART
    </h1>

    <p class="text-slate-500 mt-2">
        Export laporan transaksi, produk, dan pendapatan FLOMART
    </p>

</div>

{{-- LAPORAN KESELURUHAN --}}
<div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

    <h2 class="text-2xl font-bold mb-3">
        Laporan Keseluruhan
    </h2>

    <p class="text-slate-500 mb-6">
        Berisi ringkasan pesanan, produk, dan pendapatan.
    </p>

    <div class="flex flex-wrap gap-4">

        <a
            href="{{ route('report.pdf.all') }}"
            class="px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl">

            PDF Keseluruhan

        </a>

        <a
            href="{{ route('report.excel.all') }}"
            class="px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl">

            Excel Keseluruhan

        </a>

    </div>

</div>

{{-- LAPORAN PER MODUL --}}
<div class="grid lg:grid-cols-3 gap-6">

    {{-- PESANAN --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-xl font-bold mb-3">
            Laporan Pesanan
        </h2>

        <p class="text-slate-500 mb-5">
            Data seluruh transaksi pelanggan.
        </p>

        <div class="flex gap-3">

            <a
                href="{{ route('report.pdf.pesanan') }}"
                class="px-4 py-2 bg-red-600 text-white rounded-xl">

                PDF

            </a>

            <a
                href="{{ route('report.excel.pesanan') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-xl">

                Excel

            </a>

        </div>

    </div>

    {{-- PRODUK --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-xl font-bold mb-3">
            Laporan Produk
        </h2>

        <p class="text-slate-500 mb-5">
            Data produk dan stok yang tersedia.
        </p>

        <div class="flex gap-3">

            <a
                href="{{ route('report.pdf.produk') }}"
                class="px-4 py-2 bg-red-600 text-white rounded-xl">

                PDF

            </a>

            <a
                href="{{ route('report.excel.produk') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-xl">

                Excel

            </a>

        </div>

    </div>

    {{-- PENDAPATAN --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-xl font-bold mb-3">
            Laporan Pendapatan
        </h2>

        <p class="text-slate-500 mb-5">
            Ringkasan pendapatan penjualan.
        </p>

        <div class="flex gap-3">

            <a
                href="{{ route('report.pdf.pendapatan') }}"
                class="px-4 py-2 bg-red-600 text-white rounded-xl">

                PDF

            </a>

            <a
                href="{{ route('report.excel.pendapatan') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-xl">

                Excel

            </a>

        </div>

    </div>

</div>

@endsection