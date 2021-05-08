<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Info_Institucional;

class Info_InstitucionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $info = Info_Institucional::all()->toJson();
        return response($info, 200)->header('Content-Type', 'application/json', );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);

        if (!empty($params_array)) {


            $validate = \Validator::make(
                $params_array,
                [
                    'NUM_HOJA_VIDA' => 'required',
                    'Email_Laboratorio' => 'required',
                    'Fecha_Ejecucion_Hoja_Vida' => 'required',
                    'Lider_Proceso' => 'required',
                    'Cargo' => 'required'
                ]

            );

            if ($validate->fails()) {
                # code...
                $data = [
                    'code' => 404,
                    'mensaje' => "No se guardó la información correctamente.",
                    'errors' => $validate->errors()
                ];
            } else {
                # code...

                $info = new Info_Institucional();
                $info->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $info->Email_Laboratorio = $params_array['Email_Laboratorio'];
                $info->Fecha_Ejecucion_Hoja_Vida = $params_array['Fecha_Ejecucion_Hoja_Vida'];
                $info->Lider_Proceso = $params_array['Lider_Proceso'];
                $info->Cargo = $params_array['Cargo'];



                $info->save();


                $data = [
                    'code' => 200,
                    'mensaje' => "Guardado Exitosamente."

                ];
            }
        } else {
            $data = [
                'code' => 400,
                'mensaje' => "No has enviado ningún dato."
            ];
        }
        /* $info = DB::table('Tb_Informacion_Institucional')->insert(array(
            'Email_Laboratorio' => $request->input('Email_Laboratorio'),
            'Fecha_Ejecucion_Hoja_Vida' => $request->input('Fecha_Ejecucion_Hoja_Vida'),
            'Lider_Proceso' => $request->input('Lider_Proceso'),
            'Cargo' => $request->input('Cargo')
        )); */
        return response()->json($data, $data['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institucional = Info_Institucional::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($institucional);


        /* $institucional = Info_Institucional::find($id);
        if (is_object($institucional)) {
            $data = [

                $institucional
            ];
        } else {
            $data = [
                'code' => 404,
                'mensaje' => "El equipo no existe"
            ];
        }

        return response()->json($data); */
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
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);

        if (!empty($params_array)) {

            $validate = \Validator::make($params_array, [
                'Email_Laboratorio' => 'required',
                'Fecha_Ejecucion_Hoja_Vida' => 'required',
                'Lider_Proceso' => 'required',
                'Cargo' => 'required'
            ]);



            $equipo = Info_Institucional::where('NUM_HOJA_VIDA', $id)->update($params_array);
            if ($equipo) {

                $data = [
                    'code' => 200,
                    'status' => 'success',
                    $equipo => $params_array,
                ];
            } else {
                # code...
                $data = [
                    'code' => 400,
                    'mensaje' => "Datos de Hoja de vida errados.",
                ];
            }

            $data = [
                'code' => 200,
                'status' => 'success',
                $equipo => $params_array
            ];
        } else {
            $data = [
                'code' => 400,
                'mensaje' => "No has enviado ningún dato."
            ];
        }

        return response()->json($data, $data['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infoinstitucional = Info_Institucional::find($id);

        if (!empty($infoinstitucional)) {
            # code...


            $infoinstitucional->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'infoinstitucional' => $infoinstitucional
            ];
        } else {
            # code...
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Hoja de vida no existe.'
            ];
        }


        return response()->json($data, $data['code']);
    }
}