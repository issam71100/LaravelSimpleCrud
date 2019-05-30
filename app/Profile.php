<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'description'
    ];
}
