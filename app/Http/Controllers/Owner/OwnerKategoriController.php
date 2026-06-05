<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Kategori;

class OwnerKategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view(
            'owner.kategori.index',
            compact('kategori')
        );
    }
}