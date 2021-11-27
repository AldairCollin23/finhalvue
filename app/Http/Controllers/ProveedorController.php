<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use PDF;

class ProveedorController extends Controller
{
    //
    public function __construct()
    {
        //$this->proveedorRepository = $proveedorRepo;
    }

    public function index(Request $request)
    {
        //$proveedors = $this->proveedorRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuevendedor.index',compact( 'mensajeeloquent'))        ;
    }
    public function createPDF() { 

        $data = Proveedor::all(); 
        
        view()->share('vendedor',$data); 
        
        $pdf = PDF::loadView('vueproveedor.pdf_view', $data); 
        
        return $pdf->download('pdf_file.pdf'); 
        
        } 

    public function lista(Request $request)
    {
        $vendedor = Proveedor::all();
        return $vendedor;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }



    public function store(Request $request)
    {
        $vendedor = new Proveedor();
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
        $vendedor = Proveedor::findOrFail($request->idvendedor);
        return $vendedor;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $vendedor = Proveedor::findOrFail($request->idvendedor);

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
        $vendedor = Proveedor::destroy($request->idvendedor);
        return $vendedor;
        //Esta función obtendra el idvendedor de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}