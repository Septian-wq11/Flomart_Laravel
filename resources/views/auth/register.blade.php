<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register FLOMART</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<!-- HEADER -->
<header class="fixed top-0 left-0 w-full flex items-center justify-between px-10 py-4 bg-white/90 backdrop-blur-md shadow z-50">

    <img src="{{ asset('assets/img/LogoFlomart.png') }}"
         alt="Logo Flomart"
         width="150">

    <nav class="space-x-6 text-gray-700 font-medium">
        <a href="#">Chat</a>
        <a href="#">Pesanan</a>
        <a href="#">Notifikasi</a>
        <a href="#">Keranjang</a>
    </nav>

</header>

<!-- MAIN -->
<main class="flex items-center justify-center py-20 pt-28">

    <div class="flex items-center gap-20 max-w-6xl">

        <!-- GAMBAR -->
        <div>

            <img src="{{ asset('assets/img/FotoRegis.png') }}"
                 alt="Foto Registrasi"
                 width="475">

        </div>

        <!-- FORM -->
        <div class="bg-white p-10 rounded-xl shadow-md w-[380px]">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                Registrasi
            </h2>

            {{-- ERROR --}}
            @if($errors->any())

                <div class="text-red-500 mb-3 text-sm">

                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach

                </div>

            @endif

            <form action="{{ route('register.post') }}"
                  method="POST"
                  class="space-y-4">

                @csrf

                <!-- NAMA -->
                <input type="text"
                       name="nama"
                       placeholder="Nama Lengkap"
                       required
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none">

                <!-- EMAIL -->
                <input type="email"
                       name="email"
                       placeholder="Email"
                       required
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none">

                <!-- PASSWORD -->
                <div class="flex items-center border rounded-lg px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-green-500">

                    <input type="password"
                           name="password"
                           id="registerPassword"
                           placeholder="Password"
                           required
                           class="flex-1 outline-none bg-transparent">

                    <img src="{{ asset('assets/img/ketutup3.png') }}"
                         id="registerEye"
                         onclick="togglePassword('registerPassword', 'registerEye')"
                         class="w-5 h-5 cursor-pointer opacity-70 hover:opacity-100">

                </div>

                <!-- ALAMAT -->
                <textarea name="alamat"
                          placeholder="Alamat"
                          required
                          class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none"></textarea>

                <!-- NO HP -->
                <input type="text"
                       name="no_hp"
                       placeholder="No HP"
                       required
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none">

                <!-- BUTTON -->
                <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 rounded-lg">

                    Daftar

                </button>

                <!-- LOGIN -->
                <p class="text-sm text-gray-600">

                    Sudah punya akun?

                    <a href="{{ route('login') }}"
                       class="text-green-600 font-semibold hover:underline">

                        Login

                    </a>

                </p>

            </form>

        </div>

    </div>

</main>

<!-- FOOTER -->
<footer class="bg-green-700 text-white px-16 py-14">

    <div class="grid grid-cols-4 gap-10">

        <div>

            <img src="{{ asset('assets/img/contrasLogoFlomart.png') }}"
                 width="150">

            <p class="text-sm mb-4">
                Marketplace tanaman ramah lingkungan terpercaya
            </p>

        </div>

        <div>

            <h3 class="font-semibold mb-4">Layanan</h3>

            <ul class="space-y-2 text-sm">
                <li>Belanja Tanaman</li>
                <li>Bibit & Media Tanaman</li>
                <li>Filter Kecocokan Tanaman</li>
            </ul>

        </div>

        <div>

            <h3 class="font-semibold mb-4">Bantuan</h3>

            <ul class="space-y-2 text-sm">
                <li>Cara Belanja</li>
                <li>Cara Menjual Tanaman</li>
                <li>Pengiriman & Perawatan</li>
            </ul>

        </div>

        <div>

            <h3 class="font-semibold mb-4">Ikuti Kami</h3>

            <ul class="space-y-2 text-sm">
                <li>Instagram - @flomart.id</li>
                <li>Facebook - FLOMART</li>
            </ul>

        </div>

    </div>

</footer>

<script>
function togglePassword(inputId, eyeId) {

    const input = document.getElementById(inputId);
    const eye = document.getElementById(eyeId);

    if (input.type === "password") {

        input.type = "text";

        eye.src = "{{ asset('assets/img/kebuka.png') }}";

    } else {

        input.type = "password";

        eye.src = "{{ asset('assets/img/ketutup3.png') }}";
    }
}
</script>

</body>
</html>