<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CartesTrucades;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartesTrucadesResource;

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

        $cartesTrucades->codi_trucada = $request->input('codiTrucada');
        $cartesTrucades->data_hora = date('Y-m-d H:i:s');
        //Falta por completar.
        $cartesTrucades->data_hora = date('H:i:s');
        //
        $cartesTrucades->dades_personals_id = $request->input('dadesPersonalsID');
        $cartesTrucades->telefon = $request->input('telefon');
        $cartesTrucades->procedencia_trucada = $request->input('procedenciaTrucada');
        $cartesTrucades->origen_trucada = $request->input('origenTrucada');
        $cartesTrucades->nom_trucada = $request->input('nomTrucada');
        $cartesTrucades->municipis_id_trucada = $request->input('municipisIDTrucada');
        $cartesTrucades->adreca_trucada = $request->input('adreçaTrucada');
        $cartesTrucades->fora_catalunya = $request->input('foraCatalunya');
        $cartesTrucades->provincies_id = $request->input('provinciesID');
        $cartesTrucades->municipis_id = $request->input('municipisID');
        $cartesTrucades->tipus_localitzacions_id = $request->input('tipusLocalitzacionsID');
        $cartesTrucades->descripcio_localitzacio = $request->input('descripcioLocalitzacio');
        $cartesTrucades->detall_localitzacio = $request->input('detallLocalitzacio');
        $cartesTrucades->altres_ref_localitzacio = $request->input('altresRefLocalitzacio');
        $cartesTrucades->incidents_id = $request->input('incidentsID');
        $cartesTrucades->nota_comuna = $request->input('notaComuna');
        $cartesTrucades->expedients_id = $request->input('expedientsID');
        $cartesTrucades->usuaris_id = $request->input('usuarisID');

        //CRUD APIs, 2:34, preguntar por try catch y control de errores
        $cartesTrucades->save();










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
