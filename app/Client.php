<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
* Client Model
*/
class Client extends Model
{
    
    protected $fillable = [
        "id",
        "type",
        "rut_CI",
        "nombre",
        "nombre_fantasia",
        "nombre_contacto",
        "departamento",
        "ciudad",
        "direccion",
        "tel",
        "cel",
        "email",
        "company_id"
    ];
    
    protected $hidden = ['created_at', 'updated_at'];

    public function company(){
        return $this->belongsTo('App\Company');
    }


}