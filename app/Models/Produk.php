<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_kategori',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_produk');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_produk');
    }
}