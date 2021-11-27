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
class Vendedor extends Model
{
    //
     //use SoftDeletes;

     public $table = 'vendedor';
     protected $primaryKey= 'idvendedor';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'dni',
         'nombrevendedor',
         'apellidovendedor',
         'celular',
         'email'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'idvendedor' => 'integer',
         'dni' => 'string',
         'nombrevendedor' => 'string',
         'apellidovendedor' => 'string',
         'celular' => 'string',
         'email' => 'string'
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'dni' => 'nullable|string|max:45',
         'nombrevendedor' => 'nullable|string|max:45',
         'apellidovendedor' => 'nullable|string|max:45',
         'celular' => 'nullable|string|max:45',
         'email' => 'nullable|string|max:45'
      
     ];
}