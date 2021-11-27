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
class Producto extends Model
{
    //
     //use SoftDeletes;

     public $table = 'producto';
     protected $primaryKey= 'idproducto';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'nombrepro',
         'descripcion',
         'cantidad',
         'precio',
         'email'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'idproducto' => 'integer',
         'nombrepro' => 'string',
         'descripcion' => 'string',
         'cantidad' => 'string',
         'precio' => 'string',
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'nombrepro' => 'nullable|string|max:45',
         'descripcion' => 'nullable|string|max:45',
         'cantidad' => 'nullable|string|max:45',
         'precio' => 'nullable|string|max:45',
         
      
     ];
}