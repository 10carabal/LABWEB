<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Equipos;
use Symfony\Component\HttpFoundation\Response;




class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //$this->middleware('api.auth', ['except' => ['index', 'show']]);
    }


    public function index()
    {
        $equipos = Equipos::select('NUM_HOJA_VIDA', 'Nombre', 'Imagen_Equipo', 'Marca', 'Modelo', 'Serial', 'Activo_Fijo', 'Area', 'Sub_Area', 'Registro_Sanitario', 'Permiso_Comercializacion')
            ;
        if(!empty(request()->name)){
            $equipos->where("nombre", "like", "%".request()->name."%"); //Especifica el filtro en la columna nombre
            $equipos->orWhere("NUM_HOJA_VIDA", "like", "%".request()->name."%"); //Especifica el filtro en la columna id
        }
        return response()->json($equipos->get(), 200)->header('Content-Type', 'application/json');
    }

    public function sacarImagen()
    {
        $imagenes = Equipos::select('Imagen_Equipo')
            ->get();
        return response()->json($imagenes, 200)->header('Content-Type', 'application/json');
    }

    public function inventario()
    {
        $inventario = DB::table('Tb_Equipos')
            ->join('Tb_Clasificacion_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_Equipo.NUM_HOJA_VIDA')
            ->join('Tb_adquisicion_equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_adquisicion_equipos.NUM_HOJA_VIDA')
            ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')
            //->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            // ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')
            ->join('Tb_Documentacion_Proveedor', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Documentacion_Proveedor.NUM_HOJA_VIDA')
            ->join('Tb_Reactivos_Accesorios', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Reactivos_Accesorios.NUM_HOJA_VIDA')
            //->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')

            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Nombre',
                'Imagen_Equipo',
                'Marca',
                'Modelo',
                'Serial',
                'Activo_Fijo',
                'Tb_Clasificacion_Equipo.CLASIFICACION_RIESGO',
                'Area',
                'Sub_Area',
                'Registro_Sanitario',
                'Permiso_Comercializacion',
                'Tb_adquisicion_equipos.FECHA_COMPRA',
                'Tb_adquisicion_equipos.FECHA_INSTALACION',
                'Tb_adquisicion_equipos.FECHA_INICIO_OPERACION',
                'Tb_adquisicion_equipos.COSTO_EQUIPO',
                'Tb_adquisicion_equipos.FACTURA',
                'Tb_Fabricantes_Proveedores.PROVEEDOR',
                'Tb_adquisicion_equipos.ORDEN_DE_COMPRA',
                'Tb_adquisicion_equipos.FORMA_ADQUISICION',
                'Tb_adquisicion_equipos.GARANTIA_AÑOS',
                'Tb_adquisicion_equipos.FIN_GARANTIA',
                'Tb_adquisicion_equipos.ESTADO_GARANTIA',
                'Tb_adquisicion_equipos.ESTADO_ACTUAL',
                'Tb_adquisicion_equipos.VIDA_UTIL',
                'Tb_adquisicion_equipos.RAZON_VIDA_UTIL',
                'Tb_adquisicion_equipos.AÑOS_USO',
                'Tb_adquisicion_equipos.EJECUTOR_HOJA_VIDA',
                'Tb_adquisicion_equipos.LIDER_PROCESO',
                'Tb_adquisicion_equipos.FECHA_INGRESO_INVENTARIO',
                'Tb_Informacion_Tecnica_Equipo.Codigo_ECRI',
                'Tb_Informacion_Tecnica_Equipo.Nomenclatura_Internacional',
                'Tb_Clasificacion_equipo.CLASE_RIESGO_ELECTRICO',
                'Tb_Clasificacion_equipo.TIPO_RIESGO_ELECTRICO',
                'Tb_Clasificacion_equipo.CLASIFICACION_BIOMEDICA',
                'Tb_Clasificacion_equipo.CLASIFICACION_USO',
                'Tb_Clasificacion_equipo.TECNOLOGIA_PREDOMINANTE',
                'Tb_Informacion_Tecnica_Equipo.Descripcion_Equipo',
                'Tb_Informacion_Tecnica_Equipo.Rango_Voltaje',
                'Tb_Informacion_Tecnica_Equipo.Corriente',
                'Tb_Informacion_Tecnica_Equipo.Potencia',
                'Tb_Informacion_Tecnica_Equipo.Dimensiones_(CM)',
                'Tb_Informacion_Tecnica_Equipo.Presion',
                'Tb_Informacion_Tecnica_Equipo.Frecuencia_(HZ)',
                'Tb_Informacion_Tecnica_Equipo.RPM',
                'Tb_Informacion_Tecnica_Equipo.Temperatura',
                'Tb_Informacion_Tecnica_Equipo.Peso_KGS',
                'Tb_Fabricantes_Proveedores.FABRICANTE',
                'Tb_Fabricantes_Proveedores.PAIS_ORIGEN',
                'Tb_Fabricantes_Proveedores.WEB_FABRICANTE',
                'Tb_Fabricantes_Proveedores.PROVEEDOR',
                'Tb_Fabricantes_Proveedores.CIUDAD_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.DIRECCION_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.TELEFONO_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.WEB_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.PROVEEDOR',
                'Tb_Documentacion_Proveedor.MANUAL_USUARIO',
                'Tb_Documentacion_Proveedor.MANUAL_SERVICIO',
                'Tb_Documentacion_Proveedor.GUIA_USO',
                'Tb_Documentacion_Proveedor.DECLARACION_IMPORTACION',
                'Tb_Documentacion_Proveedor.CHECKLIST_FABRICACION',
                'Tb_Documentacion_Proveedor.CERT_CALIB_VALID_CALPERSONAL',
                'Tb_Documentacion_Proveedor.CARTA_GARANTIA',
                'Tb_Documentacion_Proveedor.REPUESTOS_DISPONIBLES',
                'Tb_Documentacion_Proveedor.CRONOGRAMA_VISITAS',
                'Tb_Documentacion_Proveedor.HOJAS_VIDA_PERSONAL_TECNICO',
                'Tb_Documentacion_Proveedor.REGISTRO_SANITARIO_PROVEEDOR',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_3',
                'Tb_Reactivos_Accesorios.LISTADO_REACTIVOS',
                'Tb_Clasificacion_equipo.CLASES_SOFTWARE',
                'Tb_Clasificacion_equipo.COMPLEJIDAD_TECNOLOGICA_EQUIPO',
                'Tb_Clasificacion_equipo.CICLO_MANTENIMIENTO',
                'Tb_Clasificacion_equipo.CICLO_CALIB_VALID_CALPERSONAL'
            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', 1)

            ->get();

        return response()->json($inventario, 200)->header('Content-Type', 'application/json');;
    }

    public static function  getdatosPrimarios()
    {

        $datosPrimarios = DB::table('Tb_Equipos')
            ->join('Tb_Clasificacion_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Nombre',
                'Imagen_Equipo',
                'Marca',
                'Modelo',
                'Serial',
                'Activo_Fijo',
                'Tb_Clasificacion_Equipo.CLASIFICACION_RIESGO',
                'Area',
                'Sub_Area',
                'Registro_Sanitario',
                'Permiso_Comercializacion'
            )
            ->get();

        return response()->json($datosPrimarios);
    }


    public static function getadquisicion()
    {

        $adquisicion = DB::table('Tb_Equipos')
            ->join('Tb_adquisicion_equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_adquisicion_equipos.NUM_HOJA_VIDA')
            ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')

            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Nombre',
                'Tb_adquisicion_equipos.FECHA_COMPRA',
                'Tb_adquisicion_equipos.FECHA_INSTALACION',
                'Tb_adquisicion_equipos.FECHA_INICIO_OPERACION',
                'Tb_adquisicion_equipos.COSTO_EQUIPO',
                'Tb_adquisicion_equipos.FACTURA',
                'Tb_Fabricantes_Proveedores.PROVEEDOR',
                'Tb_adquisicion_equipos.ORDEN_DE_COMPRA',
                'Tb_adquisicion_equipos.FORMA_ADQUISICION',
                'Tb_adquisicion_equipos.GARANTIA_AÑOS',
                'Tb_adquisicion_equipos.FIN_GARANTIA',
                'Tb_adquisicion_equipos.ESTADO_GARANTIA',
                'Tb_adquisicion_equipos.ESTADO_ACTUAL',
                'Tb_adquisicion_equipos.VIDA_UTIL',
                'Tb_adquisicion_equipos.RAZON_VIDA_UTIL',
                'Tb_adquisicion_equipos.AÑOS_USO',
                'Tb_adquisicion_equipos.EJECUTOR_HOJA_VIDA',
                'Tb_adquisicion_equipos.LIDER_PROCESO',
                'Tb_adquisicion_equipos.FECHA_INGRESO_INVENTARIO'

            )
            ->get();

        return response()->json($adquisicion);
    }

    public static function getdatosequipo()
    {

        $datosequipo = DB::table('Tb_Equipos')
            ->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Nombre',
                'Tb_Informacion_Tecnica_Equipo.Codigo_ECRI',
                'Tb_Informacion_Tecnica_Equipo.Nomenclatura_Internacional',
                'Tb_Clasificacion_equipo.CLASE_RIESGO_ELECTRICO',
                'Tb_Clasificacion_equipo.TIPO_RIESGO_ELECTRICO',
                'Tb_Clasificacion_equipo.CLASIFICACION_BIOMEDICA',
                'Tb_Clasificacion_equipo.CLASIFICACION_USO',
                'Tb_Clasificacion_equipo.TECNOLOGIA_PREDOMINANTE',
                'Tb_Informacion_Tecnica_Equipo.Descripcion_Equipo',
                'Tb_Informacion_Tecnica_Equipo.Rango_Voltaje',
                'Tb_Informacion_Tecnica_Equipo.Corriente',
                'Tb_Informacion_Tecnica_Equipo.Potencia',
                'Tb_Informacion_Tecnica_Equipo.Dimensiones_(CM)',
                'Tb_Informacion_Tecnica_Equipo.Presion',
                'Tb_Informacion_Tecnica_Equipo.Frecuencia_(HZ)',
                'Tb_Informacion_Tecnica_Equipo.RPM',
                'Tb_Informacion_Tecnica_Equipo.Temperatura',
                'Tb_Informacion_Tecnica_Equipo.Peso_KGS'

            )
            ->get();

        return response()->json($datosequipo);
    }

    public  static function getfabricanteyproveedor()
    {

        $fabricanteyproveedor = DB::table('Tb_Equipos')
            ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Fabricantes_Proveedores.FABRICANTE',
                'Tb_Fabricantes_Proveedores.PAIS_ORIGEN',
                'Tb_Fabricantes_Proveedores.WEB_FABRICANTE',
                'Tb_Fabricantes_Proveedores.PROVEEDOR',
                'Tb_Fabricantes_Proveedores.CIUDAD_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.DIRECCION_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.TELEFONO_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.WEB_PROVEEDOR'
            )
            ->get();

        return response()->json($fabricanteyproveedor);
    }

    public static function getdocumentacionproveedor()
    {

        $documentacionproveedor = DB::table('Tb_Equipos')
            ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')
            ->join('Tb_Documentacion_Proveedor', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Documentacion_Proveedor.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Fabricantes_Proveedores.PROVEEDOR',
                'Tb_Documentacion_Proveedor.MANUAL_USUARIO',
                'Tb_Documentacion_Proveedor.MANUAL_SERVICIO',
                'Tb_Documentacion_Proveedor.GUIA_USO',
                'Tb_Documentacion_Proveedor.DECLARACION_IMPORTACION',
                'Tb_Documentacion_Proveedor.CHECKLIST_FABRICACION',
                'Tb_Documentacion_Proveedor.CERT_CALIB_VALID_CALPERSONAL',
                'Tb_Documentacion_Proveedor.CARTA_GARANTIA',
                'Tb_Documentacion_Proveedor.REPUESTOS_DISPONIBLES',
                'Tb_Documentacion_Proveedor.CRONOGRAMA_VISITAS',
                'Tb_Documentacion_Proveedor.HOJAS_VIDA_PERSONAL_TECNICO',
                'Tb_Documentacion_Proveedor.REGISTRO_SANITARIO_PROVEEDOR',

            )
            ->get();

        return response()->json($documentacionproveedor);
    }

    public static function getlistareactivosaccesorios()
    {

        $listareactivosaccesorios = DB::table('Tb_Equipos')
            ->join('Tb_Reactivos_Accesorios', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Reactivos_Accesorios.NUM_HOJA_VIDA')
            ->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_3',
                'Tb_Reactivos_Accesorios.LISTADO_REACTIVOS',
                'Tb_Clasificacion_equipo.CLASES_SOFTWARE',
                'Tb_Clasificacion_equipo.COMPLEJIDAD_TECNOLOGICA_EQUIPO',
                'Tb_Clasificacion_equipo.CICLO_MANTENIMIENTO',
                'Tb_Clasificacion_equipo.CICLO_CALIB_VALID_CALPERSONAL',

            )
            ->get();

        return response()->json($listareactivosaccesorios);
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
    { {
            $json = $request->input('json', null);
            $params_array = json_decode($json, true);

            if (!empty($params_array)) {


                $validate = \Validator::make(
                    $params_array,
                    [
                        'Nombre' => 'required',
                        'Imagen_Equipo' => 'required',
                        'Marca' => 'required',
                        'Registro_Sanitario' => 'required',
                        'Permiso_Comercializacion' => 'required'
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

                    $Equipos = new Equipos();
                    $Equipos->Nombre = $params_array['Nombre'];
                    $Equipos->Imagen_Equipo = $params_array['Imagen_Equipo'];
                    $Equipos->Marca = $params_array['Marca'];
                    $Equipos->Registro_Sanitario = $params_array['Registro_Sanitario'];
                    $Equipos->Permiso_Comercializacion = $params_array['Permiso_Comercializacion'];




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
            /* $Equipos = DB::table('Tb_Equipos')->insert(array(
                'Nombre' => $request->input('Nombre'),
                'Imagen_Equipo' => $request->input('Imagen_Equipo'),
                'Marca' => $request->input('Marca'),
                'Modelo' => $request->input('Modelo'),
                'Serial' => $request->input('Serial'),
                'Activo_Fijo' => $request->input('Activo_Fijo'),
                'Area' => $request->input('Area'),
                'Sub_Area' => $request->input('Sub_Area'),
                'Registro_Sanitario' => $request->input('Registro_Sanitario'),
                'Permiso_Comercializacion' => $request->input('Permiso_Comercializacion')

            )) */

            //Recoger los datos por post



            return response()->json($data, $data['code']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipos = Equipos::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($equipos);

        /* $equipo = Equipos::find($id);
        if (is_object($equipo)) {
            $data = [

                $equipo
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
                'Nombre' => 'required',
                'Imagen_Equipo' => 'required',
                'Marca' => 'required',
                'Registro_Sanitario' => 'required',
                'Permiso_Comercializacion' => 'required'
            ]);

            $equipo = Equipos::where('NUM_HOJA_VIDA', $id)->update($params_array);
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
        $equipo = Equipos::find($id);

        if (!empty($equipo)) {
            # code...


            $equipo->delete();

            $data = [
                'code' => 200,
                'status' => 'successs',
                'equipo' => $equipo
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
