<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>{{ $blog->judul }}</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body class="bg-white">

<x-header />

<div class="pt-40 max-w-5xl mx-auto px-6 pb-20">

<a href="{{ route('blog.index') }}"
class="text-green-600 font-semibold">

← Kembali

</a>

<h1 class="text-6xl font-bold mt-7">

    {{ $blog->judul }}

</h1>

<p class="mt-5 text-gray-500 text-xl">

    {{ $blog->penulis }}

    •

    {{ $blog->tanggal }}

</p>

<img
src="{{ asset('assets/img/'.$blog->gambar) }}"
class="w-full rounded-3xl mt-10">

<div class="mt-10 text-2xl leading-relaxed text-gray-700">

    {!! nl2br(e($blog->isi)) !!}

</div>

</div>

<x-footer />

</body>
</html>