<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;

class VendedorController extends Controller
{
    //
    public function __construct()
    {
        //$this->vendedorRepository = $vendedorRepo;
    }

    public function index(Request $request)
    {
        //$vendedors = $this->vendedorRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuevendedor.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $vendedor = Vendedor::all();
        return $vendedor;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $vendedor = new Vendedor();
        $vendedor->dni = $request->dni;
        $vendedor->nombrevendedor = $request->nombrevendedor;
        $vendedor->apellidovendedor = $request->apellidovendedor;
        $vendedor->celular = $request->celular;
        $vendedor->email = $request->email;
        $vendedor->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $vendedor = Vendedor::findOrFail($request->idvendedor);
        return $vendedor;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $vendedor = Vendedor::findOrFail($request->idvendedor);
        $vendedor->dni = $request->dni;
        $vendedor->nombrevendedor = $request->nombrevendedor;
        $vendedor->apellidovendedor = $request->apellidovendedor;
        $vendedor->celular = $request->celular;
        $vendedor->email = $request->email;

        $vendedor->save();

        return $vendedor;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $vendedor = Vendedor::destroy($request->idvendedor);
        return $vendedor;
        //Esta función obtendra el idvendedor de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}