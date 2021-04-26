<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    private $validacion = [
        'nombre' => 'required|string',
        'direccion' => 'required|string',
        'codigo_postal' => 'required',
        'fono' => 'required|string'
    ];

    public function index()
    {
        return response()->json(Empresa::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validador = Validator::make($request->all(), $this->validacion);

        if($validador->fails())
        {
            return response()->json([
                'status' => 'Error',
                'mensaje' => 'Error en los datos a ingresar al sistema'
            ], 400);
        }

        $empresa = new Empresa;
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->codigo_postal = $request->codigo_postal;
        $empresa->fono = $request->fono;

        $empresa->save();

        return response()->json([
            'status' => 'OK',
            'mensaje' => 'La empresa ha sido creada exitosamente',
            'data' => $empresa
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Empresa::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validador = Validator::make($request->all(), $this->validacion);

        if($validador->fails())
        {
            return response()->json([
                'status' => 'Error',
                'mensaje' => 'Error en los datos a ingresar al sistema'
            ], 400);
        }

        $empresa = Empresa::find($id);
        if(!$empresa)
        {
            return response()->json([
                'status' => 'Error',
                'mensaje' => 'El registro no pudo ser encontrado'
            ], 500);
        }
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->codigo_postal = $request->codigo_postal;
        $empresa->fono = $request->fono;

        $empresa->save();

        return response()->json([
            'status' => 'OK',
            'mensaje' => 'La empresa ha sido editada exitosamente',
            'data' => $empresa
        ], 201);
    }

    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        if($empresa)
        {
            $empresa->delete();
            return response()->json([
                'status' => 'OK',
                'mensaje' => 'La empresa ha sido eliminada exitosamente'
            ], 200);
        }

        return response()->json([
            'status' => 'Error',
            'mensaje' => 'El registro no pudo ser encontrado'
        ], 500);
    }
}
