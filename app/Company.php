<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
* Company Model
*/
class Company extends Model
{
    
    protected $fillable = [
        'rut',
        'name',
        'address', 
        'locality'
    ];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function bills(){
        return $this->hasMany('App\Bill');
    }

    public function Clients(){
        return $this->hasMany('App\Client');
    }


}