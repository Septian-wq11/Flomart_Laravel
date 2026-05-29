<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Chat FLOMART</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body class="bg-gray-100">

<x-header />

<div class="pt-40 pb-20 px-6 max-w-7xl mx-auto">

<div class="bg-white rounded-2xl shadow overflow-hidden h-[700px] flex">

    <!-- SIDEBAR -->
    <div class="w-80 border-r">

        <div class="p-5">

            <h2 class="font-bold text-2xl">

                Semua Chat

            </h2>

        </div>

        <!-- ROOM -->
        <a href="{{ route('chat.room') }}"
           class="block p-4">

            <div class="bg-gray-100 rounded-xl p-3 flex gap-3 hover:bg-gray-200">

                <div class="w-12 h-12 rounded-full bg-green-600
                            text-white flex items-center
                            justify-center font-bold">

                    F

                </div>

                <div>

                    <p class="font-semibold">

                        Admin FLOMART

                    </p>

                    <p class="text-sm text-green-600">

                        Online

                    </p>

                </div>

            </div>

        </a>

    </div>

    <!-- WELCOME -->
    <div class="flex-1 flex items-center justify-center">

        <div class="text-center">

            <div class="text-7xl mb-5">

                💬

            </div>

            <h2 class="text-3xl font-bold">

                Selamat datang di Chat FLOMART

            </h2>

            <p class="text-green-600 mt-3">

                Yuk, mulai chat 😊

            </p>

        </div>

    </div>

</div>

</div>

<x-footer />

</body>
</html>