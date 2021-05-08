<?php

use Illuminate\Database\Seeder;

class TbInformeServicioTecnicoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Informe_Servicio_Tecnico')->delete();
        
        \DB::table('Tb_Informe_Servicio_Tecnico')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Consecutivo_Orden' => 1.0,
                'Codigo_Prestador' => 'N/P',
                'Servicio' => 'N/P',
                'Ubicacion' => 'N/P',
                'Fecha_Informe' => '2020-11-01',
                'Problema_Detectado' => 'N/P',
                'Actividades_Realizadas' => 'N/P',
                'Repuestos_Instalados' => 'N/P',
                'Accesorios_Instalados' => 'N/P',
                'Insumos_Instalados' => 'N/P',
                'Mediciones' => 'N/P',
                'Observaciones' => 'N/P',
                'Nombre_Responsable' => 'N/P',
                'Cargo_Responsable' => 'N/P',
                'Nombre_Responsable_Recibir' => 'Denis Pinilla',
                'Cargo_Responsable_Recibir' => 'Lider Proceso',
                'created_at' => '2020-11-11 17:03:52',
                'updated_at' => '2020-12-03 00:26:18',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Consecutivo_Orden' => 1.0,
                'Codigo_Prestador' => 'N/P',
                'Servicio' => 'Compra Herramientas',
                'Ubicacion' => 'N/P',
                'Fecha_Informe' => '2020-11-01',
                'Problema_Detectado' => 'N/P',
                'Actividades_Realizadas' => 'N/P',
                'Repuestos_Instalados' => 'N/P',
                'Accesorios_Instalados' => 'N/P',
                'Insumos_Instalados' => 'N/P',
                'Mediciones' => 'N/P',
                'Observaciones' => 'N/P',
                'Nombre_Responsable' => 'N/P',
                'Cargo_Responsable' => 'N/P',
                'Nombre_Responsable_Recibir' => 'N/P',
                'Cargo_Responsable_Recibir' => 'N/P',
                'created_at' => '2020-11-11 17:03:52',
                'updated_at' => '2020-12-03 00:15:15',
            ),
        ));
        
        
    }
}