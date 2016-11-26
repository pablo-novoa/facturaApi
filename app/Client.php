<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
* Client Model
*/
class Client extends Model
{
    
    protected $fillable = [
        'rut',
        'name',
        'address', 
        'locality'
    ];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function company(){
        return $this->belongsTo('App\Company');
    }


}