<?php

namespace App\Http\Controllers\API;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Http\Requests\ActualizarPacienteRequest;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Paciente::all(); // Sin Resocurce
        return  PacienteResource::collection(Paciente::all()); // Con Resource
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteRequest $request)
    {
        // Paciente::create($request->all()); // Sin Resource
        // return response()->json([
        //     'res' => true,
        //     'mensaje' => 'Paciente guardado correctamente'
        // ], 200);

        return (new PacienteResource(Paciente::create($request->all())))
                    ->additional([
                        'mensaje' => 'Paciente guardado correctamente'
                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        // Sin Resource
        // return response()->json([
        //     'res' => true,
        //     'paciente' => $paciente
        // ], 200);

        return new PacienteResource($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPacienteRequest $request, Paciente $paciente)
    {
        //Sin Resource
        // $paciente->update($request->all());
        // return response()->json([
        //     'res' => true,
        //     'mensaje' => 'Paciente actualizado correctamente'
        // ], 200);

        $paciente->update($request->all());
        return (new PacienteResource($paciente))
                    ->additional([
                        'mensaje' => 'Paciente actualizado correctamente'
                    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //Sin Resource
        // $paciente->delete();
        // return response()->json([
        //     'res' => true,
        //     'mensaje' => 'Paciente eliminado correctamente'
        // ], 200);

        $paciente->delete();
        return (new PacienteResource($paciente))
                    ->additional([
                        'mensaje' => 'Paciente eliminado correctamente'
                    ]);
    }
}
