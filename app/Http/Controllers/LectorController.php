<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Lector::all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:50',
            'apellido'  => 'required|string|max:50',
            'email'     => 'required|email|unique:lector,email|max:150',
            'direccion' => 'required|string|max:200',
            'telefono'  => 'required|string|max:20',
        ]);

        $lector = Lector::create($data);

        return response()->json($lector, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lector = Lector::findOrFail($id);
        return response()->json($lector, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre'    => 'sometimes|required|string|max:50',
            'apellido'  => 'sometimes|required|string|max:50',
            'email'     => "sometimes|required|email|max:150|unique:lector,email,{$id}",
            'direccion' => 'sometimes|required|string|max:200',
            'telefono'  => 'sometimes|required|string|max:20',
        ]);

        $lector = Lector::findOrFail($id);
        $lector->update($data);

        return response()->json($lector, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Lector::findOrFail($id)->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
