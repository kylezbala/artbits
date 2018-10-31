<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table='art';

    protected $fillable = [
        'Art', 'artTitle','user_id', 'artDescription', 'category_id'
    ];
}
