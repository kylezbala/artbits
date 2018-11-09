<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';

    protected $fillable = [
        'id', 'Item_id', 'User_id', 'Date'
    ];
}
