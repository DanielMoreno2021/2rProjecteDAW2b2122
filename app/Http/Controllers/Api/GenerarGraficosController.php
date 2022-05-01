<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\GenerarGraficos;
use App\Models\GenerearGraficos;
use App\Http\Controllers\Controller;
use App\Http\Resources\GenerarGraficosResource;
use App\Models\Expedients;

class GenerarGraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generearGraficos = Expedients::all();
        return GenerarGraficosResource::collection($generearGraficos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GenerearGraficos  $generearGraficos
     * @return \Illuminate\Http\Response
     */
    public function show(GenerarGraficos $generearGraficos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GenerearGraficos  $generearGraficos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenerarGraficos $generearGraficos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenerearGraficos  $generearGraficos
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenerarGraficos $generearGraficos)
    {
        //
    }
}
