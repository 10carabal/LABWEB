<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\InformeServicio;


class InformeServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $informeservicio = InformeServicio::all()->toJson();
        return response($informeservicio, 200)->header('Content-Type', 'application/json', );


        /* $noticias = Noticias::all();
        //print_r($noticias);
        return response()->json($noticias,200);
 */
        //print_r(Noticias::all());

    }

    public static function getFormato($id)
    {

        $rma008 = DB::table('Tb_Equipos')
            ->join('Tb_Informe_Servicio_Tecnico', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informe_Servicio_Tecnico.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informe_Servicio_Tecnico.Consecutivo_Orden',
                'Tb_Informe_Servicio_Tecnico.Fecha_Informe',
                'Tb_Informe_Servicio_Tecnico.Ubicacion',
                'Tb_Equipos.Marca',
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Serial',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Activo_Fijo',
                'Tb_Informe_Servicio_Tecnico.Problema_Detectado',
                //Correctivo /uso manipulacion
                'Tb_Informe_Servicio_Tecnico.Actividades_Realizadas',
                'Tb_Informe_Servicio_Tecnico.Observaciones',
                //AREA TECNICA
                'Tb_Informe_Servicio_Tecnico.Nombre_Responsable',
                'Tb_Informe_Servicio_Tecnico.Cargo_Responsable',
                //AREA ASISTENCIAL O ADMINISTRATIVA
                'Tb_Informe_Servicio_Tecnico.Nombre_Responsable_Recibir',
                'Tb_Informe_Servicio_Tecnico.Cargo_Responsable_Recibir'

            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', $id)

            ->get();

        return response()->json($rma008);
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
                    'Codigo_Prestador' => 'required',
                    'Servicio' => 'required',
                    'Ubicacion' => 'required',
                    'Fecha_Informe' => 'required',
                    'Problema_Detectado' => 'required',
                    'Nombre_Responsable' => 'required',
                    'Cargo_Responsable' => 'required',
                    'Nombre_Responsable_Recibir' => 'required',
                    'Cargo_Responsable_Recibir' => 'required',
                    'Actividades_Realizadas' => 'required',
                    'Repuestos_Instalados' => 'required',
                    'Accesorios_Instalados' => 'required',
                    'Insumos_Instalados' => 'required',
                    'Mediciones' => 'required',
                    'Observaciones' => 'required',
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

                $rma008 = new InformeServicio();
                $rma008->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $rma008->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $rma008->Codigo_Prestador = $params_array['Codigo_Prestador'];
                $rma008->Servicio = $params_array['Servicio'];
                $rma008->Ubicacion = $params_array['Ubicacion'];
                $rma008->Fecha_Informe = $params_array['Fecha_Informe'];
                $rma008->Problema_Detectado = $params_array['Problema_Detectado'];
                $rma008->Nombre_Responsable = $params_array['Nombre_Responsable'];
                $rma008->Cargo_Responsable = $params_array['Cargo_Responsable'];
                $rma008->Nombre_Responsable_Recibir = $params_array['Nombre_Responsable_Recibir'];
                $rma008->Cargo_Responsable_Recibir = $params_array['Cargo_Responsable_Recibir'];
                $rma008->Actividades_Realizadas = $params_array['Actividades_Realizadas'];
                $rma008->Repuestos_Instalados = $params_array['Repuestos_Instalados'];
                $rma008->Accesorios_Instalados = $params_array['Accesorios_Instalados'];
                $rma008->Insumos_Instalados = $params_array['Insumos_Instalados'];
                $rma008->Mediciones = $params_array['Mediciones'];
                $rma008->Observaciones = $params_array['Observaciones'];



                $rma008->save();


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
        /* $rma008 = DB::table('Tb_Informe_Servicio_Tecnico')->insert(array(
                'Codigo_Prestador' => $request->input('Codigo_Prestador'),
                'Servicio' => $request->input('Servicio'),
                'Ubicacion' => $request->input('Ubicacion'),
                'Fecha_Informe' => $request->input('Fecha_Informe'),
                'Problema_Detectado' => $request->input('Problema_Detectado'),
                'Actividades_Realizadas' => $request->input('Actividades_Realizadas'),
                'Repuestos_Instalados' => $request->input('Repuestos_Instalados'),
                'Accesorios_Instalados' => $request->input('Accesorios_Instalados'),
                'Insumos_Instalados' => $request->input('Insumos_Instalados'),
                'Mediciones' => $request->input('Mediciones'),
                'Observaciones' => $request->input('Observaciones'),
                'Nombre_Responsable' => $request->input('Nombre_Responsable'),
                'Cargo_Responsable' => $request->input('Cargo_Responsable'),
                'Nombre_Responsable_Recibir' => $request->input('Nombre_Responsable_Recibir'),
                'Cargo_Responsable_Recibir' => $request->input('Cargo_Responsable_Recibir'),

            )) */
        return response()->json($data, $data['code']);
    }
    //Recoger los datos por post



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rma008 = InformeServicio::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($rma008);
        /* $rma008 = InformeServicio::find($id);
        if (is_object($rma008)) {
            $data = [

                $rma008,
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
                'Codigo_Prestador' => 'required',
                'Servicio' => 'required',
                'Ubicacion' => 'required',
                'Fecha_Informe' => 'required',
                'Problema_Detectado' => 'required',
                'Nombre_Responsable' => 'required',
                'Cargo_Responsable' => 'required',
                'Nombre_Responsable_Recibir' => 'required',
                'Cargo_Responsable_Recibir' => 'required',
                'Actividades_Realizadas' => 'required',
                'Repuestos_Instalados' => 'required',
                'Accesorios_Instalados' => 'required',
                'Insumos_Instalados' => 'required',
                'Mediciones' => 'required',
                'Observaciones' => 'required',

            ]);

            $equipo = InformeServicio::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $rma008 = InformeServicio::find($id);

        if (!empty($rma008)) {
            # code...

            $rma008->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'rma008' => $rma008,
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