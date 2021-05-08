<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Hist_Solicitudes_Equipos;


class Hist_Solicitudes_EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $HistoricoS = Hist_Solicitudes_Equipos::all()->toJson();
        return response($HistoricoS, 200)->header('Content-Type', 'application/json', );
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
                    'Tipo_Servicio' => 'required',
                    'HH' => 'required',
                    'HP' => 'required'
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

                $historicosolicitudes = new Hist_Solicitudes_Equipos();
                $historicosolicitudes->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $historicosolicitudes->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $historicosolicitudes->Tipo_Servicio = $params_array['Tipo_Servicio'];
                $historicosolicitudes->HH = $params_array['HH'];
                $historicosolicitudes->HP = $params_array['HP'];

                $historicosolicitudes->save();


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
        /* $historicosolicitudes = DB::table('Tb_Hist_Solicitudes_Equipo')->insert(array(
            'Tipo_Servicio' => $request->input('Tipo_Servicio'),
            'Fecha' => $request->input('Fecha'),
            'Costo' => $request->input('Costo'),
            'Repuestos' => $request->input('Repuestos'),
            'HH' => $request->input('HH'),
            'HP' => $request->input('HP'),
            'Observaciones' => $request->input('Observaciones'),
            'Nombre_Responsable' => $request->input('Nombre_Responsable'),
            'Cargo_Responsable' => $request->input('Cargo_Responsable'),
            'Nombre_Responsable_Reporte' => $request->input('Nombre_Responsable_Reporte')
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
        $historico = Hist_Solicitudes_Equipos::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($historico);
        /* $historico = Hist_Solicitudes_Equipos::find($id);
        if (is_object($historico)) {
            $data = [

                $historico
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
                'Tipo_Servicio' => 'required',
                'HH' => 'required',
                'HP' => 'required'

            ]);



            $equipo = Hist_Solicitudes_Equipos::where('NUM_HOJA_VIDA', $id)->update($params_array);

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
        $historico = Hist_Solicitudes_Equipos::find($id);

        if (!empty($historico)) {
            # code...


            $historico->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'historico' => $historico
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