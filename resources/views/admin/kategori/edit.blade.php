@extends('admin.layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <h2 class="text-xl font-bold mb-6">
            Edit Kategori
        </h2>

        <form
            action="{{ route('kategori.update', $kategori->id_kategori) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.kategori.form')

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Update

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