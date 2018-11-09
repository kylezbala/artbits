<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = [

      'eventName', 'eventDescription', 'eventVenue', 'eventStart', 'eventEnd', 'personIncharge', 'user_id', 'status', 'type'
    ];
}
