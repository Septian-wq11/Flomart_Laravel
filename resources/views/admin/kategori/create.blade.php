@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <h2 class="text-xl font-bold mb-6">
            Tambah Kategori
        </h2>

        <form
            action="{{ route('kategori.store') }}"
            method="POST">

            @csrf

            @include('admin.kategori.form')

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Simpan

                </button>

                <a
                    href="{{ route('kategori.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection