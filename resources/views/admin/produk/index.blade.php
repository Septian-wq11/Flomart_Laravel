@extends('admin.layouts.app')

@section('title','Produk')

@section('content')

<div class="space-y-6">

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex items-center justify-between">

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
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-medium shadow">

            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Produk

        </a>
        @endif

    </div>

    {{-- Card Tabel --}}
    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <div class="p-5 border-b">
            <h2 class="font-bold text-lg">
                Daftar Produk
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Gambar</th>
                        <th class="px-6 py-4 text-left">Produk</th>
                        <th class="px-6 py-4 text-left">Kategori</th>
                        <th class="px-6 py-4 text-left">Harga</th>
                        <th class="px-6 py-4 text-left">Stok</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($produk as $item)

                    <tr class="border-t hover:bg-slate-50 transition">

                        <td class="px-6 py-4">
                            {{ $item->id_produk }}
                        </td>

                        <td class="px-6 py-4">

                            @if($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                class="w-20 h-20 rounded-lg object-cover border shadow-sm">

                            @else

                            <div class="w-20 h-20 bg-slate-200 rounded-lg"></div>

                            @endif

                        </td>

                        <td class="px-6 py-4 font-semibold">
                            {{ $item->nama_produk }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->kategori->nama_kategori ?? '-' }}
                        </td>

                        <td class="px-6 py-4 font-medium text-green-600">
                            Rp {{ number_format($item->harga,0,',','.') }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->stok }}
                        </td>

                        <td class="px-6 py-4">

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
                                        type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                        Hapus

                                    </button>

                                </form>

                            </div>

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

</div>

@endsection