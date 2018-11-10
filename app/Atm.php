<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    protected $fillable = [
        'lat', 'lng', 'bank_id', 'operation', 'working_hours'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //
}
