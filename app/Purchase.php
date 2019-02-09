<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase';

    protected $fillable = [
        'id', 'user_id', 'art_id', 'purchaseDate'
    ];

    Const CREATED_AT = 'purchaseDate';
    Const UPDATED_AT =  null;
}
