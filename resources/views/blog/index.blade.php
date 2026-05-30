<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Blog FLOMART</title>

@vite([
    'resources/css/app.css',
    'resources/js/app.js'
])
</head>

<body class="bg-[#f5f5f5]">

<x-header />

<div class="pt-40 px-4 md:px-10 pb-20">

<!-- TERBARU & POPULER -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-10">

    <!-- TERBARU -->
    <div>
        <h2 class="text-4xl md:text-5xl font-bold mb-7">Terbaru</h2>

        @php
            $terbaru = $blog->first();
        @endphp

        @if($terbaru)
        <a href="{{ route('blog.detail', $terbaru->id_blog) }}"
           class="bg-white rounded-3xl shadow overflow-hidden block">
            <img src="{{ asset('assets/img/'.$terbaru->gambar) }}"
                 class="w-full h-96 object-cover">

            <div class="p-6">
                <h2 class="text-3xl md:text-4xl font-bold">{{ $terbaru->judul }}</h2>
                <p class="mt-3 text-gray-500">
                    {{ $terbaru->tanggal }}
                    <span class="mx-2">|</span>
                    <span class="text-green-600">{{ $terbaru->penulis }}</span>
                </p>
            </div>
        </a>
        @endif
    </div>

    <!-- POPULER -->
    <div>
        <h2 class="text-4xl md:text-5xl font-bold mb-7">Artikel Populer</h2>
        <div class="space-y-5">
            @foreach($artikelPopuler as $item)
            <a href="{{ route('blog.detail',$item->id_blog) }}"
               class="bg-white rounded-3xl shadow p-4 flex gap-4">
                <img src="{{ asset('assets/img/'.$item->gambar) }}"
                     class="w-48 h-32 object-cover rounded-2xl">

                <div>
                    <h3 class="text-xl md:text-2xl font-bold">{{ $item->judul }}</h3>
                    <p class="mt-2 text-gray-500">{{ $item->tanggal }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

<!-- SEARCH -->
<div class="mt-16 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <h2 class="text-4xl md:text-5xl font-bold">Cari Berdasarkan Kategori</h2>

    <form method="GET" action="{{ route('blog.index') }}" class="flex gap-2 md:gap-0 w-full md:w-auto">
        <input type="text" name="search" placeholder="Ketik Pencarian"
               class="border-2 border-green-600 rounded-l-full px-6 py-3 w-full md:w-96">
        <button class="bg-green-600 px-6 rounded-r-full text-white">🔍</button>
    </form>
</div>

<!-- FILTER -->
<div id="kategori-section" class="flex flex-wrap gap-3 mt-7">
    @php
        $kategoriSelected = request('kategori') ?? 'All';
    @endphp

    @foreach(['All','UMKM','Perawatan'] as $kategori)
        <a href="{{ route('blog.index', ['kategori'=>$kategori]) }}#kategori-section"
           class="px-5 py-2 rounded-full font-medium transition
                  {{ $kategoriSelected == $kategori ? 'bg-green-600 text-white' : 'bg-gray-200 text-black hover:bg-green-100' }}">
            {{ $kategori }}
        </a>
    @endforeach
</div>

<!-- CARD BLOG -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
    @foreach($blog as $item)
    <a href="{{ route('blog.detail',$item->id_blog) }}"
       class="bg-white rounded-3xl shadow overflow-hidden flex flex-col">
        <img src="{{ asset('assets/img/'.$item->gambar) }}"
             class="w-full h-56 object-cover">

        <div class="p-5 flex-1 flex flex-col justify-between">
            <div>
                <h3 class="text-xl md:text-2xl font-bold">{{ $item->judul }}</h3>
                <p class="mt-2 text-gray-500">
                    {{ $item->tanggal }} <span class="mx-2">|</span>
                    <span class="text-green-600">{{ $item->penulis }}</span>
                </p>
            </div>
        </div>
    </a>
    @endforeach
</div>

<!-- PAGINATION -->
<div class="mt-14">
    {{ $blog->appends(request()->query())->links() }}
</div>

</div>

<x-footer />

</body>
</html>