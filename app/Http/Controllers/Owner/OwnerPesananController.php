<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class OwnerPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::latest()->get();

        return view('owner.pesanan.index', compact('pesanan'));
    }
}