<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Info_Tecnica_Equipo;


class Info_Tecnica_EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $infotecnica = Info_Tecnica_Equipo::all()->toJson();
        return response($infotecnica, 200)->header('Content-Type', 'application/json', );


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
                    'Tipo_Equipo' => 'required',
                    'Firmware' => 'required',
                    'Software' => 'required',
                    'Codigo_ECRI' => 'required',
                    'Nomenclatura_Internacional' => 'required',
                    'Nomenclatura' => 'required',
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

                $Equipos = new Info_Tecnica_Equipo();
                $Equipos->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $Equipos->Codigo_ECRI = $params_array['Codigo_ECRI'];
                $Equipos->Nomenclatura_Internacional = $params_array['Nomenclatura_Internacional'];
                $Equipos->Nomenclatura = $params_array['Nomenclatura'];
                $Equipos->Tipo_Equipo = $params_array['Tipo_Equipo'];
                $Equipos->Firmware = $params_array['Firmware'];
                $Equipos->Software = $params_array['Software'];
                $Equipos->Rango_Voltaje = $params_array['Rango_Voltaje'];
                $Equipos->Corriente = $params_array['Corriente'];
                $Equipos->Potencia = $params_array['Potencia'];
                $Equipos->Frecuencia_HZ = $params_array['Frecuencia_HZ'];
                $Equipos->Dimensiones_CM = $params_array['Dimensiones_CM'];
                $Equipos->Presion = $params_array['Presion'];
                $Equipos->Temperatura = $params_array['Temperatura'];
                $Equipos->Peso_KGS = $params_array['Peso_KGS'];
                $Equipos->Humedad = $params_array['Humedad'];
                $Equipos->RPM = $params_array['RPM'];
                $Equipos->Descripcion_Equipo = $params_array['Descripcion_Equipo'];
                $Equipos->Otras_Recomendaciones = $params_array['Otras_Recomendaciones'];
                $Equipos->save();


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
        /* $Equipos = DB::table('Tb_Informacion_Tecnica_Equipo')->insert(array(
            'Codigo_ECRI' => $request->input('Codigo_ECRI'),
            'Nomenclatura_Internacional' => $request->input('Nomenclatura_Internacional'),
            'Nomenclatura' => $request->input('Nomenclatura'),
            'Tipo_Equipo' => $request->input('Tipo_Equipo'),
            'Firmware' => $request->input('Firmware'),
            'Software' => $request->input('Software'),
            'Rango_Voltaje' => $request->input('Rango_Voltaje'),
            'Corriente' => $request->input('Corriente'),
            'Potencia' => $request->input('Potencia'),
            'Frecuencia_(HZ)' => $request->input('Frecuencia_(HZ)'),
            'Dimensiones_(CM)' => $request->input('Dimensiones_(CM)'),
            'Presion' => $request->input('Presion'),
            'Temperatura' => $request->input('Temperatura'),
            'Peso_KGS' => $request->input('Peso_KGS'),
            'Humedad' => $request->input('Humedad'),
            'RPM' => $request->input('RPM'),
            'Descripcion_Equipo' => $request->input('Descripcion_Equipo'),
            'Otras_Recomendaciones' => $request->input('Otras_Recomendaciones')

        )); */
        return response()->json($data, $data['code']);

        //Recoger los datos por post

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnica = Info_Tecnica_Equipo::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($tecnica);
        /* $tecnica = Info_Tecnica_Equipo::find($id);
        if (is_object($tecnica)) {
            $data = [

                $tecnica
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
                'Codigo_ECRI' => 'required',
                'Nomenclatura_Internacional' => 'required',
                'Nomenclatura' => 'required',
                'Tipo_Equipo' => 'required',
                'Firmware' => 'required',
                'Software' => 'required',
                'Rango_Voltaje' => 'required',
                'Corriente' => 'required',
                'Potencia' => 'required',
                'Frecuencia_HZ' => 'required',
                'Dimensiones_CM' => 'required',
                'Presion' => 'required',
                'Temperatura' => 'required',
                'Peso_KGS' => 'required',
                'Humedad' => 'required',
                'RPM' => 'required',
                'Descripcion_Equipo' => 'required',
                'Otras_Recomendaciones' => 'required'

            ]);



            $equipo = Info_Tecnica_Equipo::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $tecnica = Info_Tecnica_Equipo::find($id);

        if (!empty($tecnica)) {
            # code...


            $tecnica->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'tecnica' => $tecnica
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