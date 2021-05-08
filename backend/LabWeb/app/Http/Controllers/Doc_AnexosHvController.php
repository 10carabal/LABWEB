<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Doc_AnexosHv;

class Doc_AnexosHvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $docanexoshv = Doc_AnexosHv::all()->toJson();
        return response($docanexoshv, 200)->header('Content-Type', 'application/json', );
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
                    'COPIA_REGISTRO_SANITARIO' => 'required',
                    'COPIA_REGISTRO_IMPORTACION' => 'required',
                    'COPIA_PMISO_COMERCIALIZACION' => 'required',
                    'COPIA_FACTURA' => 'required',
                    'COPIA_INGRESO_ALMACEN' => 'required',
                    'CP_RBO_SATISFACCION_PRESTADOR'  => 'required',
                    'CP_RBO_SATISFACCION_OPERADOR' => 'required',
                    'CAPACION_TEC_ASISTENCIAL' => 'required',
                    'HOJA_VIDA_PERSONAL_TECNICO' => 'required',
                    'GUIA_RAPIDA_OPERACION' => 'required',
                    'CERT_CALIB_VALID_CALPERSONAL' => 'required',
                    'RNES_FABRICANTE_CALIBRACION'  => 'required',
                    'RNES_FABRICANTE_ACEOS_CBLES' => 'required',
                    'PROTOCOLO_PROVEEDOR' => 'required',
                    'CRONOGRAMA_MANTENIMIENTO_T_G' => 'required'
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

                $docanexoshv = new Doc_AnexosHv();
                $docanexoshv->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $docanexoshv->COPIA_REGISTRO_SANITARIO = $params_array['COPIA_REGISTRO_SANITARIO'];
                $docanexoshv->COPIA_REGISTRO_IMPORTACION = $params_array['COPIA_REGISTRO_IMPORTACION'];
                $docanexoshv->COPIA_PMISO_COMERCIALIZACION = $params_array['COPIA_PMISO_COMERCIALIZACION'];
                $docanexoshv->COPIA_FACTURA = $params_array['COPIA_FACTURA'];
                $docanexoshv->COPIA_INGRESO_ALMACEN = $params_array['COPIA_INGRESO_ALMACEN'];
                $docanexoshv->CP_RBO_SATISFACCION_PRESTADOR = $params_array['CP_RBO_SATISFACCION_PRESTADOR'];
                $docanexoshv->CP_RBO_SATISFACCION_OPERADOR = $params_array['CP_RBO_SATISFACCION_OPERADOR'];
                $docanexoshv->CAPACION_TEC_ASISTENCIAL = $params_array['CAPACION_TEC_ASISTENCIAL'];
                $docanexoshv->HOJA_VIDA_PERSONAL_TECNICO = $params_array['HOJA_VIDA_PERSONAL_TECNICO'];
                $docanexoshv->GUIA_RAPIDA_OPERACION = $params_array['GUIA_RAPIDA_OPERACION'];
                $docanexoshv->CERT_CALIB_VALID_CALPERSONAL = $params_array['CERT_CALIB_VALID_CALPERSONAL'];
                $docanexoshv->RNES_FABRICANTE_CALIBRACION = $params_array['RNES_FABRICANTE_CALIBRACION'];
                $docanexoshv->RNES_FABRICANTE_ACEOS_CBLES = $params_array['RNES_FABRICANTE_ACEOS_CBLES'];
                $docanexoshv->PROTOCOLO_PROVEEDOR = $params_array['PROTOCOLO_PROVEEDOR'];
                $docanexoshv->CRONOGRAMA_MANTENIMIENTO_T_G = $params_array['CRONOGRAMA_MANTENIMIENTO_T_G'];



                $docanexoshv->save();


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
        /* $docanexoshv = DB::table('Tb_Docum_Anexos_HV')->insert(array(
            'COPIA_REGISTRO_SANITARIO' => $request->input('COPIA_REGISTRO_SANITARIO'),
            'COPIA_REGISTRO_IMPORTACION' => $request->input('COPIA_REGISTRO_IMPORTACION'),
            'COPIA_PMISO_COMERCIALIZACION' => $request->input('COPIA_PMISO_COMERCIALIZACION'),
            'COPIA_FACTURA' => $request->input('COPIA_FACTURA'),
            'COPIA_INGRESO_ALMACEN' => $request->input('COPIA_INGRESO_ALMACEN'),
            'CP_RBO_SATISFACCION_PRESTADOR' => $request->input('CP_RBO_SATISFACCION_PRESTADOR'),
            'CP_RBO_SATISFACCION_OPERADOR' => $request->input('CP_RBO_SATISFACCION_OPERADOR'),
            'CAPACION_TEC_ASISTENCIAL' => $request->input('CAPACION_TEC_ASISTENCIAL'),
            'HOJA_VIDA_PERSONAL_TECNICO' => $request->input('HOJA_VIDA_PERSONAL_TECNICO'),
            'CERT_CALIB_VALID_CALPERSONAL' => $request->input('CERT_CALIB_VALID_CALPERSONAL'),
            'RNES_FABRICANTE_CALIBRACION' => $request->input('RNES_FABRICANTE_CALIBRACION'),
            'GUIA_RAPIDA_OPERACION' => $request->input('GUIA_RAPIDA_OPERACION'),
            'RNES_FABRICANTE_ACEOS_CBLES' => $request->input('RNES_FABRICANTE_ACEOS_CBLES'),
            'PROTOCOLO_PROVEEDOR' => $request->input('PROTOCOLO_PROVEEDOR'),
            'CRONOGRAMA_MANTENIMIENTO_T_G' => $request->input('CRONOGRAMA_MANTENIMIENTO_T_G'),
            'OBSERVACIONES' => $request->input('OBSERVACIONES')

        ));
        */
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
        $anexos = Doc_AnexosHv::find($id);
        if (is_object($anexos)) {
            $data = [

                $anexos
            ];
        } else {
            $data = [
                'code' => 404,
                'mensaje' => "El equipo no existe"
            ];
        }

        return response()->json($data);
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
                'COPIA_REGISTRO_SANITARIO' => 'required',
                'COPIA_REGISTRO_IMPORTACION' => 'required',
                'COPIA_PMISO_COMERCIALIZACION' => 'required',
                'COPIA_FACTURA' => 'required',
                'COPIA_INGRESO_ALMACEN' => 'required',
                'CP_RBO_SATISFACCION_PRESTADOR'  => 'required',
                'CP_RBO_SATISFACCION_OPERADOR' => 'required',
                'CAPACION_TEC_ASISTENCIAL' => 'required',
                'HOJA_VIDA_PERSONAL_TECNICO' => 'required',
                'GUIA_RAPIDA_OPERACION' => 'required',
                'CERT_CALIB_VALID_CALPERSONAL' => 'required',
                'RNES_FABRICANTE_CALIBRACION'  => 'required',
                'RNES_FABRICANTE_ACEOS_CBLES' => 'required',
                'PROTOCOLO_PROVEEDOR' => 'required',
                'CRONOGRAMA_MANTENIMIENTO_T_G' => 'required'

            ]);



            $equipo = Doc_AnexosHv::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $anexos = Doc_AnexosHv::find($id);

        if (!empty($anexos)) {
            # code...


            $anexos->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'anexos' => $anexos
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