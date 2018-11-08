<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commission';

    protected $fillable = [
        'setPrice', 'artTitle', 'artDesc', 'requestee', 'User_id', 'status'
    ];

}

