<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = [
      'eventName', 'eventDescription', 'eventVenue', 'eventDate', 'personIncharge', 'User_id', 'status'
    ];
}
