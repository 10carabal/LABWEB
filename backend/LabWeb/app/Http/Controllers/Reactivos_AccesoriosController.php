<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Reactivos_Accesorios;

class Reactivos_AccesoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $reactivosA = Reactivos_Accesorios::all()->toJson();
        return response($reactivosA, 200)->header('Content-Type', 'application/json', );
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
                    'LISTADO_REACTIVOS' => 'required',
                    'ACCESORIO_1' => 'required',
                    'MARCA_LICENCIA_ACCESORIO_1' => 'required',
                    'MODELO_VERSION_ACCESORIO_1' => 'required',
                    'SERIE_ACCESORIO_1'  => 'required'
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

                $reactivos = new Reactivos_Accesorios();
                $reactivos->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $reactivos->LISTADO_REACTIVOS = $params_array['LISTADO_REACTIVOS'];
                $reactivos->ACCESORIO_1 = $params_array['ACCESORIO_1'];
                $reactivos->MARCA_LICENCIA_ACCESORIO_1 = $params_array['MARCA_LICENCIA_ACCESORIO_1'];
                $reactivos->MODELO_VERSION_ACCESORIO_1 = $params_array['MODELO_VERSION_ACCESORIO_1'];
                $reactivos->SERIE_ACCESORIO_1 = $params_array['SERIE_ACCESORIO_1'];
                $reactivos->save();


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
        /* $reactivos = DB::table('Tb_Reactivos_Accesorios')->insert(array(
            'LISTADO_REACTIVOS' => $request->input('LISTADO_REACTIVOS'),
            'ACCESORIO_1' => $request->input('ACCESORIO_1'),
            'MARCA_LICENCIA_ACCESORIO_1' => $request->input('MARCA_LICENCIA_ACCESORIO_1'),
            'MODELO_VERSION_ACCESORIO_1' => $request->input('MODELO_VERSION_ACCESORIO_1'),
            'SERIE_ACCESORIO_1' => $request->input('SERIE_ACCESORIO_1'),
            'ACCESORIO_2' => $request->input('ACCESORIO_2'),
            'MARCA_LICENCIA_ACCESORIO_2' => $request->input('MARCA_LICENCIA_ACCESORIO_2'),
            'MODELO_VERSION_ACCESORIO_2' => $request->input('MODELO_VERSION_ACCESORIO_2'),
            'SERIE_ACCESORIO_2' => $request->input('SERIE_ACCESORIO_2'),
            'ACCESORIO_3' => $request->input('ACCESORIO_3'),
            'MARCA_LICENCIA_ACCESORIO_3' => $request->input('MARCA_LICENCIA_ACCESORIO_3'),
            'MODELO_VERSION_ACCESORIO_3' => $request->input('MODELO_VERSION_ACCESORIO_3'),
            'SERIE_ACCESORIO_3' => $request->input('SERIE_ACCESORIO_3'),

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
        $reactivos = Reactivos_Accesorios::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($reactivos);
        /* $reactivos = Reactivos_Accesorios::find($id);
        if (is_object($reactivos)) {
            $data = [

                $reactivos
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
                'LISTADO_REACTIVOS' => 'required',
                'ACCESORIO_1' => 'required',
                'MARCA_LICENCIA_ACCESORIO_1' => 'required',
                'MODELO_VERSION_ACCESORIO_1' => 'required',
                'SERIE_ACCESORIO_1'  => 'required'

            ]);



            $equipo = Reactivos_Accesorios::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $reactivos = Reactivos_Accesorios::find($id);

        if (!empty($reactivos)) {
            # code...


            $reactivos->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'reactivos' => $reactivos
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