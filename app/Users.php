<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';

    protected $fillable = [
      'Lastname', 'Firstname', 'Middlename', 'Username', 'Password', 'Gender', 'Birthdate', 'address_id', 'MobileNo', 'Email', 'status', 'role'
    ];
    public $timestamps = false;
    public function art(){
        return $this->hasOne('\App\Art');
    }
    public function address(){
        return $this->belongsTo('\App\Address', 'address_id');
    }


}
