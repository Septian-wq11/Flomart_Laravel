<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'alamat',
        'no_hp'
    ];

    protected $hidden = [
        'password',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_user');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_user');
    }
}