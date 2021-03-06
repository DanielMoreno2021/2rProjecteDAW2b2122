<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AgenciasResource;
use App\Http\Controllers\Api\AgenciasController;
use App\Http\Controllers\Api\AgenciesController;
use App\Http\Controllers\Api\ComarquesController;
use App\Http\Controllers\Api\IncidentsController;
use App\Http\Controllers\Api\MunicipisController;
use App\Http\Controllers\Api\ProvinciesController;
use App\Http\Controllers\Api\TipusIncidentController;
use App\Http\Controllers\Api\CartesTrucadesController;
use App\Http\Controllers\Api\DadesPersonalsController;
use App\Http\Controllers\Api\ExpedientsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('Agencies', AgenciesController::class);
Route::apiResource('cartestrucades', CartesTrucadesController::class);
Route::apiResource('tipusincidents', TipusIncidentController::class);
Route::apiResource('incidents', IncidentsController::class);
Route::apiResource('provincies', ProvinciesController::class);
Route::apiResource('comarques', ComarquesController::class);
Route::apiResource('municipis', MunicipisController::class);
Route::apiResource('expedients', ExpedientsController::class);
Route::apiResource('dadespersonals', DadesPersonalsController::class);
