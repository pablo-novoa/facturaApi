<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
* Company Model
*/
class Company extends Model
{
    
    protected $fillable = [
        'id',
        'rut',
        'name',
        'address', 
        'locality'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function bills(){
        return $this->hasMany('App\Bill');
    }

    public function Clients(){
        return $this->hasMany('App\Client');
    }


}