<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Equipos;


class Hoja_VidaController extends Controller
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

    public function getHojavida($id)
    {
        //$hojavida = Equipos::where("NUM_HOJA_VIDA", "=", $id)->get();
        //return response()->json($hojavida);
        $hojavida = DB::table('Tb_Equipos')
            ->join('Tb_Informacion_Institucional', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Institucional.NUM_HOJA_VIDA')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->join('Tb_adquisicion_equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_adquisicion_equipos.NUM_HOJA_VIDA')
            ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')
            ->join('Tb_Observaciones_Adicionales', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Observaciones_Adicionales.NUM_HOJA_VIDA')
            ->join('Tb_Documentacion_Proveedor', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Documentacion_Proveedor.NUM_HOJA_VIDA')
            ->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')
            ->join('Tb_Reactivos_Accesorios', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Reactivos_Accesorios.NUM_HOJA_VIDA')
            ->join('Tb_Informe_Mantenimiento', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informe_Mantenimiento.NUM_HOJA_VIDA')
            ->join('Tb_Mantenimiento_Equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Mantenimiento_Equipos.NUM_HOJA_VIDA')
            ->join('Tb_Docum_Anexos_HV', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Docum_Anexos_HV.NUM_HOJA_VIDA')
            ->join('Tb_Hist_Solicitudes_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Hist_Solicitudes_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informacion_Institucional.Pais',
                'Tb_Informacion_Institucional.Ciudad',
                'Tb_Informacion_Institucional.Direccion',
                'Tb_Informacion_Institucional.Nit_Universidad',
                'Tb_Informacion_Institucional.RUT',
                'Tb_Informacion_Institucional.Telefono',
                'Tb_Informacion_Institucional.Website',
                'Tb_Informacion_Institucional.Email_Laboratorio',
                'Tb_Informacion_Institucional.Fecha_Ejecucion_Hoja_Vida',
                'Tb_Informacion_Institucional.Lider_Proceso',
                'Tb_Informacion_Institucional.Cargo',
                'Tb_Informacion_Tecnica_Equipo.Nomenclatura_Internacional',
                'Nombre',
                'Marca',
                'Modelo',
                'Serial',
                'Activo_Fijo',
                //ubicación del equipo
                'Sub_Area',
                //nomenclatura
                'Tb_Informacion_Tecnica_Equipo.Codigo_ECRI',
                'Tb_Informacion_Tecnica_Equipo.Tipo_Equipo',
                'Tb_Informacion_Tecnica_Equipo.Firmware',
                'Tb_Informacion_Tecnica_Equipo.Software',
                //IMAGEN EQUIPO
                'Imagen_Equipo',
                'Tb_adquisicion_equipos.FORMA_ADQUISICION',
                'Tb_adquisicion_equipos.ORDEN_DE_COMPRA',
                'Tb_adquisicion_equipos.FECHA_COMPRA',
                'Tb_adquisicion_equipos.FECHA_ACTA_RECIBOS',
                'Tb_adquisicion_equipos.FECHA_INSTALACION',
                'Tb_adquisicion_equipos.FECHA_INICIO_OPERACION',
                //vencimiento garantia
                'Tb_adquisicion_equipos.FIN_GARANTIA',
                'Tb_adquisicion_equipos.FECHA_FABRICACION',
                'Tb_adquisicion_equipos.COSTO_EQUIPO',
                //vida util fabricante
                'Tb_adquisicion_equipos.VIDA_UTIL',
                //vida util institucional
                'Tb_adquisicion_equipos.RAZON_VIDA_UTIL',
                'Tb_Fabricantes_Proveedores.FABRICANTE',
                'Tb_Fabricantes_Proveedores.PAIS_ORIGEN',
                'Tb_Fabricantes_Proveedores.WEB_FABRICANTE',
                'Tb_Fabricantes_Proveedores.REPRESENTANTE',
                //localizacion proveedor
                'Tb_Fabricantes_Proveedores.CIUDAD_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.DIRECCION_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.TELEFONO_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.CORREO_PROVEEDOR',
                'Tb_Informacion_Tecnica_Equipo.Descripcion_Equipo',
                'Tb_Informacion_Tecnica_Equipo.Rango_Voltaje',
                'Tb_Informacion_Tecnica_Equipo.Corriente',
                'Tb_Informacion_Tecnica_Equipo.Potencia',
                'Tb_Informacion_Tecnica_Equipo.Frecuencia_HZ',
                'Tb_Informacion_Tecnica_Equipo.Dimensiones_CM',
                'Tb_Informacion_Tecnica_Equipo.Codigo_ECRI',
                'Tb_Informacion_Tecnica_Equipo.Presion',
                'Tb_Informacion_Tecnica_Equipo.Temperatura',
                'Tb_Informacion_Tecnica_Equipo.Peso_KGS',
                'Tb_Informacion_Tecnica_Equipo.Humedad',
                'Tb_Informacion_Tecnica_Equipo.RPM',
                //recomendaciones fabricante
                'Tb_Informacion_Tecnica_Equipo.Otras_Recomendaciones',
                'Tb_Clasificacion_equipo.CLASIFICACION_DE_EQUIPO',
                'Tb_Clasificacion_equipo.CLASIFICACION_RIESGO',
                'Tb_Documentacion_Proveedor.MANUAL_SERVICIO',
                'Tb_Documentacion_Proveedor.MANUAL_USUARIO',
                'Tb_Documentacion_Proveedor.MANUAL_PARTES',
                'Tb_Documentacion_Proveedor.MANUAL_DESPIECE',
                'Tb_Documentacion_Proveedor.GUIA_USO',
                'Tb_Documentacion_Proveedor.PLANOS',
                'Tb_Clasificacion_equipo.TECNOLOGIA_PREDOMINANTE',
                'Tb_Reactivos_Accesorios.ACCESORIO_1',
                'Tb_Reactivos_Accesorios.MARCA_LICENCIA_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.MODELO_VERSION_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.SERIE_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.ACCESORIO_2',
                'Tb_Reactivos_Accesorios.MARCA_LICENCIA_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.MODELO_VERSION_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.SERIE_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.ACCESORIO_3',
                'Tb_Reactivos_Accesorios.MARCA_LICENCIA_ACCESORIO_3',
                'Tb_Reactivos_Accesorios.MODELO_VERSION_ACCESORIO_3',
                'Tb_Reactivos_Accesorios.SERIE_ACCESORIO_3',

                'Tb_Informe_Mantenimiento.Tipo_Mantenimiento',
                'Tb_Clasificacion_equipo.CLASIFICACION_USO',
                'Tb_Clasificacion_equipo.FUENTES_ALIMENTACION',
                'Tb_Clasificacion_equipo.CICLO_CALIB_VALID_CALPERSONAL',
                'Tb_Clasificacion_equipo.CICLO_MANTENIMIENTO',
                'Tb_Mantenimiento_Equipos.Mantenimiento_Propio',
                'Tb_Mantenimiento_Equipos.Mantenimiento_Contratado',
                'Tb_Mantenimiento_Equipos.Por_Orden_Compra',
                'Tb_Mantenimiento_Equipos.Requiere_Calibracion',
                'Tb_Mantenimiento_Equipos.Requiere_Cal_Operacional',
                'Tb_Mantenimiento_Equipos.Requiere_Validacion',
                'Tb_Docum_Anexos_HV.COPIA_REGISTRO_SANITARIO',
                'Tb_Docum_Anexos_HV.COPIA_PMISO_COMERCIALIZACION',
                'Tb_Docum_Anexos_HV.COPIA_REGISTRO_IMPORTACION',
                'Tb_Docum_Anexos_HV.COPIA_FACTURA',
                'Tb_Docum_Anexos_HV.COPIA_INGRESO_ALMACEN',
                'Tb_Docum_Anexos_HV.CP_RBO_SATISFACCION_PRESTADOR',
                'Tb_Docum_Anexos_HV.PROTOCOLO_PROVEEDOR',
                'Tb_Docum_Anexos_HV.CRONOGRAMA_MANTENIMIENTO_T_G',
                'Tb_Docum_Anexos_HV.GUIA_RAPIDA_OPERACION',
                'Tb_Docum_Anexos_HV.CP_RBO_SATISFACCION_OPERADOR',
                'Tb_Docum_Anexos_HV.RNES_FABRICANTE_ACEOS_CBLES',
                'Tb_Docum_Anexos_HV.RNES_FABRICANTE_CALIBRACION',
                'Tb_Docum_Anexos_HV.CERT_CALIB_VALID_CALPERSONAL',
                'Tb_Docum_Anexos_HV.HOJA_VIDA_PERSONAL_TECNICO',
                'Tb_Docum_Anexos_HV.CAPACION_TEC_ASISTENCIAL',
                'Tb_Docum_Anexos_HV.OBSERVACIONES',
                'Tb_Hist_Solicitudes_Equipo.Fecha',
                //NO INF.
                'Tb_Hist_Solicitudes_Equipo.Consecutivo_Orden',
                'Tb_Hist_Solicitudes_Equipo.Tipo_Servicio',
                'Tb_Hist_Solicitudes_Equipo.HH',
                'Tb_Hist_Solicitudes_Equipo.HP',
                'Tb_Hist_Solicitudes_Equipo.Repuestos',
                'Tb_Hist_Solicitudes_Equipo.Costo',
                'Tb_Hist_Solicitudes_Equipo.Observaciones',
                'Tb_Hist_Solicitudes_Equipo.Nombre_Responsable',
                //OBSERVACIONES_ADICIONALES
                'Tb_Observaciones_Adicionales.Observacion',
                'Tb_Observaciones_Adicionales.Fecha_Observacion',
                'Tb_Observaciones_Adicionales.Responsable_Observacion'
            )
            ->where('Tb_Equipos.NUM_HOJA_VIDA', '=', $id)

            ->get();

        return response()->json($hojavida, 200)->header('Content-Type', 'application/json', );;
    }


    public static function getInfoInstitucional()
    {

        $institucional = DB::table('Tb_Equipos')
            ->join('Tb_Informacion_Institucional', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Institucional.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informacion_Institucional.Pais',
                'Tb_Informacion_Institucional.Ciudad',
                'Tb_Informacion_Institucional.Direccion',
                'Tb_Informacion_Institucional.Nit_Universidad',
                'Tb_Informacion_Institucional.RUT',
                'Tb_Informacion_Institucional.Telefono',
                'Tb_Informacion_Institucional.Website',
                'Tb_Informacion_Institucional.Email_Laboratorio',
                'Tb_Informacion_Institucional.Fecha_Ejecucion_Hoja_Vida',
                'Tb_Informacion_Institucional.Lider_Proceso',
                'Tb_Informacion_Institucional.Cargo'
            )
            ->get();

        return response()->json($institucional);
    }

    public static function getIdentificacion()
    {

        $identificacion = DB::table('Tb_Equipos')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informacion_Tecnica_Equipo.Nomenclatura_Internacional',
                'Tb_Equipos.Nombre',
                'Tb_Equipos.Marca',
                'Tb_Equipos.Modelo',
                'Tb_Equipos.Serial',
                'Tb_Equipos.Activo_Fijo',
                //ubicación del equipo
                'Tb_Equipos.Sub_Area',
                //nomenclatura
                'Tb_Informacion_Tecnica_Equipo.Codigo_ECRI',
                'Tb_Informacion_Tecnica_Equipo.Tipo_Equipo',
                'Tb_Informacion_Tecnica_Equipo.Firmware',
                'Tb_Informacion_Tecnica_Equipo.Software',
                //IMAGEN EQUIPO
                'Tb_Equipos.Imagen_Equipo'
            )
            ->get();

        return response()->json($identificacion);
    }


    public static function getRegistroHistorico()
    {

        $registro = DB::table('Tb_Equipos')
            ->join('Tb_adquisicion_equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_adquisicion_equipos.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_adquisicion_equipos.FORMA_ADQUISICION',
                'Tb_adquisicion_equipos.ORDEN_DE_COMPRA'

            )
            ->get();

        return response()->json($registro);
    }


    public static function getFechas()
    {

        $fechas = DB::table('Tb_Equipos')
            ->join('Tb_adquisicion_equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_adquisicion_equipos.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_adquisicion_equipos.FECHA_COMPRA',
                'Tb_adquisicion_equipos.FECHA_ACTA_RECIBOS',
                'Tb_adquisicion_equipos.FECHA_INSTALACION',
                'Tb_adquisicion_equipos.FECHA_INICIO_OPERACION',
                //vencimiento garantia
                'Tb_adquisicion_equipos.FIN_GARANTIA',
                'Tb_adquisicion_equipos.FECHA_FABRICACION',
                'Tb_adquisicion_equipos.COSTO_EQUIPO',
                //vida util fabricante
                'Tb_adquisicion_equipos.VIDA_UTIL',
                //vida util institucional
                'Tb_adquisicion_equipos.RAZON_VIDA_UTIL',


            )
            ->get();

        return response()->json($fechas);
    }


    public  static function getfabricanteyproveedor()
    {

        $fabricanteyproveedor = DB::table('Tb_Equipos')
            ->join('Tb_Fabricantes_Proveedores', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Fabricantes_Proveedores.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Fabricantes_Proveedores.FABRICANTE',
                'Tb_Fabricantes_Proveedores.PAIS_ORIGEN',
                'Tb_Fabricantes_Proveedores.WEB_FABRICANTE',
                'Tb_Fabricantes_Proveedores.REPRESENTANTE',
                //localizacion proveedor
                'Tb_Fabricantes_Proveedores.CIUDAD_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.DIRECCION_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.TELEFONO_PROVEEDOR',
                'Tb_Fabricantes_Proveedores.CORREO_PROVEEDOR'
            )
            ->get();

        return response()->json($fabricanteyproveedor);
    }

    public  static function getDescricionEquipo()
    {

        $descripcion = DB::table('Tb_Equipos')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informacion_Tecnica_Equipo.Descripcion_Equipo'
            )
            ->get();

        return response()->json($descripcion);
    }



    public static function getInformacionTecnica()
    {

        $informaciontecnica = DB::table('Tb_Equipos')
            ->join('Tb_Informacion_Tecnica_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informacion_Tecnica_Equipo.NUM_HOJA_VIDA')
            ->join('Tb_Observaciones_Adicionales', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Observaciones_Adicionales.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informacion_Tecnica_Equipo.Rango_Voltaje',
                'Tb_Informacion_Tecnica_Equipo.Corriente',
                'Tb_Informacion_Tecnica_Equipo.Potencia',
                'Tb_Informacion_Tecnica_Equipo.Frecuencia_(HZ)',
                'Tb_Informacion_Tecnica_Equipo.Dimensiones_(CM)',
                'Tb_Informacion_Tecnica_Equipo.Codigo_ECRI',
                'Tb_Informacion_Tecnica_Equipo.Presion',
                'Tb_Informacion_Tecnica_Equipo.Temperatura',
                'Tb_Informacion_Tecnica_Equipo.Peso_KGS',
                'Tb_Informacion_Tecnica_Equipo.Humedad',
                'Tb_Informacion_Tecnica_Equipo.RPM',
                //recomendaciones fabricante
                'Tb_Observaciones_Adicionales.Observacion',
                'Tb_Observaciones_Adicionales.Fecha_Observacion',
                'Tb_Observaciones_Adicionales.Responsable_Observacion',


            )
            ->get();

        return response()->json($informaciontecnica);
    }

    public static function getApoyoTecnico()
    {

        $apoyotecnico = DB::table('Tb_Equipos')
            ->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')
            ->join('Tb_Documentacion_Proveedor', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Documentacion_Proveedor.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Clasificacion_equipo.CLASIFICACIÓN_DE_EQUIPO',
                'Tb_Clasificacion_equipo.CLASIFICACION_RIESGO',
                'Tb_Documentacion_Proveedor.MANUAL_SERVICIO',
                'Tb_Documentacion_Proveedor.MANUAL_USUARIO',
                'Tb_Documentacion_Proveedor.MANUAL_PARTES',
                'Tb_Documentacion_Proveedor.MANUAL_DESPIECE',
                'Tb_Documentacion_Proveedor.GUIA_USO',
                'Tb_Documentacion_Proveedor.PLANOS',
                'Tb_Clasificacion_equipo.TECNOLOGIA_PREDOMINANTE'


            )
            ->get();

        return response()->json($apoyotecnico);
    }

    public  static function getComponentes()
    {

        $componentes = DB::table('Tb_Equipos')
            ->join('Tb_Reactivos_Accesorios', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Reactivos_Accesorios.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.MARCA_LICENCIA_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.MODELO_VERSION_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.SERIE_ACCESORIO_1',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.MARCA_LICENCIA_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.MODELO_VERSION_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.SERIE_ACCESORIO_2',
                'Tb_Reactivos_Accesorios.NOMBRE_ACCESORIO_3',
                'Tb_Reactivos_Accesorios.MARCA_LICENCIA_ACCESORIO_3',
                'Tb_Reactivos_Accesorios.MODELO_VERSION_ACCESORIO_3',
                'Tb_Reactivos_Accesorios.SERIE_ACCESORIO_3'
            )
            ->get();

        return response()->json($componentes);
    }



    public static function getGeneralidadesEquipo()
    {

        $generalidades = DB::table('Tb_Equipos')
            ->join('Tb_Clasificacion_equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Clasificacion_equipo.NUM_HOJA_VIDA')
            ->join('Tb_Informe_Mantenimiento', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Informe_Mantenimiento.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Informe_Mantenimiento.Tipo_Mantenimiento',
                'Tb_Clasificacion_equipo.CLASIFICACION_USO',
                'Tb_Clasificacion_equipo.CICLO_CALIB_VALID_CALPERSONAL',
                'Tb_Clasificacion_equipo.CICLO_MANTENIMIENTO',

            )
            ->get();

        return response()->json($generalidades);
    }


    public static function getMantenimiento()
    {

        $mantenimiento = DB::table('Tb_Equipos')
            ->join('Tb_Mantenimiento_Equipos', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Mantenimiento_Equipos.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Mantenimiento_Equipos.Mantenimiento_Propio',
                'Tb_Mantenimiento_Equipos.Mantenimiento_Contratado',
                'Tb_Mantenimiento_Equipos.Por_Orden_Compra',
                'Tb_Mantenimiento_Equipos.Requiere_Calibracion',
                'Tb_Mantenimiento_Equipos.Requiere_Cal_Operacional',
                'Tb_Mantenimiento_Equipos.Requiere_Validacion'
            )
            ->get();

        return response()->json($mantenimiento);
    }

    public static function getAnexos()
    {

        $anexos = DB::table('Tb_Equipos')
            ->join('Tb_Docum_Anexos_HV', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Docum_Anexos_HV.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Docum_Anexos_HV.COPIA_REGISTRO_SANITARIO',
                'Tb_Docum_Anexos_HV.COPIA_PMISO_COMERCIALIZACION',
                'Tb_Docum_Anexos_HV.COPIA_REGISTRO_IMPORTACION',
                'Tb_Docum_Anexos_HV.COPIA_FACTURA',
                'Tb_Docum_Anexos_HV.COPIA_INGRESO_ALMACEN',
                'Tb_Docum_Anexos_HV.CP_RBO_SATISFACCION_PRESTADOR',
                'Tb_Docum_Anexos_HV.PROTOCOLO_PROVEEDOR',
                'Tb_Docum_Anexos_HV.CRONOGRAMA_MANTENIMIENTO_T_G',
                'Tb_Docum_Anexos_HV.GUIA_RAPIDA_OPERACION',
                'Tb_Docum_Anexos_HV.CP_RBO_SATISFACCION_OPERADOR',
                'Tb_Docum_Anexos_HV.RNES_FABRICANTE_ACEOS_CBLES',
                'Tb_Docum_Anexos_HV.RNES_FABRICANTE_CALIBRACION',
                'Tb_Docum_Anexos_HV.CERT_CALIB_VALID_CALPERSONAL',
                'Tb_Docum_Anexos_HV.HOJA_VIDA_PERSONAL_TECNICO',
                'Tb_Docum_Anexos_HV.CAPACION_TEC_ASISTENCIAL',
                'Tb_Docum_Anexos_HV.OBSERVACIONES'

            )

            ->get();

        return response()->json($anexos);
    }

    public static function getHistoricoMantenimiento()
    {

        $historicomantenimiento = DB::table('Tb_Equipos')
            ->join('Tb_Hist_Solicitudes_Equipo', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Hist_Solicitudes_Equipo.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Hist_Solicitudes_Equipo.Fecha',
                //NO INF.
                'Tb_Hist_Solicitudes_Equipo.Consecutivo_Orden',
                'Tb_Hist_Solicitudes_Equipo.Tipo_Servicio',
                'Tb_Hist_Solicitudes_Equipo.HH',
                'Tb_Hist_Solicitudes_Equipo.HP',
                'Tb_Hist_Solicitudes_Equipo.Repuestos',
                'Tb_Hist_Solicitudes_Equipo.Costo',
                'Tb_Hist_Solicitudes_Equipo.Observaciones',
                'Tb_Hist_Solicitudes_Equipo.Nombre_Responsable'
            )

            ->get();

        return response()->json($historicomantenimiento);
    }


    public static function getObservacionesAdicionales()
    {

        $observacionesadicionales = DB::table('Tb_Equipos')
            ->join('Tb_Observaciones_Adicionales', 'Tb_Equipos.NUM_HOJA_VIDA', '=', 'Tb_Observaciones_Adicionales.NUM_HOJA_VIDA')
            ->select(
                'Tb_Equipos.NUM_HOJA_VIDA',
                'Tb_Observaciones_Adicionales.Fecha_Observacion',
                'Tb_Observaciones_Adicionales.Observacion',
                'Tb_Observaciones_Adicionales.Responsable_Observacion'
            )
            ->get();

        return response()->json($observacionesadicionales);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hojavida = Equipos::where("NUM_HOJA_VIDA", "=", $id)->get();
        return response()->json($hojavida);

        /* $hojavida = Equipos::find($id);
        if (is_object($hojavida)) {
            $data = [

                $hojavida
            ];
        } else {
            $data = [
                'code' => 404,
                'mensaje' => "Verificar número de hoja de vida del equipo"
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
}