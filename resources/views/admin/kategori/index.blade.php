@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="space-y-6">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Kelola Kategori
            </h1>

            <p class="text-slate-500">
                Daftar kategori produk FLOMART
            </p>

        </div>

        <a
            href="{{ route('kategori.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">

            + Tambah Kategori

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="p-4 text-left">
                            ID
                        </th>

                        <th class="p-4 text-left">
                            Nama Kategori
                        </th>

                        <th class="p-4 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($kategori as $item)

                    <tr class="border-t hover:bg-slate-50">

                        <td class="p-4">
                            {{ $item->id_kategori }}
                        </td>

                        <td class="p-4 font-medium">
                            {{ $item->nama_kategori }}
                        </td>

                        <td class="p-4">

                            <div class="flex justify-center gap-2">

                                <a
                                    href="{{ route('kategori.edit', $item->id_kategori) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('kategori.destroy', $item->id_kategori) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus kategori ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3"
                            class="text-center p-8 text-slate-500">

                            Belum ada kategori

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection