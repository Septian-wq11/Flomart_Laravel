@extends('owner.layouts.app')

@section('title','Kategori')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold">
        Data Kategori
    </h1>

    <p class="text-slate-500 mt-2">
        Daftar kategori produk FLOMART
    </p>

</div>

<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="px-5 py-4 text-left">ID</th>
                    <th class="px-5 py-4 text-left">Nama Kategori</th>
                    <th class="px-5 py-4 text-center">Status</th>
                </tr>

            </thead>

            <tbody>

                @forelse($kategori as $item)

                <tr class="border-t">

                    <td class="px-5 py-4">
                        {{ $item->id_kategori }}
                    </td>

                    <td class="px-5 py-4">
                        {{ $item->nama_kategori }}
                    </td>

                    <td class="px-5 py-4 text-center">

                        <span
                            class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-sm">

                            Read Only

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3"
                        class="text-center py-8">

                        Belum ada kategori

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection