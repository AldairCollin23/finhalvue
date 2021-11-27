<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle;

class DetalleController extends Controller
{
    //
    public function __construct()
    {
        //$this->detalleRepository = $detalleRepo;
    }

    public function index(Request $request)
    {
        //$detalles = $this->detalleRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuedetalle.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $detalle = Detalle::all();
        return $detalle;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $detalle = new Detalle();
        $detalle->nombreprod = $request->nombreprod;
        $detalle->descripcion = $request->descripcion;
        $detalle->cantidad = $request->cantidad;
        $detalle->total = $request->total;
        $detalle->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $detalle = Detalle::findOrFail($request->iddetalle);
        return $detalle;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $detalle = Detalle::findOrFail($request->iddetalle);

        $detalle->nombreprod = $request->nombreprod;
        $detalle->descripcion = $request->descripcion;
        $detalle->cantidad = $request->cantidad;
        $detalle->total = $request->total;

        $detalle->save();

        return $detalle;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $detalle = Detalle::destroy($request->iddetalle);
        return $detalle;
        //Esta función obtendra el iddetalle de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}