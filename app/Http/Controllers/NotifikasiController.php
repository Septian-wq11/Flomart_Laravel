<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;

class NotifikasiController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('id_user', Auth::user()->id_user)
            ->latest()
            ->get();

        return view('user.notifikasi', compact('pesanan'));
    }
}