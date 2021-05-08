<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Fabricantes_Proveedores;

class Fabricantes_ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fabricantesproveedores = Fabricantes_Proveedores::all()->toJson();
        return response($fabricantesproveedores, 200)->header('Content-Type', 'application/json', );
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
                    'FABRICANTE' => 'required',
                    'PAIS_ORIGEN' => 'required',
                    'WEB_FABRICANTE' => 'required',
                    'REPRESENTANTE' => 'required',
                    'PROVEEDOR' => 'required',
                    'CIUDAD_PROVEEDOR' => 'required',
                    'DIRECCION_PROVEEDOR' => 'required',
                    'TELEFONO_PROVEEDOR' => 'required',
                    'CORREO_PROVEEDOR' => 'required',
                    'WEB_PROVEEDOR' => 'required'
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

                $fabricantesproveedores = new Fabricantes_Proveedores();
                $fabricantesproveedores->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $fabricantesproveedores->FABRICANTE = $params_array['FABRICANTE'];
                $fabricantesproveedores->PAIS_ORIGEN = $params_array['PAIS_ORIGEN'];
                $fabricantesproveedores->WEB_FABRICANTE = $params_array['WEB_FABRICANTE'];
                $fabricantesproveedores->REPRESENTANTE = $params_array['REPRESENTANTE'];
                $fabricantesproveedores->PROVEEDOR = $params_array['PROVEEDOR'];
                $fabricantesproveedores->CIUDAD_PROVEEDOR = $params_array['CIUDAD_PROVEEDOR'];
                $fabricantesproveedores->DIRECCION_PROVEEDOR = $params_array['DIRECCION_PROVEEDOR'];
                $fabricantesproveedores->TELEFONO_PROVEEDOR = $params_array['TELEFONO_PROVEEDOR'];
                $fabricantesproveedores->CORREO_PROVEEDOR = $params_array['CORREO_PROVEEDOR'];
                $fabricantesproveedores->WEB_PROVEEDOR = $params_array['WEB_PROVEEDOR'];
                $fabricantesproveedores->save();


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
        /* $fabricantesproveedores = DB::table('Tb_Fabricantes_Proveedores')->insert(array(
            'FABRICANTE' => $request->input('FABRICANTE'),
            'PAIS_ORIGEN' => $request->input('PAIS_ORIGEN'),
            'WEB_FABRICANTE' => $request->input('WEB_FABRICANTE'),
            'REPRESENTANTE' => $request->input('REPRESENTANTE'),
            'PROVEEDOR' => $request->input('PROVEEDOR'),
            'CIUDAD_PROVEEDOR' => $request->input('CIUDAD_PROVEEDOR'),
            'DIRECCION_PROVEEDOR' => $request->input('DIRECCION_PROVEEDOR'),
            'TELEFONO_PROVEEDOR' => $request->input('TELEFONO_PROVEEDOR'),
            'CORREO_PROVEEDOR' => $request->input('CORREO_PROVEEDOR'),
            'WEB_PROVEEDOR' => $request->input('WEB_PROVEEDOR')
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
        $fabricantes = Fabricantes_Proveedores::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($fabricantes);
        /* $fabricantes = Fabricantes_Proveedores::find($id);
        if (is_object($fabricantes)) {
            $data = [

                $fabricantes
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
                'FABRICANTE' => 'required',
                'PAIS_ORIGEN' => 'required',
                'WEB_FABRICANTE' => 'required',
                'REPRESENTANTE' => 'required',
                'PROVEEDOR' => 'required',
                'CIUDAD_PROVEEDOR' => 'required',
                'DIRECCION_PROVEEDOR' => 'required',
                'TELEFONO_PROVEEDOR' => 'required',
                'CORREO_PROVEEDOR' => 'required',
                'WEB_PROVEEDOR' => 'required'
            ]);



            $equipo = Fabricantes_Proveedores::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $fabricantes = Fabricantes_Proveedores::find($id);

        if (!empty($fabricantes)) {
            # code...


            $fabricantes->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'fabricantes' => $fabricantes
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