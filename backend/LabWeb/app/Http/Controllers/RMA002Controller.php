<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RMA002;
use PDF;

class RMA002Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infoformato = RMA002::all()->toJson();
        return response($infoformato, 200)->header('Content-Type', 'application/json', );
    }

    public function getFormato($id)
    {
        $guiarapida = DB::table('Tb_Equipos')
            ->join('Tb_Mantenimiento_Equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Mantenimiento_Equipos.NUM_HOJA_VIDA')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->join('Tb_RMA002', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_RMA002.NUM_HOJA_VIDA')
            ->select(
                'Tb_RMA002.NUM_HOJA_VIDA',
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Sub_Area',
                'Tb_Informacion_Tecnica_Equipo.Nomenclatura',
                //DATOS DEL EQUIPO
                'Tb_Equipos.Marca',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Serial',
                'Tb_Equipos.Activo_Fijo',
                //PARTES DEL EQUIPO
                'Tb_RMA002.PARTES_EQUIPO',
                'Tb_RMA002.ACCESORIOS_EQUIPO',
                'Tb_RMA002.TECNOVIGILANCIA',
                'Tb_RMA002.ANTES_USO',
                'Tb_RMA002.DESPUES_USO'

            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', $id)

            ->get();

        return response()->json($guiarapida);
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
                    'PARTES_EQUIPO' => 'required',
                    'ACCESORIOS_EQUIPO' => 'required',
                    'TECNOVIGILANCIA' => 'required',
                    'ANTES_USO' => 'required',
                    'DESPUES_USO' => 'required'
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

                $rma002 = new RMA002();
                $rma002->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $rma002->PARTES_EQUIPO = $params_array['PARTES_EQUIPO'];
                $rma002->ACCESORIOS_EQUIPO = $params_array['ACCESORIOS_EQUIPO'];
                $rma002->TECNOVIGILANCIA = $params_array['TECNOVIGILANCIA'];
                $rma002->ANTES_USO = $params_array['ANTES_USO'];
                $rma002->DESPUES_USO = $params_array['DESPUES_USO'];


                $rma002->save();


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
        /*     $rma002 = DB::table('Tb_RMA002')->insert(array(
                'PARTES_EQUIPO' => $request->input('PARTES_EQUIPO'),
                'ACCESORIOS_EQUIPO' => $request->input('ACCESORIOS_EQUIPO'),
                'TECNOVIGILANCIA' => $request->input('TECNOVIGILANCIA'),
                'ANTES_USO' => $request->input('ANTES_USO'),
                'DESPUES_USO' => $request->input('DESPUES_USO')

            )),
         */
        //Recoger los datos por post


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
        $dataObject = RMA002::where("NUM_HOJA_VIDA", "=", $id)->first();

        if(!empty(request()->download)){
            $download = request()->download;
            switch ($download) {
                case 'pdf':
                    $pdf = PDF::loadView('pdf_templates.rma002', ["sheet" => $dataObject]);
                    return $pdf->download('invoice_'.$dataObject->ID.'.pdf');
                    break;
                case 'excel':

                    break;
                default:
                    # code...
                    break;
            }
        }
        $rma002 = RMA002::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($rma002);
        /* $rma002 = RMA002::find($id);
        if (is_object($rma002)) {
            $data = [

                $rma002
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
                'PARTES_EQUIPO' => 'required',
                'ACCESORIOS_EQUIPO' => 'required',
                'TECNOVIGILANCIA' => 'required',
                'ANTES_USO' => 'required',
                'DESPUES_USO' => 'required'
            ]);

            $equipo = RMA002::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
                'mensaje' => "Verificar envio de datos."
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
        $rma002 = RMA002::find($id);

        if (!empty($rma002)) {
            # code...

            $rma002->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'rma002' => $rma002,
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
