<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLOMART - Tentang Kami</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans scroll-smooth">

<x-header />

<!-- CONTENT -->
<div class="pt-32 px-10 max-w-7xl mx-auto">

    <!-- JUDUL -->
    <section class="mb-6 mt-10">

        <h1 class="text-4xl font-bold">

            Tentang Kami

        </h1>

        <p class="text-gray-500 mt-2">

            Mengenal lebih dekat FLOMART dan komitmen kami
            dalam menghadirkan pengalaman belanja tanaman
            yang mudah, aman, dan ramah lingkungan.

        </p>

    </section>

    <!-- BANNER -->
    <section class="mb-12">

        <div class="relative rounded-2xl overflow-hidden">

            <!-- BACKGROUND -->
            <img
                src="{{ asset('assets/img/BannerBg.png') }}"
                class="absolute inset-0 w-full h-full object-cover -z-10">

            <!-- CONTENT -->
            <div class="px-10 py-12 flex items-center justify-between">

                <div class="max-w-2xl">

                    <h2 class="text-4xl font-bold mb-6">

                        Tumbuh Hijau <br>
                        Bersama FLOMART

                    </h2>

                    <p class="text-gray-500 mb-6">

                        FLOMART adalah marketplace tanaman
                        ramah lingkungan yang menghubungkan
                        pembeli dengan penjual terpercaya
                        dalam satu platform digital yang nyaman
                        dan mudah digunakan.

                    </p>

                </div>

                <img
                    src="{{ asset('assets/img/FotoRegis.png') }}"
                    class="w-[300px]"
                    alt="Tentang FLOMART">

            </div>

        </div>

    </section>

    <!-- SIAPA KAMI -->
    <section class="mb-12">

        <div class="bg-white rounded-2xl shadow-md p-8">

            <h2 class="text-2xl font-bold mb-4">

                Siapa Kami?

            </h2>

            <p class="text-gray-600 leading-relaxed">

                FLOMART hadir untuk membantu masyarakat
                menemukan berbagai tanaman, benih,
                dan kebutuhan berkebun dari penjual terpercaya.

                Kami juga ingin mendukung UMKM lokal agar
                berkembang lebih luas melalui platform digital
                yang modern, aman, dan mudah diakses oleh semua orang.

            </p>

        </div>

    </section>

    <!-- VISI & MISI -->
    <section class="mb-12 grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- VISI -->
        <div class="bg-white rounded-2xl shadow-md p-8">

            <div class="w-12 h-12 bg-green-100 text-green-600
                        rounded-full flex items-center justify-center
                        text-xl mb-4">

                🌱

            </div>

            <h2 class="text-2xl font-bold mb-4">

                Visi

            </h2>

            <p class="text-gray-600 leading-relaxed">

                “ Menjadi platform e-commerce tanaman
                yang mendukung gaya hidup hijau dan
                pertumbuhan usaha berkelanjutan. ”

            </p>

        </div>

        <!-- MISI -->
        <div class="bg-white rounded-2xl shadow-md p-8">

            <div class="w-12 h-12 bg-yellow-100 text-yellow-500
                        rounded-full flex items-center justify-center
                        text-xl mb-4">

                🚀

            </div>

            <h2 class="text-2xl font-bold mb-4">

                Misi

            </h2>

            <ul class="text-gray-600 space-y-3 leading-relaxed list-disc pl-5">

                <li>Menyediakan produk tanaman berkualitas.</li>
                <li>Mendukung pertumbuhan UMKM lokal.</li>
                <li>Memberikan pengalaman belanja aman.</li>
                <li>Mendorong gaya hidup ramah lingkungan.</li>

            </ul>

        </div>

    </section>

    <!-- NILAI -->
    <section class="mb-12">

        <h2 class="text-2xl font-bold mb-6">

            Nilai yang Kami Bawa

        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">

                <div class="text-3xl mb-3">💚</div>

                <h3 class="text-lg font-semibold mb-2">

                    Ramah Lingkungan

                </h3>

                <p class="text-gray-600 text-sm leading-relaxed">

                    Kami mendukung gaya hidup hijau
                    melalui produk tanaman berkualitas.

                </p>

            </div>

            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">

                <div class="text-3xl mb-3">🤝</div>

                <h3 class="text-lg font-semibold mb-2">

                    Terpercaya

                </h3>

                <p class="text-gray-600 text-sm leading-relaxed">

                    Kami membangun hubungan aman
                    dan nyaman antara pembeli dan penjual.

                </p>

            </div>

            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">

                <div class="text-3xl mb-3">🌼</div>

                <h3 class="text-lg font-semibold mb-2">

                    Bertumbuh Bersama

                </h3>

                <p class="text-gray-600 text-sm leading-relaxed">

                    FLOMART tumbuh bersama komunitas
                    pecinta tanaman dan UMKM lokal.

                </p>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="mb-20">

        <div class="bg-green-700 text-white rounded-2xl shadow-md px-12 py-12 text-center">

            <h2 class="text-4xl font-bold mb-3">

                Mari Tumbuh Lebih Hijau Bersama FLOMART

            </h2>

            <p class="text-lg text-green-100 leading-relaxed max-w-4xl mx-auto">

                Temukan produk tanaman terbaik,
                dukung penjual lokal,
                dan mulai perjalanan hijau Anda bersama kami.

            </p>

        </div>

    </section>

</div>

<x-footer />

</body>
</html>