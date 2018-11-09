<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $table = 'auction';
    public $timestamps = false;
    protected $fillable = [
      'lot_id', 'event_id', 'incrementbid'
    ];
}
