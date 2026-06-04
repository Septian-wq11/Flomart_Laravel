@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Selamat Datang, {{ Auth::user()->nama }} 👋
    </h1>

    <p class="text-slate-500 mt-2">
        Berikut ringkasan informasi toko hari ini.
    </p>

</div>

<!-- Statistik -->
<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-white rounded-3xl p-6 shadow-sm border">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">
                    Total Produk
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $totalProduk }}
                </h2>

            </div>

            <div class="text-green-500 text-3xl">
                <i class="fa-solid fa-box"></i>
            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">
                    Total Pesanan
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $totalPesanan }}
                </h2>

            </div>

            <div class="text-blue-500 text-3xl">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">
                    Pesanan Baru
                </p>

                <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                    {{ $pesananBaru }}
                </h2>

            </div>

            <div class="text-yellow-500 text-3xl">
                <i class="fa-solid fa-bell"></i>
            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border">

    <div class="flex justify-between">

        <div>

            <p class="text-slate-500">
                Total Pendapatan
            </p>

            <h2 class="text-2xl font-bold text-green-600 mt-2">
                Rp {{ number_format($totalPendapatan,0,',','.') }}
            </h2>

        </div>

        <div class="text-green-500 text-3xl">
            <i class="fa-solid fa-money-bill-wave"></i>
        </div>

    </div>

</div>

</div>

<!-- Quick Menu -->
<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mt-8">

    <!-- Tambah Produk -->
<a href="{{ route('produk.create') }}"
   class="bg-green-50 border border-green-200 p-5 rounded-2xl">
    <h3 class="font-bold text-green-700">
        Tambah Produk
    </h3>

    <p class="text-sm text-green-600 mt-2">
        Tambah produk baru
    </p>
</a>

    <!-- Kelola Kategori -->
<a href="{{ route('kategori.index') }}"
   class="bg-blue-50 border border-blue-200 p-5 rounded-2xl">
    <h3 class="font-bold text-blue-700">
        Kelola Kategori
    </h3>

    <p class="text-sm text-blue-600 mt-2">
        Atur kategori produk
    </p>
</a>

    <a href="{{ route('pesanan.index') }}"
   class="bg-purple-50 border border-purple-200 p-5 rounded-2xl">

    <h3 class="font-bold text-purple-700">
        Kelola Pesanan
    </h3>

    <p class="text-sm text-purple-600 mt-2">
        Lihat semua pesanan
    </p>

</a>

    <a href="{{ route('report.index') }}"
       class="bg-orange-50 border border-orange-200 p-5 rounded-2xl">

        <h3 class="font-bold text-orange-700">
            Laporan
        </h3>

        <p class="text-sm text-orange-600 mt-2">
            Lihat laporan penjualan
        </p>

    </a>

</div>

<div class="grid lg:grid-cols-2 gap-6 mt-8">

    <div class="bg-white p-6 rounded-3xl shadow-sm">
    <h3 class="font-bold mb-4">
        Pendapatan per Bulan
    </h3>

    <div class="h-72">
        <canvas id="chartPenjualan"></canvas>
    </div>
</div>

    <div class="bg-white p-6 rounded-3xl shadow-sm">

    <h3 class="font-bold mb-4">
        Status Pesanan
    </h3>

    <div class="h-72 flex justify-center">
        <canvas id="chartStatus"></canvas>
    </div>

</div>

</div>

<div class="grid lg:grid-cols-2 gap-6 mt-6">

    <div class="bg-white p-6 rounded-3xl shadow-sm">
        <h3 class="font-bold mb-4">
            Produk Terlaris
        </h3>

        <canvas id="chartProduk"></canvas>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm">

    <h3 class="font-bold mb-4">
        Metode Pembayaran
    </h3>

    <div class="h-72">
        <canvas id="chartPembayaran"></canvas>
    </div>

</div>

</div>

<!-- Produk -->
<div class="bg-white rounded-2xl shadow-sm mt-8 overflow-hidden">

    <div class="p-5 border-b">

        <h2 class="font-bold text-lg">
            Daftar Produk Terbaru
        </h2>

    </div>

    <div class="max-h-[500px] overflow-auto">

        <table class="w-full table-fixed">

            <thead class="bg-slate-50 sticky top-0 z-10">

                <tr>
                    <th class="w-20 px-6 py-4 text-left">
                        ID
                    </th>

                    <th class="px-6 py-4 text-left">
                        Produk
                    </th>

                    <th class="px-6 py-4 text-left">
                        Kategori
                    </th>

                    <th class="w-48 px-6 py-4 text-left">
                        Harga
                    </th>

                    <th class="w-24 px-6 py-4 text-left">
                        Stok
                    </th>
                </tr>

            </thead>

            <tbody>

                @foreach($produk as $item)

                <tr class="border-t hover:bg-slate-50">

                    <td class="p-4">
                        {{ $item->id_produk }}
                    </td>

                    <td class="p-4 font-medium">
                        {{ $item->nama_produk }}
                    </td>

                    <td class="p-4">
                        {{ $item->kategori->nama_kategori }}
                    </td>

                    <td class="p-4">
                        Rp {{ number_format($item->harga) }}
                    </td>

                    <td class="p-4">
                        {{ $item->stok }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<script>

const namaBulan = @json($namaBulan);
const dataPendapatan = @json($dataPendapatan);
const statusPesanan = @json($statusPesanan);
const produkTerlaris = @json($produkTerlaris);
const metodePembayaran = @json($metodePembayaran);

new Chart(
    document.getElementById('chartPenjualan'),
    {
        type: 'line',
        data: {
            labels: namaBulan,
            datasets: [{
                label: 'Pendapatan',
                data: dataPendapatan
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

new Chart(
    document.getElementById('chartStatus'),
    {
        type: 'doughnut',
        data: {
            labels: statusPesanan.map(item => item.status_pesanan),
            datasets: [{
                data: statusPesanan.map(item => item.total)
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

new Chart(
    document.getElementById('chartProduk'),
    {
        type: 'bar',
        data: {
            labels: produkTerlaris.map(item => item.nama_produk),
            datasets: [{
                label: 'Terjual',
                data: produkTerlaris.map(item => item.total_terjual)
            }]
        },
        options: {
            indexAxis: 'y'
        }
    }
);

new Chart(
    document.getElementById('chartPembayaran'),
    {
        type: 'doughnut',
        data: {
            labels: metodePembayaran.map(item => item.metode_pembayaran),
            datasets: [{
                data: metodePembayaran.map(item => item.total)
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

</script>

@endsection