<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use PDF;

class ProductoController extends Controller
{
    //
    public function __construct()
    {
        //$this->productoRepository = $productoRepo;
    }

    public function index(Request $request)
    {
        //$productos = $this->productoRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vueproducto.index',compact( 'mensajeeloquent'))        ;
    }
    public function createPDF() { 

        $data = Producto::all(); 
        
        view()->share('producto',$data); 
        
        $pdf = PDF::loadView('vueproducto.pdf_view', $data); 
        
        return $pdf->download('pdf_file.pdf'); 
        
        } 

    public function lista(Request $request)
    {
        $producto = producto::all();
        return $producto;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $producto = new producto();
        $producto->nombrepro = $request->nombrepro;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $producto = producto::findOrFail($request->idproducto);
        return $producto;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $producto = producto::findOrFail($request->idproducto);

        $producto->nombrepro = $request->nombrepro;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;

        $producto->save();

        return $producto;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $producto = producto::destroy($request->idproducto);
        return $producto;
        //Esta función obtendra el idproducto de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}