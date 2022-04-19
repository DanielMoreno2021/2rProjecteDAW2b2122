<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CartesTrucades;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartesTrucadesResource;
use Illuminate\Database\QueryException;

class CartesTrucadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartesTrucades = CartesTrucades::all();
        return CartesTrucadesResource::collection($cartesTrucades);

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartesTrucades = new CartesTrucades();

        $cartesTrucades->codi_trucada = $request->input('codi_trucada');

        $cartesTrucades->data_hora = $request->input('data_hora');
        //Falta por completar.
        $cartesTrucades->dades_personals_id = $request->input('dades_personals_id');
        $cartesTrucades->telefon = $request->input('telefon');
        $cartesTrucades->procedencia_trucada = $request->input('procedencia_trucada');
        $cartesTrucades->origen_trucada = $request->input('origen_trucada');
        $cartesTrucades->nom_trucada = $request->input('nom_trucada');
        $cartesTrucades->municipis_id_trucada = $request->input('municipis_id_trucada');
        $cartesTrucades->adreca_trucada = $request->input('adreca_trucada');
        $cartesTrucades->fora_catalunya = $request->input('fora_catalunya');
        $cartesTrucades->provincies_id = $request->input('provincies_id');
        $cartesTrucades->municipis_id = $request->input('municipis_id');
        $cartesTrucades->tipus_localitzacions_id = $request->input('tipus_localitzacions_id');
        $cartesTrucades->descripcio_localitzacio = $request->input('descripcio_localitzacio');
        $cartesTrucades->detall_localitzacio = $request->input('detall_localitzacio');
        $cartesTrucades->altres_ref_localitzacio = $request->input('altres_ref_localitzacio');
        $cartesTrucades->incidents_id = $request->input('incidents_id');
        $cartesTrucades->nota_comuna = $request->input('nota_comuna');
        $cartesTrucades->expedients_id = $request->input('expedients_id');
        $cartesTrucades->usuaris_id = $request->input('usuaris_id');

        //CRUD APIs, 2:34, preguntar por try catch y control de errores
        try{

            $cartesTrucades->save();
            $response = (new CartesTrucadesResource($cartesTrucades))->response()->setStatusCode(201);
        }
        catch(QueryException $ex)
        {
            $response = \response()->json(['error' => "Error. "], 400);
        }

        return $response;




        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function show(CartesTrucades $cartesTrucades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartesTrucades $cartesTrucades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartesTrucades $cartesTrucades)
    {
        //
    }
}
