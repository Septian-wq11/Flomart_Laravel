<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
    'id_user',
    'tanggal_pesanan',
    'total_harga',
    'ongkir',
    'status_pesanan',
    'alamat_kirim',
    'metode_pembayaran',
    'catatan',
    'bukti_pembayaran',
    'nama_penerima',
    'no_hp'
];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan');
    }
}