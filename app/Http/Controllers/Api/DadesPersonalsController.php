<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Models\DadesPersonals;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\DadesPersonalsResource;

class DadesPersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dadesPersonals = DadesPersonals::all();
        return DadesPersonalsResource::collection($dadesPersonals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dadesPersonals = new DadesPersonals();


        $dadesPersonals->telefon = $request->input('telefon');
        $dadesPersonals->adreca = $request->input('adreca');
        $dadesPersonals->antecedents = $request->input('antecedents');

        try{

            $dadesPersonals->save();
            $response = (new DadesPersonalsResource($dadesPersonals))->response()->setStatusCode(201);
        }
        catch(QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            // $request->session()->flash('error', $mensaje);
            $response = \response()->json(['error' => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function show(DadesPersonals $dadesPersonals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DadesPersonals $dadesPersonals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function destroy(DadesPersonals $dadesPersonals)
    {
        //
    }
}
