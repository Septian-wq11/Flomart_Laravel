@extends('owner.layouts.app')

@section('title','Produk')

@section('content')

@if(session('success'))
<div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
    {{ session('success') }}
</div>
@endif

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Lihat Produk
        </h1>

        <p class="text-slate-500 mt-1">
            Lihat seluruh produk FLOMART
        </p>
    </div>

</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <div class="p-5 border-b">

        <h2 class="font-bold text-lg">
            Daftar Produk
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-4 py-4 text-left">ID</th>
                    <th class="px-4 py-4 text-left">Gambar</th>
                    <th class="px-4 py-4 text-left">Produk</th>
                    <th class="px-4 py-4 text-left">Kategori</th>
                    <th class="px-4 py-4 text-left">Harga</th>
                    <th class="px-4 py-4 text-left">Stok</th>

                </tr>

            </thead>

            <tbody>

                @forelse($produk as $item)

                <tr class="border-t hover:bg-slate-50">

                    <td class="px-4 py-4">
                        {{ $item->id_produk }}
                    </td>

                    <td class="px-4 py-4">

                        @if($item->gambar)

                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            class="w-16 h-16 rounded-lg object-cover border">

                        @else

                        <div class="w-16 h-16 bg-slate-200 rounded-lg"></div>

                        @endif

                    </td>

                    <td class="px-4 py-4 font-medium">
                        {{ $item->nama_produk }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $item->kategori->nama_kategori }}
                    </td>

                    <td class="px-4 py-4">
                        Rp {{ number_format($item->harga,0,',','.') }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $item->stok }}
                    </td>
                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-10 text-slate-500">

                        Belum ada produk

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection