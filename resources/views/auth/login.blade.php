<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login FLOMART</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<!-- HEADER -->
<header class="fixed top-0 left-0 w-full flex items-center justify-between px-10 py-4 bg-white/90 backdrop-blur-md shadow z-50">

    <img src="{{ asset('assets/img/LogoFlomart.png') }}"
         alt="Logo Flomart"
         width="150">

    <nav class="space-x-6 text-gray-700 font-medium">
        <a href="#" class="hover:text-green-600">Chat</a>
        <a href="#" class="hover:text-green-600">Pesanan</a>
        <a href="#" class="hover:text-green-600">Notifikasi</a>
        <a href="#" class="hover:text-green-600">Keranjang</a>
    </nav>

</header>

<!-- MAIN -->
<main class="flex items-center justify-center py-20 pt-28">

    <div class="flex items-center gap-20 max-w-6xl">

        <!-- GAMBAR -->
        <div>
            <img src="{{ asset('assets/img/FotoLogin.png') }}"
                 alt="Foto Login"
                 width="475">
        </div>

        <!-- FORM -->
        <div class="bg-white p-10 rounded-xl shadow-md w-[380px]">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                Log In
            </h2>

            {{-- SUCCESS --}}
            @if(session('success'))
                <p class="text-green-500 mb-3">
                    {{ session('success') }}
                </p>
            @endif

            {{-- ERROR --}}
            @if(session('error'))
                <p class="text-red-500 mb-3">
                    Email atau password salah!
                </p>
            @endif

            <form action="{{ route('login.post') }}"
                  method="POST"
                  class="space-y-4">

                @csrf

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
                           id="loginPassword"
                           placeholder="Password"
                           required
                           class="flex-1 outline-none bg-transparent">

                    <img src="{{ asset('assets/img/ketutup3.png') }}"
                         id="loginEye"
                         onclick="togglePassword('loginPassword', 'loginEye')"
                         class="w-5 h-5 cursor-pointer opacity-70 hover:opacity-100">

                </div>

                <!-- REMEMBER -->
                <label class="flex items-center gap-2 text-sm text-gray-600">

                    <input type="checkbox" name="remember">

                    Remember Me

                </label>

                <!-- BUTTON -->
                <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 rounded-lg">

                    Login

                </button>

                <!-- REGISTER -->
                <p class="text-sm text-gray-600">

                    Belum punya akun?

                    <a href="{{ route('register') }}"
                       class="text-green-600 font-semibold hover:underline">

                        Daftar

                    </a>

                </p>

            </form>

        </div>
    </div>
</main>

<!-- FOOTER -->
<footer class="bg-green-700 text-white px-16 py-14">

    <div class="grid grid-cols-4 gap-10">

        <!-- BRAND -->
        <div>

            <img src="{{ asset('assets/img/contrasLogoFlomart.png') }}"
                 width="150">

            <p class="text-sm mb-4">
                Marketplace tanaman ramah lingkungan terpercaya
            </p>

            <div class="flex">

                <input type="email"
                       placeholder="Write Email"
                       class="px-3 py-2 rounded-l-lg text-black w-full bg-white">

                <button class="bg-yellow-400 px-4 rounded-r-lg">
                    ➤
                </button>

            </div>

            <p class="text-xs mt-6">
                Copyright <br>
                © 2025 FLOMART. All rights reserved. <br>
                Grow green, live better.
            </p>

        </div>

        <!-- LAYANAN -->
        <div>

            <h3 class="font-semibold mb-4">Layanan</h3>

            <ul class="space-y-2 text-sm">
                <li>Belanja Tanaman</li>
                <li>Bibit & Media Tanaman</li>
                <li>Filter Kecocokan Tanaman</li>
                <li>Start Sell</li>
            </ul>

        </div>

        <!-- BANTUAN -->
        <div>

            <h3 class="font-semibold mb-4">Bantuan</h3>

            <ul class="space-y-2 text-sm">
                <li>Cara Belanja</li>
                <li>Cara Menjual Tanaman</li>
                <li>Pengiriman & Perawatan</li>
                <li>Kebijakan Pengembalian</li>
            </ul>

        </div>

        <!-- SOSMED -->
        <div>

            <h3 class="font-semibold mb-4">Ikuti Kami</h3>

            <ul class="space-y-2 text-sm">
                <li>Instagram - @flomart.id</li>
                <li>Facebook - FLOMART</li>
                <li>Twitter/X - @flomart_id</li>
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