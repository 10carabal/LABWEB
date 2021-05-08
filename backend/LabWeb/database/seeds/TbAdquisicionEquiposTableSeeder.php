<?php

use Illuminate\Database\Seeder;

class TbAdquisicionEquiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_adquisicion_equipos')->delete();
        
        \DB::table('Tb_adquisicion_equipos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'FECHA_COMPRA' => '2020-11-18',
                'FECHA_FABRICACION' => '2020-11-01',
                'FECHA_INSTALACION' => '2020-11-01',
                'FECHA_INICIO_OPERACION' => '2020-11-01',
                'COSTO_EQUIPO' => '0',
                'FORMA_ADQUISICION' => 'Compra Directa',
                'FECHA_ACTA_RECIBOS' => '2020-11-01',
                'GARANTIA_ANIOS' => '0',
                'ESTADO_GARANTIA' => 'N/P',
                'FIN_GARANTIA' => '2020-11-25',
                'ESTADO_ACTUAL' => 'N/P',
                'ANIOS_USO' => '0',
                'FACTURA' => 'N/P',
                'ORDEN_DE_COMPRA' => 'N/P',
                'VIDA_UTIL' => '0',
                'RAZON_VIDA_UTIL' => 'N/P',
                'FECHA_INGRESO_INVENTARIO' => '2020-11-01',
                'EJECUTOR_HOJA_VIDA' => 'N/P',
                'LIDER_PROCESO' => 'N/P',
                'created_at' => '2020-11-11 16:56:13',
                'updated_at' => '2020-11-25 19:30:28',
            ),
            1 => 
            array (
                'id' => 3,
                'NUM_HOJA_VIDA' => 2.0,
                'FECHA_COMPRA' => '2020-11-01',
                'FECHA_FABRICACION' => '2020-11-01',
                'FECHA_INSTALACION' => '2020-11-01',
                'FECHA_INICIO_OPERACION' => '2020-11-01',
                'COSTO_EQUIPO' => '0',
                'FORMA_ADQUISICION' => 'Compra Directa',
                'FECHA_ACTA_RECIBOS' => '2020-11-01',
                'GARANTIA_ANIOS' => '0',
                'ESTADO_GARANTIA' => 'N/P',
                'FIN_GARANTIA' => '2020-11-30',
                'ESTADO_ACTUAL' => 'N/P',
                'ANIOS_USO' => '0',
                'FACTURA' => 'N/P',
                'ORDEN_DE_COMPRA' => 'N/P',
                'VIDA_UTIL' => '0',
                'RAZON_VIDA_UTIL' => 'N/P',
                'FECHA_INGRESO_INVENTARIO' => '2020-11-01',
                'EJECUTOR_HOJA_VIDA' => 'N/P',
                'LIDER_PROCESO' => 'N/P',
                'created_at' => '2020-11-11 23:26:32',
                'updated_at' => '2020-11-11 23:26:32',
            ),
        ));
        
        
    }
}