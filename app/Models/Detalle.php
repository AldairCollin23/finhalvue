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
class Detalle extends Model
{
    //
     //use SoftDeletes;

     public $table = 'detalleventa';
     protected $primaryKey= 'iddetalle';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'nombreprod',
         'descripcion',
         'cantidad',
         'total'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'iddetalle' => 'integer',
         'nombreprod' => 'string',
         'descripcion' => 'string',
         'cantidad' => 'string',
         'total' => 'string'
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'nombreprod' => 'nullable|string|max:45',
         'descripcion' => 'nullable|string|max:45',
         'cantidad' => 'nullable|string|max:45',
         'total' => 'nullable|string|max:45'
     ];
}