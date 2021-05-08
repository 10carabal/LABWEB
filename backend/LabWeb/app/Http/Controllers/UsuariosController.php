<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        /* $usuarios_has_grupos = User::all()->toJson();
        return response($usuarios_has_grupos, 200)->header('Content-Type', 'application/json', ); */ }

    public function register(Request $req)
    {
        /* $correo = $req->input('CORREO');
        $clave = $req->input('CLAVE');

        return "Registrar Usuario: $correo"; */ }

    public function login(Request $req)
    {
        /* $correo = $req->input('CORREO');
        $clave = $req->input('CLAVE');

        return "El correo es: $correo y la clave es: $clave"; */ }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perfil(Request $req)
    {

        //
    }



    public function perfilEstudiante($id)
    {

        /* $perfilEstudiante = DB::table('USUARIOS_HAS_GRUPOS')
            ->join('VISTA_ESTUDIANTE', 'USUARIOS_HAS_GRUPOS.USUARIOS_ID_USUARIO', '=', 'VISTA_ESTUDIANTE.NUM_IDENTIFICACION')
            ->where('VISTA_ESTUDIANTE.NUM_IDENTIFICACION', '=', $id)
            ->join('CURSO', 'USUARIOS_HAS_GRUPOS.GRUPOS_CURSO_ID_GRUPOS', '=', 'CURSO.IDCURSO')
            ->select('GRUPOS_ID_GRUPOS', 'CURSO.NOMBRE', 'VISTA_ESTUDIANTE.NUM_IDENTIFICACION', 'VISTA_ESTUDIANTE.NOMBRES', 'VISTA_ESTUDIANTE.APELLIDOS', 'VISTA_ESTUDIANTE.PROGRAMA', 'VISTA_ESTUDIANTE.FACULTAD', 'VISTA_ESTUDIANTE.SEMESTRE')
            ->get();

        return response()->json($perfilEstudiante); */ }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}