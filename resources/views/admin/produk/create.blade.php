@extends('admin.layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="mb-6">
    <h1 class="text-4xl font-bold text-slate-800">
        Tambah Produk
    </h1>

    <p class="text-slate-500 mt-2">
        Tambahkan produk baru ke FLOMART
    </p>
</div>

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="bg-white rounded-3xl shadow-sm p-8">

    <form
        action="{{ route('produk.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('admin.produk.form')

        <div class="mt-8 flex gap-3">

            <a href="{{ route('produk.index') }}"
               class="px-6 py-3 bg-gray-500 text-white rounded-xl">

                Kembali

            </a>

            <button
                type="submit"
                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl">

                Simpan Produk

            </button>

        </div>

    </form>

</div>

@endsection