<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = [
        'sender', 'receiver', 'message', 'created_at'
    ];

    public function usersender()
    {
        return $this->belongsTo('\App\Users', 'sender');
    }

    public function userreceiver()
    {
        return $this->belongsTo('\App\Users', 'receiver');
    }

    public const UPDATED_AT = null;
}
