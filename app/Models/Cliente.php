<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version October 21, 2021, 2:21 am UTC
 *
 * @property string $ape_nom
 * @property string $celular
 */
class Cliente extends Model
{
    //
     //use SoftDeletes;

     public $table = 'cliente';
     protected $primaryKey= 'idcliente';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'dni',
         'apellido',
         'nombre',
         'direccion',
         'email'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'idcliente' => 'integer',
         'dni' => 'string',
         'apellido' => 'string',
         'nombre' => 'string',
         'direccion' => 'string',
         'email' => 'string'
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'apellido' => 'nullable|string|max:45',
         'dni' => 'nullable|string|max:45',
         'apellido' => 'nullable|string|max:45',
         'nombre' => 'nullable|string|max:45',
         'direccion' => 'nullable|string|max:100',
         'dni' => 'nullable|string|max:45'
     ];
}