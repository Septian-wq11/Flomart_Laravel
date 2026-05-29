<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';
    protected $fillable = ['id_user','sender','message'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}