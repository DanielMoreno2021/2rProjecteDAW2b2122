<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{
    public function showlogin()
    {
        $user = new Usuari();
        $user->codi = 04;
        $user->contrassenya = \bcrypt('betis');
        $user->nom = 'Betis';
        $user->cognoms = 'Betis Betis';
        $user->perfils_id = 1;

        $user->save();

        return view('login');
    }
    public function login(Request $request)
    {

        $codi = $request->input('codi');
        $contraseña = $request->input('contraseña');

        $user = Usuari::where('codi', $codi)->first();

        if ($user != null && Hash::check($contraseña, $user->contrassenya)) {
            Auth::login($user);
            if ($user->perfils_id == 1) {
                $response = redirect('/operador');
            } else if ($user->perfils_id == 2) {
                $response = redirect('/supervisor');
            } else if ($user->perfils_id == 3) {
                $response = redirect('/administrador');
            }
        } else {
            $request->session()->flash('error', 'Usuario o Contraseña Incorrectos');
            $response = redirect('/')->withInput();
        }
        return $response;
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuaris = Usuari::all();
        return view('gestionusuarios', compact('usuaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crearUsuari'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Usuari();
        $user->codi = $request->input('codigo');
        $user->nom = $request->input('nom');
        $user->cognoms = $request->input('cognoms');
        $user->contrassenya = $request->input(bcrypt('contrassenya'));
        $user->perfils_id = $request->input('rol');

        $user->save();
        return redirect()->action([UsuariController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function show(Usuari $usuari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuari $usuari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuari $usuari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuari $usuari)
    {
        $usuari->delete();
        return redirect()->action([UsuariController::class, 'index']);
    }
}
