<div>

    <label class="block mb-2 font-semibold">
        Nama Kategori
    </label>

    <input
        type="text"
        name="nama_kategori"
        value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}"
        class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

    @error('nama_kategori')
        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>
    @enderror

</div>