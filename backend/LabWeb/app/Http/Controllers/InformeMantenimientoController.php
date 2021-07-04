<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\InformeMantenimiento;
use Symfony\Component\HttpFoundation\Response;

use PDF;
use Carbon\Carbon;

class InformeMantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Informe006 = InformeMantenimiento::all()->toJson();
        return response($Informe006, 200)->header('Content-Type', 'application/json', );

        /* $noticias = Noticias::all();
        //print_r($noticias);
        return response()->json($noticias,200);
 */
        //print_r(Noticias::all());

    }
    public static function getFormato($id)
    {

        $rma006 = DB::table('Tb_Equipos')
            ->join('Tb_Informe_Mantenimiento', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informe_Mantenimiento.NUM_HOJA_VIDA')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informe_Mantenimiento.Imagen_Antes_Mantenimiento',
                'Tb_Informe_Mantenimiento.Imagen_Despues_Mantenimiento',
                'Tb_Informe_Mantenimiento.Fecha_Mantenimiento',
                //DATOS GENERALES EQUIPO
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Marca',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Serial',
                'Tb_Equipos.Activo_Fijo',
                'Tb_Informacion_Tecnica_Equipo.Frecuencia_HZ',
                'Tb_Informe_Mantenimiento.Consecutivo_Orden',
                'Tb_Informe_Mantenimiento.Hora_Inicio',
                'Tb_Informe_Mantenimiento.Hora_Fin',
                'Tb_Equipos.Sub_Area',
                //DESCRIPCION MANTENIMIENTO
                'Tb_Informe_Mantenimiento.Tipo_Equipo',
                'Tb_Informe_Mantenimiento.Actividades_Realizadas',
                'Tb_Informe_Mantenimiento.Observacion_Mantenimiento',
                'Tb_Informe_Mantenimiento.Estado_Equipo',
                'Tb_Informe_Mantenimiento.Test_Funcionalidad',
                'Tb_Informe_Mantenimiento.Herramientas_Utilizadas',
                'Tb_Informe_Mantenimiento.Limpieza',
                'Tb_Informe_Mantenimiento.Reemplazo_Accesorios',
                'Tb_Informe_Mantenimiento.Equipo_Proteccion_Personal',
                'Tb_Informe_Mantenimiento.Nombre_Responsable_Mento',
                'Tb_Informe_Mantenimiento.Cargo_Responsable_Mento',
                'Tb_Informe_Mantenimiento.Nombre_Responsable_Recibir',
                'Tb_Informe_Mantenimiento.Cargo_Responsable_Recibir'
            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', $id)

            ->get();

        return response()->json($rma006);
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
        //$json = $request->input('json', null);
        //$params_array = json_decode($json, true);
        $params_array = $request->all();
        //return response()->json($params_array);
        if (!empty($params_array)) {

            //return response()->json(empty($request->file("imagenAntesMantenimiento")) ? "vacio":"con image", 404);
            $validate = \Validator::make(
                $params_array,
                [
                    'NUM_HOJA_VIDA' => 'required',
                    'Consecutivo_Orden' => 'required',
                    'Tipo_Mantenimiento' => 'required',
                    'Imagen_Antes_Mantenimiento' => 'required',
                    'Imagen_Despues_Mantenimiento' => 'required',
                    'Tipo_Equipo' => 'required',
                    'Actividades_Realizadas' => 'required',
                    'Reemplazo_Accesorios' => 'required',
                    'Nombre_Responsable_Mento' => 'required',
                    'Cargo_Responsable_Mento' => 'required',
                    'Nombre_Responsable_Recibir' => 'required',
                    'Cargo_Responsable_Recibir' => 'required',
                    'Fecha_Mantenimiento' => 'required',
                    'Hora_Inicio' => 'required',
                    'Hora_Fin' => 'required',
                    'Observacion_Mantenimiento' => 'required',
                    'Estado_Equipo' => 'required',
                    'Test_Funcionalidad' => 'required',
                    'Limpieza' => 'required',
                    'Herramientas_Utilizadas' => 'required',
                    'Equipo_Proteccion_Personal' => 'required',
                ]

            );

            if ($validate->fails()) {
                # code...
                $data = [
                    'code' => 404,
                    "params" => $params_array,
                    'mensaje' => "No se guardó la información correctamente.",
                    'errors' => $validate->errors()
                ];
            } else {
                # code...
                $auxDateTimeI = Carbon::parse($params_array['Fecha_Mantenimiento']);
                $textTimeI = explode(":", $params_array['Hora_Inicio']);
                $auxDateTimeI->setHour($textTimeI[0]);
                $auxDateTimeI->setMinute($textTimeI[1]);

                $auxDateTimeF = $auxDateTimeI->copy();
                $textTimeF = explode(":", $params_array['Hora_Fin']);
                $auxDateTimeF->setHour($textTimeF[0]);
                $auxDateTimeF->setMinute($textTimeF[1]);

                $rma006 = new InformeMantenimiento();
                $rma006->NUM_HOJA_VIDA = $params_array['NUM_HOJA_VIDA'];
                $rma006->Consecutivo_Orden = $params_array['Consecutivo_Orden'];
                $rma006->Tipo_Mantenimiento = $params_array['Tipo_Mantenimiento'];
                $rma006->Imagen_Antes_Mantenimiento = "";
                $rma006->Imagen_Despues_Mantenimiento = "";
                $rma006->Tipo_Equipo = $params_array['Tipo_Equipo'];
                $rma006->Actividades_Realizadas = $params_array['Actividades_Realizadas'];
                $rma006->Reemplazo_Accesorios = $params_array['Reemplazo_Accesorios'];
                $rma006->Nombre_Responsable_Mento = $params_array['Nombre_Responsable_Mento'];
                $rma006->Cargo_Responsable_Mento = $params_array['Cargo_Responsable_Mento'];
                $rma006->Nombre_Responsable_Recibir = $params_array['Nombre_Responsable_Recibir'];
                $rma006->Cargo_Responsable_Recibir = $params_array['Cargo_Responsable_Recibir'];

                $rma006->Fecha_Mantenimiento = $params_array['Fecha_Mantenimiento'];
                $rma006->Hora_Inicio = $auxDateTimeI;
                $rma006->Hora_Fin = $auxDateTimeF;

                $rma006->Observacion_Mantenimiento = $params_array['Observacion_Mantenimiento'];
                $rma006->Estado_Equipo = $params_array['Estado_Equipo'];
                $rma006->Test_Funcionalidad = $params_array['Test_Funcionalidad'];
                $rma006->Limpieza = $params_array['Limpieza'];
                $rma006->Herramientas_Utilizadas = $params_array['Herramientas_Utilizadas'];
                $rma006->Equipo_Proteccion_Personal = $params_array['Equipo_Proteccion_Personal'];


                $rma006->save();
                $pathImagenAntesMantenimiento = $request->file("Imagen_Antes_Mantenimiento")
                ->storeAs(date("Ymd"), $rma006->id."_Imagen_Antes_Mantenimiento.".$request->file("Imagen_Antes_Mantenimiento")->extension(), "images");
                $pathImagendespuesmantenimiento = $request->file("Imagen_Despues_Mantenimiento")
                ->storeAs(date("Ymd"), $rma006->id."_Imagen_Despues_Mantenimiento.".$request->file("Imagen_Despues_Mantenimiento")->extension(), "images");
                $rma006->Imagen_Antes_Mantenimiento = $pathImagenAntesMantenimiento;
                $rma006->Imagen_Despues_Mantenimiento = $pathImagendespuesmantenimiento;
                $rma006->save();
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
        /* $rma006 = DB::table('Tb_Informe_Mantenimiento')->insert(array(
                'Tipo_Mantenimiento' => $request->input('Tipo_Mantenimiento'),
                'Imagen_Antes_Mantenimiento' => $request->input('Imagen_Antes_Mantenimiento'),
                'Imagen_Despues_Mantenimiento' => $request->input('Imagen_Despues_Mantenimiento'),
                'Fecha_Mantenimiento' => $request->input('Fecha_Mantenimiento'),
                'Hora_Inicio' => $request->input('Hora_Inicio'),
                'Hora_Fin' => $request->input('Hora_Fin'),
                'Tipo_Equipo' => $request->input('Tipo_Equipo'),
                'Actividades_Realizadas' => $request->input('Actividades_Realizadas'),
                'Observacion_Mantenimiento' => $request->input('Observacion_Mantenimiento'),
                'Estado_Equipo' => $request->input('Estado_Equipo'),
                'Test_Funcionalidad' => $request->input('Test_Funcionalidad'),
                'Limpieza' => $request->input('Limpieza'),
                'Reemplazo_Accesorios' => $request->input('Reemplazo_Accesorios'),
                'Herramientas_Utilizadas' => $request->input('Herramientas_Utilizadas'),
                'Equipo_Proteccion_Personal' => $request->input('Equipo_Proteccion_Personal'),
                'Nombre_Responsable_Mento' => $request->input('Nombre_Responsable_Mento'),
                'Cargo_Responsable_Mento' => $request->input('Cargo_Responsable_Mento'),
                'Nombre_Responsable_Recibir' => $request->input('Nombre_Responsable_Recibir'),
                'Cargo_Responsable_Recibir' => $request->input('Cargo_Responsable_Recibir')

            )), */
        return response()->json($data, $data['code']);
    }   //Recoger los datos por post



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rma006 = InformeMantenimiento::where("NUM_HOJA_VIDA", "=", $id)->get();
        if(!empty(request()->download)){
            $download = request()->download;
            switch ($download) {
                case 'pdf':
                    $dataObject = $rma006;
                    $pdf = PDF::loadView('pdf_templates.rma006', ["sheets" => $dataObject]);
                    return $pdf->stream();
                    return $pdf->download('informemantenimiento_'.Carbon::now()->format("Ymd_His").'.pdf');
                    break;
                case 'excel':

                    break;
                default:
                    # code...
                    break;
            }
        }
        return response()->json($rma006);
        /* $rma006 = InformeMantenimiento::find($id);
        if (is_object($rma006)) {
            $data = [

                $rma006,
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
                'Tipo_Mantenimiento' => 'required',
                'Imagen_Antes_Mantenimiento' => 'required',
                'Imagen_Despues_Mantenimiento' => 'required',
                'Tipo_Equipo' => 'required',
                'Actividades_Realizadas' => 'required',
                'Reemplazo_Accesorios' => 'required',
                'Nombre_Responsable_Mento' => 'required',
                'Cargo_Responsable_Mento' => 'required',
                'Nombre_Responsable_Recibir' => 'required',
                'Cargo_Responsable_Recibir' => 'required',
                'Fecha_Mantenimiento' => 'required',
                'Hora_Inicio' => 'required',
                'Hora_Fin' => 'required',
                'Observacion_Mantenimiento' => 'required',
                'Estado_Equipo' => 'required',
                'Test_Funcionalidad' => 'required',
                'Limpieza' => 'required',
                'Herramientas_Utilizadas' => 'required',
                'Equipo_Proteccion_Personal' => 'required',

            ]);

            $equipo = InformeMantenimiento::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
                'mensaje' => "No has enviado ninguna solicitud."
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
        $rma006 = InformeMantenimiento::find($id);

        if (!empty($rma006)) {
            # code...

            $rma006->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'rma006' => $rma006,
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


    public function subirImagen(Request $request)
    {
        $image = $request->file('file0');

        $validate = \Validator::make($request->all(), [
            'file0' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        if (!$image || $validate->fails()) {
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Error al cargar la imagen.'
            ];
        } else {
            $image_name = time() . $image->getClientOriginalName();

            \Storage::disk('images')->put($image_name, \File::get($image));

            $data = [
                'code' => 200,
                'status' => 'succces',
                'image' => $image_name
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function getImage($filename)
    {
        //$response = $image();
        //$IlluminateResponse = 'Illuminate\Http\Response';
        //$SymfonyResponse = 'Symfony\Component\HttpFoundation\Response';

        //$headers = [
        //    'Access-Control-Allow-Origin' => '*',
        //    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, PATCH, DELETE',
        //    'Access-Control-Allow-Headers' => 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Authorization , Access-Control-Request-Headers',
        //];

        $isset = \Storage::disk('images')->exists($filename);
        if ($isset) {
            # code...
            $file = \Storage::disk('images')->get($filename);

            return new Response($file, 200);
        } else {
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'La imagen no existe.'

            ];
            # code...
        }
        //return response()->json($data, $data['code'], $headers);
        return response()->json($data, $data['code']);
    }
}
