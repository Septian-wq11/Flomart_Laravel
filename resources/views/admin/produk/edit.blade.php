@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')

<div class="mb-6">
    <h1 class="text-4xl font-bold text-slate-800">
        Edit Produk
    </h1>

    <p class="text-slate-500 mt-2">
        Perbarui data produk FLOMART
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
        action="{{ route('produk.update', $produk->id_produk) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.produk.form')

        <div class="mt-8 flex gap-3">

            <a href="{{ route('produk.index') }}"
               class="px-6 py-3 bg-gray-500 text-white rounded-xl">

                Kembali

            </a>

            <button
                type="submit"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl">

                Update Produk

            </button>

        </div>

    </form>

</div>

@endsection