<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
* Bill Model
*/
class Bill extends Model
{
    
    protected $fillable = [
        'bill_number',
        'bill_type',
        'buyer_name', 
        'buyer_rut', 
        'buyer_address', 
        'buyer_locality', 
        'final_consumer',
        'bill_items',
        'currency',
        'sub_total',
        'taxes',
        'total'
    ];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function company(){
        return $this->belongsTo('App\Company');
    }

}