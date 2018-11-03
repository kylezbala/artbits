<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase';

    protected $fillable = [
        'id', 'user_id', 'art_id', 'purchaseDate'
    ];

    public $timestamps = false;
}
