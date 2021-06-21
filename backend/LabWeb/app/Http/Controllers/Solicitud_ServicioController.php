<?php

namespace App\Http\Controllers;

use App\Solicitud_Servicio;
use DB;
use Illuminate\Http\Request;

class Solicitud_ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $solicitudS = Solicitud_Servicio::select(["*",  "CONSECUTIVO_ORDEN as Consecutivo_Orden"])->get()->toJson();
        return response($solicitudS, 200)->header('Content-Type', 'application/json', );
    }

    public function getFormato($id)
    {
        $rma007 = DB::table('Tb_Equipos')
            ->join('Tb_Solicitud_Servicio', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Solicitud_Servicio.NUM_HOJA_VIDA')
            ->join('Tb_Observaciones_Adicionales', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Observaciones_Adicionales.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                //IDENTIFICACION REPORTE
                'Tb_Solicitud_Servicio.Consecutivo_Orden',
                'Tb_Solicitud_Servicio.Fecha_Solicitud_Servicio',
                'Tb_Solicitud_Servicio.Hora_Solicitud_Servicio',
                'Tb_Solicitud_Servicio.Servicio',
                'Tb_Solicitud_Servicio.Ubicacion',
                //IDENTIFICACION EQUIPO QUE PRESENTA PROBLEMAS
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Marca',
                'Tb_Equipos.Serial',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Activo_Fijo',
                //REPORTE PROBLEMAS
                'Tb_Solicitud_Servicio.Descripcion_Problema',
                'Tb_Solicitud_Servicio.Nombre_Responsable',
                'Tb_Solicitud_Servicio.Cargo_Responsable',

            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', $id)

            ->get();

        return response()->json($rma007);
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
                    'Fecha_Solicitud_Servicio' => 'required',
                    'Hora_Solicitud_Servicio' => 'required',
                    'Servicio' => 'required',
                    'Ubicacion' => 'required',
                    'Descripcion_Problema' => 'required',
                    'Nombre_Responsable' => 'required',
                    'Cargo_Responsable' => 'required',
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

                $rma007 = new Solicitud_Servicio();
                $rma007->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $rma007->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $rma007->Fecha_Solicitud_Servicio = $params_array['Fecha_Solicitud_Servicio'];
                $rma007->Hora_Solicitud_Servicio = $params_array['Hora_Solicitud_Servicio'];
                $rma007->Servicio = $params_array['Servicio'];
                $rma007->Ubicacion = $params_array['Ubicacion'];
                $rma007->Descripcion_Problema = $params_array['Descripcion_Problema'];
                $rma007->Nombre_Responsable = $params_array['Nombre_Responsable'];
                $rma007->Cargo_Responsable = $params_array['Cargo_Responsable'];




                $rma007->save();


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
        /* $rma007 = DB::table('Solicitud_Servicio')->insert(array(
                'Fecha_Solicitud_Servicio' => $request->input('Fecha_Solicitud_Servicio'),
                'Hora_Solicitud_Servicio' => $request->input('Hora_Solicitud_Servicio'),
                'Servicio' => $request->input('Servicio'),
                'Ubicacion' => $request->input('Ubicacion'),
                'Descripcion_Problema' => $request->input('Descripcion_Problema'),
                'Nombre_Responsable' => $request->input('Nombre_Responsable'),
                'Cargo_Responsable' => $request->input('Cargo_Responsable'),

            )), */
        //Recoger los datos por post

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
        $rma007 = Solicitud_Servicio::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($rma007);
        /* $rma007 = Solicitud_Servicio::find($id);
        if (is_object($rma007)) {
            $data = [

                $rma007,
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


                'Consecutivo_Orden' => 'required',
                'Fecha_Solicitud_Servicio' => 'required',
                'Hora_Solicitud_Servicio' => 'required',
                'Servicio' => 'required',
                'Ubicacion' => 'required',
                'Descripcion_Problema' => 'required',
                'Nombre_Responsable' => 'required',
                'Cargo_Responsable' => 'required',

            ]);

            $equipo = Solicitud_Servicio::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $rma007 = Solicitud_Servicio::find($id);

        if (!empty($rma007)) {
            # code...

            $rma007->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'rma007' => $rma007,
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
