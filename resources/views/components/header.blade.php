<!-- HEADER -->
<header class="fixed top-0 left-0 w-full bg-white shadow z-50">

    <!-- TOP BAR -->
    <div class="flex items-center justify-between px-10 py-4">

        <!-- LOGO -->
        <a href="{{ route('home') }}">

            <img
                src="{{ asset('assets/img/LogoFlomart.png') }}"
                width="160">

        </a>

        <div class="flex items-center gap-8">

            <!-- MENU -->
            <nav class="flex items-center gap-6 text-gray-700 font-medium text-sm">

                {{-- CHAT --}}
@guest
    <a href="{{ route('login') }}"
       onclick="return confirm('Anda harus login terlebih dahulu. Login sekarang?')"
       class="hover:text-green-600">

        Chat

    </a>
@else
    <a href="/chat"
       class="{{ request()->is('chat*') ? 'text-green-600 border-b-2 border-green-600 pb-1' : 'hover:text-green-600' }}">

        Chat

    </a>
@endguest

                {{-- PESANAN --}}
@guest
    <a href="{{ route('login') }}"
       onclick="return confirm('Anda harus login terlebih dahulu. Login sekarang?')"
       class="hover:text-green-600">

        Pesanan

    </a>
@else
    <a href="{{ route('pesanan.saya') }}"
       class="{{ request()->is('pesanan*') ? 'text-green-600 border-b-2 border-green-600 pb-1' : 'hover:text-green-600' }}">

        Pesanan

    </a>
@endguest

                {{-- NOTIFIKASI --}}
@guest
    <a href="{{ route('login') }}"
       onclick="return confirm('Anda harus login terlebih dahulu. Login sekarang?')"
       class="hover:text-green-600">

        Notifikasi

    </a>
@else
    <a href="/notifikasi"
       class="{{ request()->is('notifikasi*') ? 'text-green-600 border-b-2 border-green-600 pb-1' : 'hover:text-green-600' }}">

        Notifikasi

    </a>
@endguest

{{-- KERANJANG --}}
@guest

    <a href="{{ route('login') }}"
       onclick="return confirm('Anda harus login terlebih dahulu. Login sekarang?')"
       class="hover:text-green-600">

        Keranjang (0)

    </a>

@else

    <a href="{{ route('keranjang') }}"
       class="{{ request()->is('keranjang*') ? 'text-green-600 border-b-2 border-green-600 pb-1' : 'hover:text-green-600' }}">

        Keranjang
        ({{ \App\Models\Keranjang::where('id_user', Auth::user()->id_user)->count() }})

    </a>

@endguest

                {{-- AVATAR --}}
                <div class="w-8 h-8 rounded-full border-2 border-green-500
                flex items-center justify-center text-green-600 text-xs">

                    {{ strtoupper(substr(Auth::user()->nama ?? 'G', 0, 1)) }}

                </div>

            </nav>

            {{-- LOGIN / LOGOUT --}}
            @guest

                <a href="{{ route('login') }}"
                   class="bg-green-600 text-white px-5 py-2 rounded-xl hover:bg-green-700 transition">

                    Login

                </a>

            @else

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                    onclick="return confirm('Apakah Anda yakin ingin logout?')"    
                    class="bg-red-500 text-white px-5 py-2 rounded-xl hover:bg-red-600 transition">

                        Logout

                    </button>

                </form>

            @endguest

        </div>

    </div>

    <!-- NAVBAR -->
    <div class="px-10 border-t border-gray-200">

        <nav class="flex justify-center gap-12 py-4 font-medium text-gray-700">

            <!-- BERANDA -->
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'text-green-600 border-b-2 border-green-600 pb-1' : 'hover:text-green-600' }}">

                Beranda

            </a>

            <!-- MULAI JUALAN -->
            <a href="{{ route('mulaijualan') }}"
               class="{{ request()->routeIs('mulaijualan') ? 'text-green-600 border-b-2 border-green-600 pb-1' : 'hover:text-green-600' }}">

                Mulai Jualan

            </a>

            <!-- TENTANG -->
            <a href="{{ route('tentangkami') }}"
               class="{{ request()->routeIs('tentangkami') ? 'text-green-600 border-b-2 border-green-600 pb-1' : 'hover:text-green-600' }}">

                Tentang Kami

            </a>

        </nav>

    </div>

</header>