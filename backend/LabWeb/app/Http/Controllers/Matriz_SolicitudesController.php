<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Matriz_Solicitudes;

class Matriz_SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $matriz = Matriz_Solicitudes::all();
        //print_r($oferta_grupos_usc);
        return response()->json($matriz, 200)->header('Content-Type', 'application/json', );;

        //$imagenes = Imagenes::
        //select('DIRECCION')
        //->get();
        ///print_r($oferta_grupos_usc);
        //return response()->json($imagenes,200)->header('Content-Type', 'application/json', );

    }

    public static function getFormato($id)
    {

        $rma009 = DB::table('Tb_Equipos')
            ->join('Tb_Matriz_Segto_Solicitudes', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Matriz_Segto_Solicitudes.NUM_HOJA_VIDA')
            ->join('Tb_Observaciones_Adicionales', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Observaciones_Adicionales.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Equipos.Nombre',
                'Tb_Matriz_Segto_Solicitudes.Fecha_Solicitud',
                //ORDEN DE SERVICIO
                'Tb_Matriz_Segto_Solicitudes.Consecutivo_Orden',
                'Tb_Matriz_Segto_Solicitudes.Descripcion_Solicitud',
                //CDIS
                'Tb_Matriz_Segto_Solicitudes.CDIS_Presupuesto',
                'Tb_Matriz_Segto_Solicitudes.Fecha_Ejecucion',
                'Tb_Matriz_Segto_Solicitudes.EJECUTADO',
                'Tb_Matriz_Segto_Solicitudes.NO_EJECUTADO',
                'Tb_Matriz_Segto_Solicitudes.Total_Solicitudes',


            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', $id)

            ->get();

        return response()->json($rma009);
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
                    'Consecutivo_Orden' => 'required',
                    'Fecha_Solicitud' => 'required',
                    'CDIS_Presupuesto' => 'required',
                    'Fecha_Ejecucion' => 'required',
                    'EJECUTADO' => 'required',
                    'NO_EJECUTADO' => 'required',
                    'Personal_Encargado' => 'required',
                    'Total_Solicitudes' => 'required',
                    'Descripcion_Solicitud' => 'required',

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

                $rma010 = new Matriz_Solicitudes();
                $rma010->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $rma010->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $rma010->Fecha_Solicitud = $params_array['Fecha_Solicitud'];
                $rma010->CDIS_Presupuesto = $params_array['CDIS_Presupuesto'];
                $rma010->Fecha_Ejecucion = $params_array['Fecha_Ejecucion'];
                $rma010->EJECUTADO = $params_array['EJECUTADO'];
                $rma010->NO_EJECUTADO = $params_array['NO_EJECUTADO'];
                $rma010->Personal_Encargado = $params_array['Personal_Encargado'];
                $rma010->Total_Solicitudes = $params_array['Total_Solicitudes'];
                $rma010->Descripcion_Solicitud = $params_array['Descripcion_Solicitud'];




                $rma010->save();


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
        /*  $rma010 = DB::table('Tb_Matriz_Segto_Solicitudes')->insert(array(
                'Fecha_Solicitud' => $request->input('Fecha_Solicitud'),
                'Descripcion_Solicitud' => $request->input('Descripcion_Solicitud'),
                'CDIS_Presupuesto' => $request->input('CDIS_Presupuesto'),
                'Fecha_Ejecucion' => $request->input('Fecha_Ejecucion'),
                'EJECUTADO' => $request->input('EJECUTADO'),
                'NO_EJECUTADO' => $request->input('NO_EJECUTADO'),
                'Personal_Encargado' => $request->input('Personal_Encargado'),
                'Total_Solicitudes' => $request->input('Total_Solicitudes')
 */
        return response()->json($data, $data['code']);
    }   //Recoger los datos por post



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rma010 = Matriz_Solicitudes::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($rma010);
        /* $rma010 = Matriz_Solicitudes::find($id);
        if (is_object($rma010)) {
            $data = [

                $rma010,
            ];
        } else {
            $data = [
                'code' => 404,
                'mensaje' => "El registro no existe",
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
            # code...
            $validate = \Validator::make($params_array, [
                'Fecha_Solicitud' => 'required',
                'CDIS_Presupuesto' => 'required',
                'Fecha_Ejecucion' => 'required',
                'EJECUTADO' => 'required',
                'NO_EJECUTADO' => 'required',
                'Personal_Encargado' => 'required',
                'Total_Solicitudes' => 'required',
                'Descripcion_Solicitud' => 'required',


            ]);

            $equipo = Matriz_Solicitudes::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        } else {
            $data = [
                'code' => 400,
                'mensaje' => "No has enviado ninguna solicitud."
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
        $rma010 = Matriz_Solicitudes::find($id);

        if (!empty($rma010)) {
            # code...

            $rma010->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'rma010' => $rma010,
            ];
        } else {
            # code...
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'No se encontró registro.',
            ];
        }

        return response()->json($data, $data['code']);
    }
}