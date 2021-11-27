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
class Proveedor extends Model
{
    //
     //use SoftDeletes;

     public $table = 'proveedor';
     protected $primaryKey= 'idproveedor';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'nombre',
         'apellido',
         'dni',
         'empresa',
         'direccion'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'idproveedor' => 'integer',
         'nombre' => 'string',
         'apellido' => 'string',
         'dni' => 'string',
         'empresa' => 'string',
         'direccion' => 'string'
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'nombre' => 'nullable|string|max:45',
         'apellido' => 'nullable|string|max:45',
         'dni' => 'nullable|string|max:45',
         'empresa' => 'nullable|string|max:45',
         'direccion' => 'nullable|string|max:45'
     ];
}