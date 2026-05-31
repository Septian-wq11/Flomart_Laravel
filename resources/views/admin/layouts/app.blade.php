<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | FLOMART</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-slate-100 overflow-x-hidden">

<div x-data="{
    sidebar:false,
    desktopSidebar:true
}"
class="min-h-screen flex">

    <!-- Overlay Mobile -->
    <div
        x-show="sidebar"
        x-transition
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        @click="sidebar=false">
    </div>

    <!-- Sidebar -->
    <aside
     x-show="sidebar"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed lg:relative
                z-50
                w-72
                bg-gradient-to-b
                from-slate-900
                via-slate-950
                to-slate-900
                text-white
                min-h-screen">
        <!-- Logo -->
        <div class="p-6 border-b border-slate-700">

            <div>

        <h1
            x-show="desktopSidebar"
            class="text-3xl font-bold">

            FLOMART

        </h1>

        <h1
            x-show="!desktopSidebar"
            class="text-3xl font-bold">

            F

        </h1>

        <p
            x-show="desktopSidebar"
            class="text-slate-400 text-sm">

            Admin Panel

        </p>

    </div>

    <!-- <button
        @click="desktopSidebar=!desktopSidebar"
        class="hidden lg:block">

        <i class="fa-solid fa-bars"></i>

    </button> -->
        </div>

        <!-- Menu -->
        <nav class="p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10">

                <i class="fa-solid fa-house text-lg"></i>

                <span x-show="desktopSidebar">
                    Dashboard
                </span>

            </a>

            <a href="{{ route('kategori.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition
                {{ request()->routeIs('kategori.*') ? 'bg-white/10' : '' }}">

                    <i class="fa-solid fa-layer-group"></i>

                    <span x-show="desktopSidebar">
                        Kategori
                    </span>

            </a>

            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">

                <i class="fa-solid fa-box"></i>
                Produk

            </a>

            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">

                <i class="fa-solid fa-cart-shopping"></i>
                Pesanan

            </a>

        </nav>

        <!-- User -->
        <div class="absolute bottom-0 left-0 right-0 p-5 border-t border-slate-700">

            <div class="flex items-center gap-3">

                <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center font-bold">
                    A
                </div>

                <div>

                    <h3 x-show="desktopSidebar"class="font-semibold">
                        {{ Auth::user()->nama }}
                    </h3>

                    <p x-show="desktopSidebar" class="text-sm text-slate-400">
                        Administrator
                    </p>

                </div>

            </div>

            <form
                action="{{ route('logout') }}"
                method="POST"
                class="mt-4">

                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 py-2 rounded-lg">

                    Logout

                </button>

            </form>

        </div>

    </aside>

    <!-- Content -->
    <div class="flex-1 transition-all duration-300">

        <!-- Topbar -->
        <header class="sticky top-0 z-40bg-white/95 backdrop-blur shadow-sm">

            <div class="pl-24 pr-6 py-4 flex justify-between items-center">

                <div class="flex items-center gap-4">

                    <button
                        @click="sidebar = !sidebar"
                        class="fixed top-5 left-5 z-[999]
                            bg-white shadow-lg
                            w-12 h-12 rounded-xl
                            flex items-center justify-center">

                        <i class="fa-solid fa-bars text-xl"></i>

                    </button>

                    <h2 class="font-bold text-2xl">
                        @yield('title')
                    </h2>

                </div>

                <div class="flex items-center gap-3">

                    <div class="text-right hidden sm:block">

                        <p class="font-semibold">
                            {{ Auth::user()->nama }}
                        </p>

                        <p class="text-sm text-slate-500">
                            Admin FLOMART
                        </p>

                    </div>

                    <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">
                        A
                    </div>

                </div>

            </div>

        </header>

        <!-- Main Content -->
        <main class="p-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>