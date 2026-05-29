<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

class TentangKamiController extends Controller
{
    public function index()
    {
        $jumlahKeranjang = 0;

        if (Auth::check()) {

            $jumlahKeranjang = Keranjang::where(
                'id_user',
                Auth::user()->id_user
            )->sum('qty');
        }

        return view('user.tentangkami', compact(
            'jumlahKeranjang'
        ));
    }
}