<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Doc_Proveedor;

class Doc_ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $docproveedor = Doc_Proveedor::all()->toJson();
        return response($docproveedor, 200)->header('Content-Type', 'application/json', );
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
                    'MANUAL_USUARIO' => 'required',
                    'MANUAL_SERVICIO' => 'required',
                    'GUIA_USO' => 'required',
                    'MANUAL_PARTES' => 'required',
                    'MANUAL_DESPIECE' => 'required',
                    'PLANOS'  => 'required',
                    'CARTA_GARANTIA' => 'required',
                    'REGISTRO_SANITARIO_PROVEEDOR' => 'required',
                    'DECLARACION_IMPORTACION' => 'required',
                    'CHECKLIST_FABRICACION' => 'required',
                    'HOJAS_VIDA_PERSONAL_TECNICO' => 'required',
                    'CRONOGRAMA_VISITAS'  => 'required',
                    'REPUESTOS_DISPONIBLES' => 'required',
                    'CERT_CALIB_VALID_CALPERSONAL' => 'required'
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

                $docproveedor = new Doc_Proveedor();
                $docproveedor->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $docproveedor->MANUAL_USUARIO = $params_array['MANUAL_USUARIO'];
                $docproveedor->MANUAL_SERVICIO = $params_array['MANUAL_SERVICIO'];
                $docproveedor->GUIA_USO = $params_array['GUIA_USO'];
                $docproveedor->MANUAL_PARTES = $params_array['MANUAL_PARTES'];
                $docproveedor->MANUAL_DESPIECE = $params_array['MANUAL_DESPIECE'];
                $docproveedor->PLANOS = $params_array['PLANOS'];
                $docproveedor->CARTA_GARANTIA = $params_array['CARTA_GARANTIA'];
                $docproveedor->REGISTRO_SANITARIO_PROVEEDOR = $params_array['REGISTRO_SANITARIO_PROVEEDOR'];
                $docproveedor->DECLARACION_IMPORTACION = $params_array['DECLARACION_IMPORTACION'];
                $docproveedor->CHECKLIST_FABRICACION = $params_array['CHECKLIST_FABRICACION'];
                $docproveedor->HOJAS_VIDA_PERSONAL_TECNICO = $params_array['HOJAS_VIDA_PERSONAL_TECNICO'];
                $docproveedor->CRONOGRAMA_VISITAS = $params_array['CRONOGRAMA_VISITAS'];
                $docproveedor->REPUESTOS_DISPONIBLES = $params_array['REPUESTOS_DISPONIBLES'];
                $docproveedor->CERT_CALIB_VALID_CALPERSONAL = $params_array['CERT_CALIB_VALID_CALPERSONAL'];



                $docproveedor->save();


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
        /* $docproveedor = DB::table('Tb_Documentacion_Proveedor')->insert(array(
            'MANUAL_USUARIO' => $request->input('MANUAL_USUARIO'),
            'MANUAL_SERVICIO' => $request->input('MANUAL_SERVICIO'),
            'GUIA_USO' => $request->input('GUIA_USO'),
            'MANUAL_PARTES' => $request->input('MANUAL_PARTES'),
            'MANUAL_DESPIECE' => $request->input('MANUAL_DESPIECE'),
            'PLANOS' => $request->input('PLANOS'),
            'CARTA_GARANTIA' => $request->input('CARTA_GARANTIA'),
            'REGISTRO_SANITARIO_PROVEEDOR' => $request->input('REGISTRO_SANITARIO_PROVEEDOR'),
            'DECLARACION_IMPORTACION' => $request->input('DECLARACION_IMPORTACION'),
            'CHECKLIST_FABRICACION' => $request->input('CHECKLIST_FABRICACION'),
            'HOJAS_VIDA_PERSONAL_TECNICO' => $request->input('HOJAS_VIDA_PERSONAL_TECNICO'),
            'CRONOGRAMA_VISITAS' => $request->input('CRONOGRAMA_VISITAS'),
            'REPUESTOS_DISPONIBLES' => $request->input('REPUESTOS_DISPONIBLES'),
            'CERT_CALIB_VALID_CALPERSONAL' => $request->input('CERT_CALIB_VALID_CALPERSONAL')
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
        $proveedor = Doc_Proveedor::find($id);
        if (is_object($proveedor)) {
            $data = [

                $proveedor
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
                'MANUAL_USUARIO' => 'required',
                'MANUAL_SERVICIO' => 'required',
                'GUIA_USO' => 'required',
                'MANUAL_PARTES' => 'required',
                'MANUAL_DESPIECE' => 'required',
                'PLANOS'  => 'required',
                'CARTA_GARANTIA' => 'required',
                'REGISTRO_SANITARIO_PROVEEDOR' => 'required',
                'DECLARACION_IMPORTACION' => 'required',
                'CHECKLIST_FABRICACION' => 'required',
                'HOJAS_VIDA_PERSONAL_TECNICO' => 'required',
                'CRONOGRAMA_VISITAS'  => 'required',
                'REPUESTOS_DISPONIBLES' => 'required',
                'CERT_CALIB_VALID_CALPERSONAL' => 'required'

            ]);



            $equipo = Doc_Proveedor::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $docproveedor = Doc_Proveedor::find($id);

        if (!empty($docproveedor)) {
            # code...


            $docproveedor->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'docproveedor' => $docproveedor
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