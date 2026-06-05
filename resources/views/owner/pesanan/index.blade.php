@extends('owner.layouts.app')

@section('title','Lihat Pesanan')

@section('content')

<div class="mb-6">

    <h1 class="text-4xl font-bold text-slate-800">
        Lihat Pesanan
    </h1>

    <p class="text-slate-500 mt-2">
        Lihat seluruh transaksi pelanggan FLOMART
    </p>

</div>

@if(session('success'))

<div class="mb-4 p-4 rounded-xl bg-green-100 text-green-700">

    {{ session('success') }}

</div>

@endif

{{-- FILTER STATUS --}}
<div class="flex flex-wrap gap-3 mb-6">

    <a href="{{ route('owner.pesanan') }}"
       class="px-4 py-2 rounded-xl border transition
       {{ request('status') == null ? 'bg-green-600 text-white border-green-600' : 'bg-white hover:bg-slate-50' }}">
        Semua
    </a>

    <a href="{{ route('owner.pesanan', ['status' => 'pending']) }}"
       class="px-4 py-2 rounded-xl border transition
       {{ request('status') == 'pending' ? 'bg-red-500 text-white border-red-500' : 'bg-white hover:bg-slate-50' }}">
        Pending
    </a>

    <a href="{{ route('owner.pesanan', ['status' => 'menunggu']) }}"
       class="px-4 py-2 rounded-xl border transition
       {{ request('status') == 'menunggu' ? 'bg-yellow-500 text-white border-yellow-500' : 'bg-white hover:bg-slate-50' }}">
        Menunggu
    </a>

    <a href="{{ route('owner.pesanan', ['status' => 'diproses']) }}"
       class="px-4 py-2 rounded-xl border transition
       {{ request('status') == 'diproses' ? 'bg-blue-500 text-white border-blue-500' : 'bg-white hover:bg-slate-50' }}">
        Diproses
    </a>

    <a href="{{ route('owner.pesanan', ['status' => 'selesai']) }}"
       class="px-4 py-2 rounded-xl border transition
       {{ request('status') == 'selesai' ? 'bg-green-500 text-white border-green-500' : 'bg-white hover:bg-slate-50' }}">
        Selesai
    </a>

    <a href="{{ route('owner.pesanan', ['status' => 'dibatalkan']) }}"
       class="px-4 py-2 rounded-xl border transition
       {{ request('status') == 'dibatalkan' ? 'bg-gray-500 text-white border-gray-500' : 'bg-white hover:bg-slate-50' }}">
        Dibatalkan
    </a>

</div>

<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-5 py-4 text-left">
                        ID
                    </th>

                    <th class="px-5 py-4 text-left">
                        Pembeli
                    </th>

                    <th class="px-5 py-4 text-left">
                        Metode
                    </th>

                    <th class="px-5 py-4 text-left">
                        Total
                    </th>

                    <th class="px-5 py-4 text-left">
                        Status
                    </th>

                    <th class="px-5 py-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($pesanan as $item)

                <tr class="border-t hover:bg-slate-50">

                    <td class="px-5 py-4">
                        #{{ $item->id_pesanan }}
                    </td>

                    <td class="px-5 py-4 font-medium">
                        {{ $item->nama_penerima }}
                    </td>

                    <td class="px-5 py-4">
                        {{ $item->metode_pembayaran }}
                    </td>

                    <td class="px-5 py-4">
                        Rp {{ number_format($item->total_harga,0,',','.') }}
                    </td>

                    <td class="px-5 py-4">

                        @if($item->status_pesanan == 'pending')

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-sm font-medium">
                                Pending
                            </span>

                        @elseif($item->status_pesanan == 'menunggu')

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-600 text-sm font-medium">
                                Menunggu
                            </span>

                        @elseif($item->status_pesanan == 'diproses')

                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-medium">
                                Diproses
                            </span>

                        @elseif($item->status_pesanan == 'selesai')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-sm font-medium">
                                Selesai
                            </span>

                        @elseif($item->status_pesanan == 'dibatalkan')

                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-sm font-medium">
                                Dibatalkan
                            </span>

                        @endif

                    </td>

                    <td class="px-5 py-4 text-center">

                        <a href="{{ route('owner.pesanan.show',$item->id_pesanan) }}"
   class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
    Detail
</a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-10 text-slate-500">

                        Belum ada pesanan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection