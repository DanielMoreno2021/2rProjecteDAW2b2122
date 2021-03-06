<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\IncidentsController;
use App\Http\Controllers\ExpedientsController;
use App\Http\Controllers\TipusIncidentController;
use App\Http\Controllers\CartesTrucadesController;
use App\Http\Controllers\GenerarGraficosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/login', [UsuariController::class, 'login']);
Route::get('/logout', [UsuariController::class, 'logout']);

Route::get('/', function () {
    return view('login');
});
Route::get('/mapa', function () {
    return view('mapa');
});

Route::get('operador', function () {
    return view('operador');
});

Route::get('supervisor', function () {
    return view('supervisor');
});

Route::get('administrador', function () {
    return view('administrador');
});

// Route::get('cartallamada', function () {
//     return view('cartallamada');
// });

Route::get('helpboxvideos', function () {
    return view('helpboxvideos');
});


/* Route::get('listaexpedientes', function () {
    return view('listaexpedientes');
}); */

Route::resource('listaexpedientes', ExpedientsController::class);


Route::resource('cartallamada', CartesTrucadesController::class);
// Route::resource('cartallamada', IncidentsController::class);

Route::resource('gestionusuarios', UsuariController::class);

Route::resource('generargraficos', GenerarGraficosController::class);
