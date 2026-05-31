<div class="grid md:grid-cols-2 gap-6">

    {{-- Nama Produk --}}
    <div>
        <label class="block mb-2 font-semibold">
            Nama Produk
        </label>

        <input
            type="text"
            name="nama_produk"
            value="{{ old('nama_produk', $produk->nama_produk ?? '') }}"
            class="w-full border rounded-xl px-4 py-3"
            required>
    </div>

    {{-- Kategori --}}
    <div>
        <label class="block mb-2 font-semibold">
            Kategori
        </label>

        <select
            name="id_kategori"
            class="w-full border rounded-xl px-4 py-3"
            required>

            <option value="">
                Pilih Kategori
            </option>

            @foreach($kategori as $item)
                <option
                    value="{{ $item->id_kategori }}"
                    {{ old('id_kategori', $produk->id_kategori ?? '') == $item->id_kategori ? 'selected' : '' }}>

                    {{ $item->nama_kategori }}

                </option>
            @endforeach

        </select>
    </div>

    {{-- Harga --}}
    <div>
        <label class="block mb-2 font-semibold">
            Harga
        </label>

        <input
            type="number"
            name="harga"
            value="{{ old('harga', $produk->harga ?? '') }}"
            class="w-full border rounded-xl px-4 py-3"
            required>
    </div>

    {{-- Stok --}}
    <div>
        <label class="block mb-2 font-semibold">
            Stok
        </label>

        <input
            type="number"
            name="stok"
            value="{{ old('stok', $produk->stok ?? '') }}"
            class="w-full border rounded-xl px-4 py-3"
            required>
    </div>

</div>

{{-- Deskripsi --}}
<div class="mt-6">
    <label class="block mb-2 font-semibold">
        Deskripsi
    </label>

    <textarea
        name="deskripsi"
        rows="5"
        class="w-full border rounded-xl px-4 py-3"
        required>{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
</div>

{{-- Gambar --}}
<div class="mt-6">

    <label class="block mb-2 font-semibold">
        Gambar Produk
    </label>

    {{-- Preview --}}
    <div class="mb-4">

        <img
            id="preview"
            src="{{ isset($produk) && $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://placehold.co/300x300?text=Preview' }}"
            class="w-48 h-48 object-cover rounded-xl border">

    </div>

    <input
        type="file"
        name="gambar"
        id="gambar"
        accept="image/*"
        class="w-full border rounded-xl px-4 py-3">

    @if(isset($produk))
        <p class="text-sm text-gray-500 mt-2">
            Kosongkan jika tidak ingin mengganti gambar.
        </p>
    @endif

</div>

<script>

document.getElementById('gambar')?.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(event){

            document.getElementById('preview').src =
                event.target.result;

        }

        reader.readAsDataURL(file);
    }

});

</script>