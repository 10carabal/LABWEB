<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Inspe_Funcionalidad;

class Inspe_FuncionalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $funcionalidad = Inspe_Funcionalidad::all()->toJson();
        return response()->json($funcionalidad, 200)->header('Content-Type', 'application/json', );
    }

    public static function getFormato($id)
    {

        $rma009 = DB::table('Tb_Equipos')
            ->join('Tb_Insp_Funcionalidad_Equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Insp_Funcionalidad_Equipos.NUM_HOJA_VIDA')
            ->join('Tb_Observaciones_Adicionales', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Observaciones_Adicionales.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Insp_Funcionalidad_Equipos.Laboratorio',
                'Tb_Insp_Funcionalidad_Equipos.Fecha_Ejecucion',
                //RESPONSABLE EJECUCION
                'Tb_Insp_Funcionalidad_Equipos.Nombre_Responsable',
                //VARIABLES A EVALUAR
                'Tb_Insp_Funcionalidad_Equipos.Funcionamiento_Equipo',
                'Tb_Insp_Funcionalidad_Equipos.Estado_Entorno',
                //ESTADO DE LOS ACCESORIOS Y/O CONSUMIBLES
                'Tb_Insp_Funcionalidad_Equipos.Estado_Accesorio_Consumibles',
                'Tb_Insp_Funcionalidad_Equipos.Estado_lineas_Alimentacion',
                'Tb_Insp_Funcionalidad_Equipos.Estado_Almacenamiento',
                //PRESENTA DOCUMENTACION
                'Tb_Insp_Funcionalidad_Equipos.Documentacion_Presente',
                //recomendaciones fabricante
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Marca',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Serial',
                'Tb_Observaciones_Adicionales.Observacion',
                'Tb_Observaciones_Adicionales.Fecha_Observacion',
                'Tb_Observaciones_Adicionales.Responsable_Observacion',


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
                    'Laboratorio' => 'required',
                    'Fecha_Ejecucion' => 'required',
                    'Nombre_Responsable' => 'required',
                    'Cargo_Responsable' => 'required',
                    'Funcionamiento_Equipo' => 'required',
                    'Estado_Entorno' => 'required',
                    'Estado_Accesorio_Consumibles' => 'required',
                    'Estado_lineas_Alimentacion' => 'required',
                    'Estado_Almacenamiento' => 'required',
                    'Documentacion_Presente' => 'required',
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

                $rma009 = new Inspe_Funcionalidad();
                $rma009->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $rma009->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $rma009->Laboratorio = $params_array['Laboratorio'];
                $rma009->Fecha_Ejecucion = $params_array['Fecha_Ejecucion'];
                $rma009->Nombre_Responsable = $params_array['Nombre_Responsable'];
                $rma009->Cargo_Responsable = $params_array['Cargo_Responsable'];
                $rma009->Funcionamiento_Equipo = $params_array['Funcionamiento_Equipo'];
                $rma009->Estado_Entorno = $params_array['Estado_Entorno'];
                $rma009->Estado_Accesorio_Consumibles = $params_array['Estado_Accesorio_Consumibles'];
                $rma009->Estado_lineas_Alimentacion = $params_array['Estado_lineas_Alimentacion'];
                $rma009->Estado_Almacenamiento = $params_array['Estado_Almacenamiento'];
                $rma009->Documentacion_Presente = $params_array['Documentacion_Presente'];




                $rma009->save();


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
        /* $rma009 = DB::table('Tb_Insp_Funcionalidad_Equipos')->insert(array(
                'Laboratorio' => $request->input('Laboratorio'),
                'Fecha_Ejecucion' => $request->input('Fecha_Ejecucion'),
                'Nombre_Responsable' => $request->input('Nombre_Responsable'),
                'Cargo_Responsable' => $request->input('Cargo_Responsable'),
                'Funcionamiento_Equipo' => $request->input('Funcionamiento_Equipo'),
                'Estado_Entorno' => $request->input('Estado_Entorno'),
                'Estado_Accesorio_Consumibles' => $request->input('Estado_Accesorio_Consumibles'),
                'Estado_lineas_Alimentacion' => $request->input('Estado_lineas_Alimentacion'),
                'Estado_Almacenamiento' => $request->input('Estado_Almacenamiento'),
                'Documentacion_Presente' => $request->input('Documentacion_Presente') */
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
        $rma009 = Inspe_Funcionalidad::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($rma009);
        /* $rma009 = Inspe_Funcionalidad::find($id);
        if (is_object($rma009)) {
            $data = [

                $rma009,
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
                'Laboratorio' => 'required',
                'Fecha_Ejecucion' => 'required',
                'Nombre_Responsable' => 'required',
                'Cargo_Responsable' => 'required',
                'Funcionamiento_Equipo' => 'required',
                'Estado_Entorno' => 'required',
                'Estado_Accesorio_Consumibles' => 'required',
                'Estado_lineas_Alimentacion' => 'required',
                'Estado_Almacenamiento' => 'required',
                'Documentacion_Presente' => 'required',

            ]);

            $equipo = Inspe_Funcionalidad::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $rma009 = Inspe_Funcionalidad::find($id);

        if (!empty($rma009)) {
            # code...

            $rma009->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'rma009' => $rma009,
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