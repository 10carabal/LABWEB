<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Equipos;
use App\Clasifi_Equipo;
use App\Adq_Equipos;
use App\Fabricantes_Proveedores;
use App\Info_Tecnica_Equipo;
use App\Doc_Proveedor;
use App\Reactivos_Accesorios;



class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipos::select('NUM_HOJA_VIDA', 'Nombre', 'Imagen_Equipo', 'Marca', 'Modelo', 'Serial', 'Activo_Fijo', 'Area', 'Sub_Area', 'Registro_Sanitario', 'Permiso_Comercializacion')
            ->get();
        return response()->json($equipos, 200)->header('Content-Type', 'application/json', );
    }

    public function inventario($id)
    {
        $inventario = $this->getAllData()->get();

        return response()->json($inventario, 200)->header('Content-Type', 'application/json', );;
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
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getAllData(){
        return DB::table('Tb_Equipos')
            ->join('Tb_Clasificacion_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_Equipo.NUM_HOJA_VIDA')
            ->join('Tb_adquisicion_equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_adquisicion_equipos.NUM_HOJA_VIDA')
            ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->join('Tb_Documentacion_Proveedor', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Documentacion_Proveedor.NUM_HOJA_VIDA')
            ->join('Tb_Reactivos_Accesorios', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Reactivos_Accesorios.NUM_HOJA_VIDA')

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
                'Tb_adquisicion_equipos.GARANTIA_ANIOS',
                'Tb_adquisicion_equipos.FIN_GARANTIA',
                'Tb_adquisicion_equipos.ESTADO_GARANTIA',
                'Tb_adquisicion_equipos.ESTADO_ACTUAL',
                'Tb_adquisicion_equipos.VIDA_UTIL',
                'Tb_adquisicion_equipos.RAZON_VIDA_UTIL',
                'Tb_adquisicion_equipos.ANIOS_USO',
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
                'Tb_Informacion_Tecnica_Equipo.Dimensiones_CM',
                'Tb_Informacion_Tecnica_Equipo.Presion',
                'Tb_Informacion_Tecnica_Equipo.Frecuencia_HZ',
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
                'Tb_Reactivos_Accesorios.ACCESORIO_1',
                'Tb_Reactivos_Accesorios.ACCESORIO_2',
                'Tb_Reactivos_Accesorios.ACCESORIO_3',
                'Tb_Reactivos_Accesorios.LISTADO_REACTIVOS',
                'Tb_Clasificacion_equipo.CLASES_SOFTWARE',
                'Tb_Clasificacion_equipo.COMPLEJIDAD_TECNOLOGICA_EQUIPO',
                'Tb_Clasificacion_equipo.CICLO_MANTENIMIENTO',
                'Tb_Clasificacion_equipo.CICLO_CALIB_VALID_CALPERSONAL'
            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', $id)

            ;
    }
}
