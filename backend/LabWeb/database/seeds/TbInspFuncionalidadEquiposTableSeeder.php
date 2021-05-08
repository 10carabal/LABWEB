<?php

use Illuminate\Database\Seeder;

class TbInspFuncionalidadEquiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Insp_Funcionalidad_Equipos')->delete();
        
        \DB::table('Tb_Insp_Funcionalidad_Equipos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Consecutivo_Orden' => 1.0,
                'Laboratorio' => 'N/P',
                'Fecha_Ejecucion' => '2020-11-01',
                'Nombre_Responsable' => 'N/P',
                'Cargo_Responsable' => 'N/P',
                'Funcionamiento_Equipo' => 'BE Buen Estado',
                'Estado_Entorno' => 'BE Buen Estado',
                'Estado_Accesorio_Consumibles' => 'BE Buen Estado',
                'Estado_lineas_Alimentacion' => 'BE Buen Estado',
                'Estado_Almacenamiento' => 'BE Buen Estado',
                'Documentacion_Presente' => 'BE Buen Estado',
                'created_at' => '2020-11-11 17:04:23',
                'updated_at' => '2020-11-11 17:04:23',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Consecutivo_Orden' => 2.0,
                'Laboratorio' => 'N/P',
                'Fecha_Ejecucion' => '2020-11-01',
                'Nombre_Responsable' => 'N/P',
                'Cargo_Responsable' => 'N/P',
                'Funcionamiento_Equipo' => 'BE Buen Estado',
                'Estado_Entorno' => 'BE Buen Estado',
                'Estado_Accesorio_Consumibles' => 'BE Buen Estado',
                'Estado_lineas_Alimentacion' => 'BE Buen Estado',
                'Estado_Almacenamiento' => 'BE Buen Estado',
                'Documentacion_Presente' => 'BE Buen Estado',
                'created_at' => '2020-11-11 17:04:23',
                'updated_at' => '2020-11-11 17:04:23',
            ),
        ));
        
        
    }
}