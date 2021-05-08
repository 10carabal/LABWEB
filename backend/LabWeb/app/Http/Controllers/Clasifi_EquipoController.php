<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Clasifi_Equipo;


class Clasifi_EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clasificacion = Clasifi_Equipo::all()->toJson();
        return response($clasificacion, 200)->header('Content-Type', 'application/json', );


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
                    'CLASIFICACION_DE_EQUIPO' => 'required',
                    'CLASIFICACION_USO' => 'required',
                    'CLASIFICACION_BIOMEDICA' => 'required',
                    'TECNOLOGIA_PREDOMINANTE' => 'required',
                    'CLASIFICACION_RIESGO' => 'required',
                    'CLASES_SOFTWARE'  => 'required',
                    'FUENTES_ALIMENTACION' => 'required',
                    'CICLO_MANTENIMIENTO' => 'required',
                    'CICLO_CALIB_VALID_CALPERSONAL' => 'required'


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

                $clasificacionEquipo = new Clasifi_Equipo();
                $clasificacionEquipo->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $clasificacionEquipo->CLASIFICACION_DE_EQUIPO = $params_array['CLASIFICACION_DE_EQUIPO'];
                $clasificacionEquipo->CLASIFICACION_USO = $params_array['CLASIFICACION_USO'];
                $clasificacionEquipo->CLASIFICACION_BIOMEDICA = $params_array['CLASIFICACION_BIOMEDICA'];
                $clasificacionEquipo->TECNOLOGIA_PREDOMINANTE = $params_array['TECNOLOGIA_PREDOMINANTE'];
                $clasificacionEquipo->CLASIFICACION_RIESGO = $params_array['CLASIFICACION_RIESGO'];
                $clasificacionEquipo->CLASES_SOFTWARE = $params_array['CLASES_SOFTWARE'];
                $clasificacionEquipo->FUENTES_ALIMENTACION = $params_array['FUENTES_ALIMENTACION'];
                $clasificacionEquipo->CICLO_MANTENIMIENTO = $params_array['CICLO_MANTENIMIENTO'];
                $clasificacionEquipo->CICLO_CALIB_VALID_CALPERSONAL = $params_array['CICLO_CALIB_VALID_CALPERSONAL'];




                $clasificacionEquipo->save();


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
        $clasificacionEquipo = DB::table('Tb_Clasificacion_equipo')->insert(array(
            'CLASIFICACIÓN_DE_EQUIPO' => $request->input('CLASIFICACIÓN_DE_EQUIPO'),
            'CLASIFICACION_USO' => $request->input('CLASIFICACION_USO'),
            'CLASIFICACION_BIOMEDICA' => $request->input('CLASIFICACION_BIOMEDICA'),
            'TECNOLOGIA_PREDOMINANTE' => $request->input('TECNOLOGIA_PREDOMINANTE'),
            'CLASIFICACION_RIESGO' => $request->input('CLASIFICACION_RIESGO'),
            'CLASE_RIESGO_ELECTRICO' => $request->input('CLASE_RIESGO_ELECTRICO'),
            'TIPO_RIESGO_ELECTRICO' => $request->input('TIPO_RIESGO_ELECTRICO'),
            'CLASES_SOFTWARE' => $request->input('CLASES_SOFTWARE'),
            'COMPLEJIDAD_TECNOLOGICA_EQUIPO' => $request->input('COMPLEJIDAD_TECNOLOGICA_EQUIPO'),
            'FUENTES_ALIMENTACION' => $request->input('FUENTES_ALIMENTACION'),
            'CICLO_MANTENIMIENTO' => $request->input('CICLO_MANTENIMIENTO')
        ));
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
        $clasificacion = Clasifi_Equipo::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($clasificacion);

        /* $clasificacion = Clasifi_Equipo::find($id);
        if (is_object($clasificacion)) {
            $data = [

                $clasificacion
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
                'CLASIFICACION_DE_EQUIPO' => 'required',
                'CLASIFICACION_USO' => 'required',
                'CLASIFICACION_BIOMEDICA' => 'required',
                'TECNOLOGIA_PREDOMINANTE' => 'required',
                'CLASIFICACION_RIESGO' => 'required',
                'CLASES_SOFTWARE'  => 'required',
                'FUENTES_ALIMENTACION' => 'required',
                'CICLO_MANTENIMIENTO' => 'required',
                'CICLO_CALIB_VALID_CALPERSONAL' => 'required'
            ]);



            $equipo = Clasifi_Equipo::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $clasificacion = Clasifi_Equipo::find($id);

        if (!empty($clasificacion)) {
            # code...


            $clasificacion->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'clasificacion' => $clasificacion
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