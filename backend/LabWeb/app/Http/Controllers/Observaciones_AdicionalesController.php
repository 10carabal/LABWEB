<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Observaciones_Adicionales;

class Observaciones_AdicionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $observaciones = Observaciones_Adicionales::all();
        //print_r($oferta_grupos_usc);
        return response()->json($observaciones, 200)->header('Content-Type', 'application/json', );;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);

        if (!empty($params_array)) {


            $validate = \Validator::make(
                $params_array,
                [
                    'NUM_HOJA_VIDA' => 'required',
                    'Fecha_Observacion' => 'required',
                    'Observacion' => 'required',
                    'Responsable_Observacion' => 'required'
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

                $observaciones = new Observaciones_Adicionales();
                $observaciones->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $observaciones->Fecha_Observacion = $params_array['Fecha_Observacion'];
                $observaciones->Observacion = $params_array['Observacion'];
                $observaciones->Responsable_Observacion = $params_array['Responsable_Observacion'];
                $observaciones->save();


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
        /* 
        $observaciones = DB::table('Tb_Observaciones_Adicionales')->insert(array(
            'Fecha_Observacion' => $request->input('Fecha_Observacion'),
            'Observacion' => $request->input('Observacion'),
            'Responsable_Observacion' => $request->input('Responsable_Observacion')
        ));
 */
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
        $observaciones = Observaciones_Adicionales::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($observaciones);
        /* $observaciones = Observaciones_Adicionales::find($id);
        if (is_object($observaciones)) {
            $data = [

                $observaciones
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
                'Fecha_Observacion' => 'required',
                'Observacion' => 'required',
                'Responsable_Observacion' => 'required'

            ]);



            $equipo = Observaciones_Adicionales::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $observaciones = Observaciones_Adicionales::find($id);

        if (!empty($observaciones)) {
            # code...


            $observaciones->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'observaciones' => $observaciones
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