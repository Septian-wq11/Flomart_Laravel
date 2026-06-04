@extends('admin.layouts.app')

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
            Kelola Produk
        </h1>

        <p class="text-slate-500 mt-1">
            Manajemen seluruh produk FLOMART
        </p>
    </div>
@if(Auth::user()->role == 'admin')
    <a href="{{ route('produk.create') }}"
       class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl shadow">

        <i class="fa-solid fa-plus mr-2"></i>
        Tambah Produk

    </a>

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
                    <th class="px-4 py-4 text-center">Aksi</th>

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

                    <td class="px-4 py-4">

                        @if(Auth::user()->role == 'admin')

<div class="flex justify-center gap-2">

    <a href="{{ route('produk.edit',$item->id_produk) }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

        Edit

    </a>

    <form
        action="{{ route('produk.destroy',$item->id_produk) }}"
        method="POST"
        onsubmit="return confirm('Hapus produk ini?')">

        @csrf
        @method('DELETE')

        <button
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

            Hapus

        </button>

    </form>

</div>

@else

<span class="text-slate-500">
    Read Only
</span>

@endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
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