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
            <div class="p-4">

                <div class="bg-gray-100 rounded-xl p-3 flex gap-3">

                    <div class="w-12 h-12 rounded-full
                                bg-green-600 text-white
                                flex items-center justify-center
                                font-bold">

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

            </div>

        </div>

        <!-- CHAT ROOM -->
        <div class="flex-1 flex flex-col">

            <!-- HEADER -->
            <div class="bg-green-700 text-white p-4">

                <h2 class="font-semibold text-lg">

                    Admin FLOMART

                </h2>

                <p class="text-sm text-green-100">

                    Online

                </p>

            </div>

            <!-- CHAT -->
            <div id="chatBox"
                 class="flex-1 overflow-y-auto
                        p-6 bg-gray-50 space-y-4">

                <!-- HISTORI CHAT -->
                @foreach($messages as $msg)

                    @if($msg->sender == 'user')

                        <div class="flex justify-end">

                            <div>

                                <div class="bg-green-600 text-white
                                            px-4 py-2 rounded-2xl
                                            max-w-xs">

                                    {{ $msg->message }}

                                </div>

                                <p class="text-xs text-right
                                          text-gray-400 mt-1">

                                    {{ $msg->created_at->format('H:i') }}

                                </p>

                            </div>

                        </div>

                    @else

                        <div class="flex justify-start">

                            <div>

                                <div class="bg-white shadow
                                            px-4 py-2 rounded-2xl
                                            max-w-xs">

                                    {{ $msg->message }}

                                </div>

                                <p class="text-xs text-gray-400 mt-1">

                                    {{ $msg->created_at->format('H:i') }}

                                </p>

                            </div>

                        </div>

                    @endif

                @endforeach

                <!-- SAPAAN BARU -->
                <div class="space-y-3 mt-6">

                    <!-- SAPAAN -->
                    <div class="flex justify-start">

                        <div>

                            <div class="bg-white shadow
                                        px-4 py-3 rounded-2xl
                                        max-w-lg">

                                👋 Halo, selamat datang di Chat FLOMART!

                                <br><br>

                                Saya Filo, asisten virtual
                                yang siap membantu kamu 😊

                                <br><br>

                                Kamu ingin bantuan apa hari ini?

                            </div>

                            <p class="text-xs text-gray-400 mt-1">

                                {{ now()->format('H:i') }}

                            </p>

                        </div>

                    </div>

                    <!-- MENU -->
                    <div class="bg-white shadow
                                rounded-2xl p-4 max-w-lg">

                        <div class="space-y-2">

                            <!-- 1 -->
                            <button
                                onclick="sendOption(1)"
                                class="w-full flex justify-between
                                       border-b py-2 hover:bg-gray-100">

                                <span>
                                    🌱 Tanya Produk
                                </span>

                                <span>1</span>

                            </button>

                            <!-- 2 -->
                            <button
                                onclick="sendOption(2)"
                                class="w-full flex justify-between
                                       border-b py-2 hover:bg-gray-100">

                                <span>
                                    📦 Cek Pesanan
                                </span>

                                <span>2</span>

                            </button>

                            <!-- 3 -->
                            <button
                                onclick="sendOption(3)"
                                class="w-full flex justify-between
                                       border-b py-2 hover:bg-gray-100">

                                <span>
                                    🚚 Info Pengiriman
                                </span>

                                <span>3</span>

                            </button>

                            <!-- 4 -->
                            <button
                                onclick="sendOption(4)"
                                class="w-full flex justify-between
                                       py-2 hover:bg-gray-100">

                                <span>
                                    💳 Cara Pembayaran
                                </span>

                                <span>4</span>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- INPUT -->
            <div class="border-t p-4 flex gap-3 bg-white">

                <input
                    type="text"
                    id="messageInput"
                    placeholder="Ketik pesan..."
                    class="flex-1 border rounded-full
                           px-5 py-3">

                <button
                    onclick="sendMessage()"
                    class="bg-green-600 text-white
                           px-6 rounded-full">

                    Kirim

                </button>

            </div>

        </div>

    </div>

</div>

<x-footer />

<script>

function sendOption(number)
{
    sendMessage(number);
}

function sendMessage(customMessage = null)
{
    let input =
    document.getElementById('messageInput');

    let message =
    customMessage !== null
    ? String(customMessage)
    : input.value;

    if(message.trim() == '') return;

    // CHAT USER
    const chatBox =
    document.getElementById('chatBox');

    chatBox.innerHTML += `
        <div class="flex justify-end">

            <div>

                <div class="bg-green-600 text-white
                            px-4 py-2 rounded-2xl
                            max-w-xs">

                    ${message}

                </div>

                <p class="text-xs text-right
                          text-gray-400 mt-1">

                    sekarang

                </p>

            </div>

        </div>
    `;

    fetch("{{ route('chat.send') }}", {

        method: "POST",

        headers: {

            "Content-Type": "application/json",

            "X-CSRF-TOKEN":
            "{{ csrf_token() }}"
        },

        body: JSON.stringify({

            message: message
        })

    })

    .then(res => res.json())

    .then(data => {

        // CHAT BOT
        chatBox.innerHTML += `
            <div class="flex justify-start">

                <div>

                    <div class="bg-white shadow
                                px-4 py-2 rounded-2xl
                                max-w-xs">

                        ${data.reply}

                    </div>

                    <p class="text-xs text-gray-400 mt-1">

                        sekarang

                    </p>

                </div>

            </div>
        `;

        chatBox.scrollTop =
        chatBox.scrollHeight;
    });

    input.value = '';
}

// AUTO SCROLL
window.onload = function(){

    let chatBox =
    document.getElementById('chatBox');

    chatBox.scrollTop =
    chatBox.scrollHeight;
}

</script>

</body>
</html>