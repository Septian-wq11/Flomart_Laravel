<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $primaryKey = 'id_blog';

    protected $fillable = [

        'judul',
        'gambar',
        'kategori',
        'penulis',
        'tanggal',
        'isi'
    ];
}