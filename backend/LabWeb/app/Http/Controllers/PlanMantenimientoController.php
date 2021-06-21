<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PlanMantenimiento;

use Carbon\Carbon;
use PDF;
class PlanMantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $planRma004 = PlanMantenimiento::all()->toJson();
        return response($planRma004, 200)->header('Content-Type', 'application/json', );
    }


    public static function getFormato()
    {

        $RMA004 = DB::table('Tb_Equipos')
            ->join('Tb_Cron_Plan_Mento_Equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Cron_Plan_Mento_Equipos.NUM_HOJA_VIDA')
            ->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Marca',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Serial',
                'Tb_Equipos.Activo_Fijo',
                'Tb_Equipos.Sub_Area',
                'Tb_Clasificacion_equipo.CLASIFICACION_RIESGO',
                'Tb_Cron_Plan_Mento_Equipos.RESPONSABLE_MANTENIMIENTO',
                'Tb_Cron_Plan_Mento_Equipos.FREC_MENTO_PREVENTIVO',
                'Tb_Cron_Plan_Mento_Equipos.FECHA_EJECUCION',
                'Tb_Cron_Plan_Mento_Equipos.ESTADO_EJECUCION',
                'Tb_Cron_Plan_Mento_Equipos.OBSERVACIONES_EQUIPO',
                'Tb_Cron_Plan_Mento_Equipos.COSTO_MANTENIMIENTO',
                'Tb_Cron_Plan_Mento_Equipos.Consecutivo_Orden',

            )
            ->get();

        return response()->json($RMA004);
    }

    public function NuevaFecha($id)
    {
        # code...
        $mesesletras = PlanMantenimiento::select(
            'FREC_MENTO_PREVENTIVO'
        )->where('NUM_HOJA_VIDA', '=', $id)

            ->get();

        $fechaejecucion = PlanMantenimiento::select(
            'FECHA_EJECUCION'
        )->where('NUM_HOJA_VIDA', '=', $id)

            ->get();
        $nummeses = substr($mesesletras, 27, 2);
        $fecha = substr($fechaejecucion, 21, 10);
        $fecha1 = date_create($fecha);

        $numdias = (int) $nummeses * 30;


        date_add($fecha1, date_interval_create_from_date_string($numdias . 'days'));

        return date_format($fecha1, "d-m-Y");

        //falta contador
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
                    'FREC_MENTO_PREVENTIVO' => 'required',
                    'FECHA_EJECUCION' => 'required',
                    'ESTADO_EJECUCION' => 'required',
                    'RESPONSABLE_MANTENIMIENTO' => 'required',
                    'OBSERVACIONES_EQUIPO' => 'required',
                    'COSTO_MANTENIMIENTO' => 'required',
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

                $planmantenimiento = new PlanMantenimiento();
                $planmantenimiento->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $planmantenimiento->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $planmantenimiento->FREC_MENTO_PREVENTIVO = $params_array['FREC_MENTO_PREVENTIVO'];
                $planmantenimiento->FECHA_EJECUCION = $params_array['FECHA_EJECUCION'];
                $planmantenimiento->ESTADO_EJECUCION = $params_array['ESTADO_EJECUCION'];
                $planmantenimiento->RESPONSABLE_MANTENIMIENTO = $params_array['RESPONSABLE_MANTENIMIENTO'];
                $planmantenimiento->OBSERVACIONES_EQUIPO = $params_array['OBSERVACIONES_EQUIPO'];
                $planmantenimiento->COSTO_MANTENIMIENTO = $params_array['COSTO_MANTENIMIENTO'];

                $planmantenimiento->save();


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
        $planmantenimiento = DB::table('Tb_Cron_Plan_Mento_Equipos')->insert(array(
            'FREC_MENTO_PREVENTIVO' => $request->input('FREC_MENTO_PREVENTIVO'),
            'FECHA_EJECUCION' => $request->input('FECHA_EJECUCION'),
            'ESTADO_EJECUCION' => $request->input('ESTADO_EJECUCION'),
            'RESPONSABLE_MANTENIMIENTO' => $request->input('RESPONSABLE_MANTENIMIENTO'),
            'OBSERVACIONES_EQUIPO' => $request->input('OBSERVACIONES_EQUIPO'),
            'COSTO_MANTENIMIENTO' => $request->input('COSTO_MANTENIMIENTO')
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
        $mante = PlanMantenimiento::where("NUM_HOJA_VIDA", "=", $id)->get();


        if(!empty(request()->download)){
            $download = request()->download;
            switch ($download) {
                case 'pdf':
                    $dataObject = $mante;
                    $pdf = PDF::loadView('pdf_templates.rma004', ["sheets" => $dataObject]);
                    return $pdf->download('plan_mantenimiento_'.Carbon::now()->format("Ymd_His").'.pdf');
                    break;
                case 'excel':

                    break;
                default:
                    # code...
                    break;
            }
        }
        return response()->json($mante);
        /* $mante = PlanMantenimiento::find($id);
        if (is_object($mante)) {
            $data = [

                $mante
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
                'FREC_MENTO_PREVENTIVO' => 'required',
                'FECHA_EJECUCION' => 'required',
                'FREC_MENTO_PREVENTIVO' => 'required',
                'ESTADO_EJECUCION' => 'required',
                'RESPONSABLE_MANTENIMIENTO' => 'required',
                'OBSERVACIONES_EQUIPO' => 'required',
                'COSTO_MANTENIMIENTO' => 'required',

            ]);



            $equipo = PlanMantenimiento::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $mantenimiento = PlanMantenimiento::find($id);

        if (!empty($mantenimiento)) {
            # code...


            $mantenimiento->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'mantenimiento' => $mantenimiento
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
