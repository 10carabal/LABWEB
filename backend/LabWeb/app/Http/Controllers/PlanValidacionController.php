<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PlanValidacion;
use PDF;
use Carbon\Carbon;
class PlanValidacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $plan5 = PlanValidacion::all()->toJson();
        return response($plan5, 200)->header('Content-Type', 'application/json', );
    }


    public static function getFormato()
    {

        $RMA005 = DB::table('Tb_Equipos')
            ->join('Tb_Plan_Validacion', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Plan_Validacion.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Marca',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Activo_Fijo',
                'Tb_Equipos.Serial',
                'Tb_Equipos.Sub_Area',
                'Tb_Plan_Validacion.FCIA_VACION_CALIB',
                'Tb_Plan_Validacion.FECHA_EJECUCION',
                'Tb_Plan_Validacion.ESTADO_EJECUCION',
                'Tb_Plan_Validacion.OBSERVACIONES_EQUIPO',
                'Tb_Plan_Validacion.Consecutivo_Orden',

            )
            ->get();

        return response()->json($RMA005);
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
                    'FCIA_VACION_CALIB' => 'required',
                    'FECHA_EJECUCION' => 'required',
                    'ESTADO_EJECUCION' => 'required',
                    'OBSERVACIONES_EQUIPO' => 'required',

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

                $planvalidacion = new PlanValidacion();
                $planvalidacion->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $planvalidacion->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $planvalidacion->FCIA_VACION_CALIB = $params_array['FCIA_VACION_CALIB'];
                $planvalidacion->FECHA_EJECUCION = $params_array['FECHA_EJECUCION'];
                $planvalidacion->ESTADO_EJECUCION = $params_array['ESTADO_EJECUCION'];
                $planvalidacion->OBSERVACIONES_EQUIPO = $params_array['OBSERVACIONES_EQUIPO'];

                $planvalidacion->save();


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
        $planvalidacion = DB::table('Tb_Plan_Validacion')->insert(array(
            'FCIA_VACION_CALIB' => $request->input('FCIA_VACION_CALIB'),
            'FECHA_EJECUCION' => $request->input('FECHA_EJECUCION'),
            'ESTADO_EJECUCION' => $request->input('ESTADO_EJECUCION'),
            'OBSERVACIONES_EQUIPO' => $request->input('OBSERVACIONES_EQUIPO')
        )); */
        return response()->json($data, $data['code']);
    }
    public function NuevaFecha($id)
    {
        # code...
        $mesesletras = PlanValidacion::select(
            'FCIA_VACION_CALIB'
        )->where('NUM_HOJA_VIDA', '=', $id)
            ->get();

        $fechaejecucion = PlanValidacion::select(
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validacion = PlanValidacion::where("NUM_HOJA_VIDA", "=", $id)->get();
        if(!empty(request()->download)){
            $download = request()->download;
            switch ($download) {
                case 'pdf':
                    $dataObject = $validacion;
                    $pdf = PDF::loadView('pdf_templates.rma005', ["sheets" => $dataObject]);
                    return $pdf->download('plan_validacion_'.Carbon::now()->format("Ymd_His").'.pdf');
                    break;
                case 'excel':

                    break;
                default:
                    # code...
                    break;
            }
        }
        return response()->json($validacion);
        /* $validacion = PlanValidacion::find($id);
        if (is_object($validacion)) {
            $data = [

                $validacion
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
                'FCIA_VACION_CALIB' => 'required',
                'FECHA_EJECUCION' => 'required',
                'ESTADO_EJECUCION' => 'required',
                'OBSERVACIONES_EQUIPO' => 'required',

            ]);



            $equipo = PlanValidacion::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
                    'mensaje' => "No has enviado ningún dato.",
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
                'mensaje' => "Numero de hoja de vida no existe."
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
        $validacion = PlanValidacion::find($id);

        if (!empty($validacion)) {
            # code...


            $validacion->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'validacion' => $validacion
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

/* TB_DOC_PROVEEDOR_TB_EQUIPOS_FK
TB_ADQ_EQUIPOS_TB_EQUIPOS_FK
TB_CLASI_EQUIPO_TB_EQUIPOS_FK
TB_PLAN_MENTO_EQUIPOS_FK
TB_DOCUM_ANEXOS_HV_EQUIPOS_FK
TB_DOC_PROVEEDOR_TB_EQUIPOS_FK
TB_FABRICANTES_PROV_EQUIPOS_FK
TB_HIST_SOLICITUDES_EQUIPOS_FK
TB_INFO_INSTITUCION_EQUIPOS_FK
TB_INFO_TECNICA_TB_EQUIPOS_FK
TB_INFORME_MENTO_EQUIPOS_FK
TB_INFORME_SERV_TEC_EQUIPOS_FK
TB_INS_FUNC_EQUIPOS_EQUIPOS_FK
TB_MENTO_EQUIPOS_TB_EQUIPOS_FK
TB_MATRIZ_SEGTO_EQUIPOS_FK
TB_OBSERVACION_ADIC_EQUIPOS_FK
TB_PLAN_VALIDACION_EQUIPOS_FK
TB_REACTIVOS_ACCIOS_EQUIPOS_FK

TB_PLAN_MENTO_SOLICITUD_FK
TB_H_SOLICITUDES_SOLICITUD_FK
TB_INFORME_MENTO_SOLICITUD_FK
TB_INFORME_SER_TE_SOLICITUD_FK
TB_INS_FUN_EQUIPO_SOLICITUD_FK
TB_MATRIZ_SEGTO_SOLICITUD_FK
TB_PLAN_VALIDACIN_SOLICITUD_FK
TB_RMA002_TB_EQUIPOS_FK
TB_SOLICITUD_TB_EQUIPOS_FK */
