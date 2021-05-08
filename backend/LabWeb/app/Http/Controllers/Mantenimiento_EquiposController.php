<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mantenimiento_Equipos;

class Mantenimiento_EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $mantenimientoE = Mantenimiento_Equipos::all()->toJson();
        return response($mantenimientoE, 200)->header('Content-Type', 'application/json', );
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
                    'Mantenimiento_Propio' => 'required',
                    'Mantenimiento_Contratado' => 'required',
                    'Por_Orden_Compra' => 'required',
                    'Requiere_Calibracion' => 'required',
                    'Requiere_Cal_Operacional' => 'required',
                    'Requiere_Validacion'  => 'required'
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

                $mantenimiento = new Mantenimiento_Equipos();
                $mantenimiento->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $mantenimiento->Mantenimiento_Propio = $params_array['Mantenimiento_Propio'];
                $mantenimiento->Mantenimiento_Contratado = $params_array['Mantenimiento_Contratado'];
                $mantenimiento->Por_Orden_Compra = $params_array['Por_Orden_Compra'];
                $mantenimiento->Requiere_Calibracion = $params_array['Requiere_Calibracion'];
                $mantenimiento->Requiere_Cal_Operacional = $params_array['Requiere_Cal_Operacional'];
                $mantenimiento->Requiere_Validacion = $params_array['Requiere_Validacion'];

                $mantenimiento->save();


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
        $mantenimiento = DB::table('Tb_Mantenimiento_Equipos')->insert(array(
            'Mantenimiento_Propio' => $request->input('Mantenimiento_Propio'),
            'Mantenimiento_Contratado' => $request->input('Mantenimiento_Contratado'),
            'Por_Orden_Compra' => $request->input('Por_Orden_Compra'),
            'Requiere_Calibracion' => $request->input('Requiere_Calibracion'),
            'Requiere_Cal_Operacional' => $request->input('Requiere_Cal_Operacional'),
            'Requiere_Validacion' => $request->input('Requiere_Validacion')
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
        $mantenimiento = Mantenimiento_Equipos::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($mantenimiento);
        /* $mantenimiento = Mantenimiento_Equipos::find($id);
        if (is_object($mantenimiento)) {
            $data = [

                $mantenimiento
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
                'Mantenimiento_Propio' => 'required',
                'Mantenimiento_Contratado' => 'required',
                'Por_Orden_Compra' => 'required',
                'Requiere_Calibracion' => 'required',
                'Requiere_Cal_Operacional' => 'required',
                'Requiere_Validacion'  => 'required'

            ]);



            $equipo = Mantenimiento_Equipos::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $mantenimiento = Mantenimiento_Equipos::find($id);

        if (!empty($mantenimiento)) {
            # code...


            $mantenimiento->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'obs$mantenimiento' => $mantenimiento
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