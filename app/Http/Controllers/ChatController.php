<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // HALAMAN AWAL CHAT
    public function index()
    {
        return view('user.chat');
    }

    // ROOM CHAT
    public function room()
    {
        $messages = ChatMessage::where(
            'id_user',
            Auth::user()->id_user
        )
        ->orderBy('created_at')
        ->get();

        return view(
            'user.chat_room',
            compact('messages')
        );
    }

    // KIRIM CHAT
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        // SIMPAN CHAT USER
        ChatMessage::create([

            'id_user' => Auth::user()->id_user,

            'sender' => 'user',

            'message' => $request->message

        ]);

        // BALASAN BOT
        $reply = '';

        switch(trim($request->message)){

            case '1':

                $reply =
                '🌱 Untuk informasi produk silakan lihat katalog FLOMART atau tanyakan nama produknya.';

            break;

            case '2':

                $reply =
                '📦 Pesananmu dapat dilihat pada menu Pesanan Saya.';

            break;

            case '3':

                $reply =
                '🚚 Pesanan akan dikirim setelah pembayaran diverifikasi admin.';

            break;

            case '4':

                $reply =
                '💳 Metode pembayaran tersedia: COD dan Transfer Bank';

            break;

            default:

                $reply =
                '🤖 Maaf, saya tidak memahami pesan Anda. Silakan pilih angka 1 sampai 4.';
        }

        // SIMPAN BALASAN BOT
        ChatMessage::create([

            'id_user' => Auth::user()->id_user,

            'sender' => 'bot',

            'message' => $reply

        ]);

        return response()->json([
            'reply' => $reply
        ]);
    }
}