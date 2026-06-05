@extends('owner.layouts.app')

@section('title','Laporan')

@section('content')

<div class="mb-6">

    <h1 class="text-4xl font-bold">
        Laporan FLOMART
    </h1>

    <p class="text-slate-500 mt-2">
        Ringkasan aktivitas toko
    </p>

</div>

{{-- DOWNLOAD LAPORAN --}}
<div class="bg-white rounded-3xl shadow-sm p-6 mb-6">

    <h2 class="text-2xl font-bold mb-4">
        Download Laporan
    </h2>

    <div class="flex flex-wrap gap-4">

        <a href="{{ route('owner.report.pdf.all') }}"
           class="px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl">

            <i class="fa-solid fa-file-pdf mr-2"></i>
            Download PDF

        </a>

        <a href="{{ route('owner.report.excel.all') }}"
           class="px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl">

            <i class="fa-solid fa-file-excel mr-2"></i>
            Download Excel

        </a>

    </div>

</div>

{{-- CARD STATISTIK --}}
<div class="grid md:grid-cols-3 gap-6 mb-6">

    <div class="bg-white rounded-3xl shadow-sm p-8">

        <p class="text-slate-500">
            Total Produk
        </p>

        <h2 class="text-5xl font-bold mt-2">
            {{ $totalProduk }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-8">

        <p class="text-slate-500">
            Total Pesanan
        </p>

        <h2 class="text-5xl font-bold mt-2">
            {{ $totalPesanan }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-8">

        <p class="text-slate-500">
            Total Pendapatan
        </p>

        <h2 class="text-5xl font-bold mt-2 text-green-600">
            Rp {{ number_format($totalPendapatan,0,',','.') }}
        </h2>

    </div>

</div>

{{-- STATUS PESANAN --}}
<div class="bg-white rounded-3xl shadow-sm p-8">

    <h2 class="text-2xl font-bold mb-6">
        Status Pesanan
    </h2>

    <div class="space-y-4">

        <div class="flex justify-between border-b pb-3">
            <span>Pending</span>
            <span>{{ $pending }}</span>
        </div>

        <div class="flex justify-between border-b pb-3">
            <span>Menunggu</span>
            <span>{{ $menunggu }}</span>
        </div>

        <div class="flex justify-between border-b pb-3">
            <span>Diproses</span>
            <span>{{ $diproses }}</span>
        </div>

        <div class="flex justify-between border-b pb-3">
            <span>Selesai</span>
            <span>{{ $selesai }}</span>
        </div>

        <div class="flex justify-between">
            <span>Dibatalkan</span>
            <span>{{ $dibatalkan }}</span>
        </div>

    </div>

</div>

@endsection