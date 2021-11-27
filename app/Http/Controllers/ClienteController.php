<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use PDF;

class ClienteController extends Controller
{
    //
    public function __construct()
    {
        //$this->clienteRepository = $clienteRepo;
    }

    public function createPDF() { 

        $data = Cliente::all(); 
        
        view()->share('cliente',$data); 
        
        $pdf = PDF::loadView('vuecliente.pdf_view', $data); 
        
        return $pdf->download('pdf_file.pdf'); 
        
        } 

    public function index(Request $request)
    {
        //$clientes = $this->clienteRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuecliente.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $cliente = Cliente::all();
        return $cliente;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->dni = $request->dni;
        $cliente->apellido = $request->apellido;
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $cliente = Cliente::findOrFail($request->idcliente);
        return $cliente;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $cliente = Cliente::findOrFail($request->idcliente);

        $cliente->dni = $request->dni;
        $cliente->apellido = $request->apellido;
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;

        $cliente->save();

        return $cliente;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $cliente = Cliente::destroy($request->idcliente);
        return $cliente;
        //Esta función obtendra el idcliente de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}