<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class TokoController extends Controller
{
    // HALAMAN TOKO
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        // SEARCH
        if($request->search){

            $query->where(
                'nama_produk',
                'like',
                '%'.$request->search.'%'
            );
        }

        // FILTER KATEGORI
        if($request->kategori){

            $query->where(
                'id_kategori',
                $request->kategori
            );
        }

        // FILTER HARGA MIN
        if($request->min){

            $query->where(
                'harga',
                '>=',
                $request->min
            );
        }

        // FILTER HARGA MAX
        if($request->max){

            $query->where(
                'harga',
                '<=',
                $request->max
            );
        }

        $produk = $query
            ->latest()
            ->paginate(9);

        $kategori = Kategori::all();

        return view(
            'toko.index',
            compact(
                'produk',
                'kategori'
            )
        );
    }

    // DETAIL PRODUK
    public function detail($id)
    {
        $produk = Produk::with('kategori')
            ->findOrFail($id);

        return view(
            'toko.detail_produk',
            compact('produk')
        );
    }
}