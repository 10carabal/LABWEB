<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Func_Equipos;


class Func_EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $funcionalidad = Func_Equipos::all()->toJson();
        return response($funcionalidad, 200)->header('Content-Type', 'application/json', );


        /* $noticias = Noticias::all();
        //print_r($noticias);
        return response()->json($noticias,200);
 */
        //print_r(Noticias::all());

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
                    'Estado_Accesorio_Consumibles'  => 'required',
                    'Estado_lineas_Alimentacion' => 'required',
                    'Estado_Almacenamiento' => 'required',
                    'Documentacion_Presente' => 'required'
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

                $funcionalidad = new Func_Equipos();
                $funcionalidad->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $funcionalidad->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $funcionalidad->Laboratorio = $params_array['Laboratorio'];
                $funcionalidad->Fecha_Ejecucion = $params_array['Fecha_Ejecucion'];
                $funcionalidad->Nombre_Responsable = $params_array['Nombre_Responsable'];
                $funcionalidad->Cargo_Responsable = $params_array['Cargo_Responsable'];
                $funcionalidad->Funcionamiento_Equipo = $params_array['Funcionamiento_Equipo'];
                $funcionalidad->Estado_Entorno = $params_array['Estado_Entorno'];
                $funcionalidad->Estado_Accesorio_Consumibles = $params_array['Estado_Accesorio_Consumibles'];
                $funcionalidad->Estado_lineas_Alimentacion = $params_array['Estado_lineas_Alimentacion'];
                $funcionalidad->Estado_Almacenamiento = $params_array['Estado_Almacenamiento'];
                $funcionalidad->Documentacion_Presente = $params_array['Documentacion_Presente'];




                $funcionalidad->save();


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
        /* $funcionalidad = DB::table('Tb_Insp_Funcionalidad_Equipos')->insert(array(
            'Laboratorio' => $request->input('Laboratorio'),
            'Fecha_Ejecucion' => $request->input('Fecha_Ejecucion'),
            'Nombre_Responsable' => $request->input('Nombre_Responsable'),
            'Cargo_Responsable' => $request->input('Cargo_Responsable'),
            'Funcionamiento_Equipo' => $request->input('Funcionamiento_Equipo'),
            'Estado_Entorno' => $request->input('Estado_Entorno'),
            'Estado_Accesorio_Consumibles' => $request->input('Estado_Accesorio_Consumibles'),
            'Estado_lineas_Alimentacion' => $request->input('Estado_lineas_Alimentacion'),
            'Estado_Almacenamiento' => $request->input('Estado_Almacenamiento'),
            'Documentacion_Presente' => $request->input('Documentacion_Presente')
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
        $funcionalidad = Func_Equipos::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($funcionalidad);
        /* $funcionalidad = Func_Equipos::find($id);
        if (is_object($funcionalidad)) {
            $data = [

                $funcionalidad
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
                'Laboratorio' => 'required',
                'Nombre_Responsable' => 'required',
                'Cargo_Responsable' => 'required',
                'Funcionamiento_Equipo' => 'required',
                'Estado_Entorno' => 'required',
                'Estado_Accesorio_Consumibles'  => 'required',
                'Estado_lineas_Alimentacion' => 'required',
                'Estado_Almacenamiento' => 'required',
                'Documentacion_Presente' => 'required'

            ]);



            $equipo = Func_Equipos::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $funcionalidad = Func_Equipos::find($id);

        if (!empty($funcionalidad)) {
            # code...


            $funcionalidad->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'funcionalidad' => $funcionalidad
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