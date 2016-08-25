<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table='store';

    protected $fillable = array('name','address');

    protected $hidden = ['created_at','updated_at']; 
}
