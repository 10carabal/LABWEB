<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Adq_Equipos;

class Adq_EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $compraequipos = Adq_Equipos::all()->toJson();
        return response($compraequipos, 200)->header('Content-Type', 'application/json', );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    { }

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
                    'FECHA_COMPRA' => 'required',
                    'FECHA_FABRICACION' => 'required',
                    'FECHA_INSTALACION' => 'required',
                    'FECHA_INICIO_OPERACION' => 'required',
                    'FORMA_ADQUISICION' => 'required',
                    'FECHA_ACTA_RECIBOS'  => 'required',
                    'ORDEN_DE_COMPRA' => 'required',
                    'FECHA_INGRESO_INVENTARIO' => 'required',
                    'EJECUTOR_HOJA_VIDA' => 'required',
                    'LIDER_PROCESO' => 'required'
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

                $compraequipos = new Adq_Equipos();
                $compraequipos->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $compraequipos->FECHA_COMPRA = $params_array['FECHA_COMPRA'];
                $compraequipos->FECHA_FABRICACION = $params_array['FECHA_FABRICACION'];
                $compraequipos->FECHA_INSTALACION = $params_array['FECHA_INSTALACION'];
                $compraequipos->FECHA_INICIO_OPERACION = $params_array['FECHA_INICIO_OPERACION'];
                $compraequipos->FORMA_ADQUISICION = $params_array['FORMA_ADQUISICION'];
                $compraequipos->FECHA_ACTA_RECIBOS = $params_array['FECHA_ACTA_RECIBOS'];
                $compraequipos->ORDEN_DE_COMPRA = $params_array['ORDEN_DE_COMPRA'];
                $compraequipos->FECHA_INGRESO_INVENTARIO = $params_array['FECHA_INGRESO_INVENTARIO'];
                $compraequipos->EJECUTOR_HOJA_VIDA = $params_array['EJECUTOR_HOJA_VIDA'];
                $compraequipos->LIDER_PROCESO = $params_array['LIDER_PROCESO'];




                $compraequipos->save();


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
        /* $comprarEquipo = DB::table('Tb_adquisicion_equipos')->insert(array(
            'FECHA_COMPRA' => $request->input('FECHA_COMPRA'),
            'FECHA_FABRICACION' => $request->input('FECHA_FABRICACION'),
            'FECHA_INSTALACION' => $request->input('FECHA_INSTALACION'),
            'FECHA_INICIO_OPERACION' => $request->input('FECHA_INICIO_OPERACION'),
            'COSTO_EQUIPO' => $request->input('COSTO_EQUIPO'),
            'FORMA_ADQUISICION' => $request->input('FORMA_ADQUISICION'),
            'FECHA_ACTA_RECIBOS' => $request->input('FECHA_ACTA_RECIBOS'),
            'GARANTIA_AÑOS' => $request->input('GARANTIA_AÑOS'),
            'ESTADO_GARANTIA' => $request->input('ESTADO_GARANTIA'),
            'FIN_GARANTIA' => $request->input('FIN_GARANTIA'),
            'ESTADO_ACTUAL' => $request->input('ESTADO_ACTUAL'),
            'AÑOS_USO' => $request->input('AÑOS_USO'),
            'FACTURA' => $request->input('FACTURA'),
            'ORDEN_DE_COMPRA' => $request->input('ORDEN_DE_COMPRA'),
            'VIDA_UTIL' => $request->input('VIDA_UTIL'),
            'RAZON_VIDA_UTIL' => $request->input('RAZON_VIDA_UTIL'),
            'FECHA_INGRESO_INVENTARIO' => $request->input('FECHA_INGRESO_INVENTARIO'),
            'EJECUTOR_HOJA_VIDA' => $request->input('EJECUTOR_HOJA_VIDA'),
            'LIDER_PROCESO' => $request->input('LIDER_PROCESO')
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
        $adquisicion = Adq_Equipos::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($adquisicion);

        /* $adquisicion = Adq_Equipos::find($id);
        if (is_object($adquisicion)) {
            $data = [

                $adquisicion
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
                'FECHA_COMPRA' => 'required',
                'FECHA_FABRICACION' => 'required',
                'FECHA_INSTALACION' => 'required',
                'FECHA_INICIO_OPERACION' => 'required',
                'FORMA_ADQUISICION' => 'required',
                'FECHA_ACTA_RECIBOS'  => 'required',
                'ORDEN_DE_COMPRA' => 'required',
                'FECHA_INGRESO_INVENTARIO' => 'required',
                'EJECUTOR_HOJA_VIDA' => 'required',
                'LIDER_PROCESO' => 'required'
            ]);



            $equipo = Adq_Equipos::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $adquisicion = Adq_Equipos::find($id);

        if (!empty($adquisicion)) {
            # code...


            $adquisicion->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'adquisicion' => $adquisicion
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