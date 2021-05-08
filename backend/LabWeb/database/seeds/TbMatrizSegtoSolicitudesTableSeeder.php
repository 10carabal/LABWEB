<?php

use Illuminate\Database\Seeder;

class TbMatrizSegtoSolicitudesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Matriz_Segto_Solicitudes')->delete();
        
        \DB::table('Tb_Matriz_Segto_Solicitudes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Consecutivo_Orden' => 1.0,
                'Fecha_Solicitud' => '2020-11-01',
                'Descripcion_Solicitud' => 'N/P',
                'CDIS_Presupuesto' => 0.0,
                'Fecha_Ejecucion' => '2020-11-01',
                'EJECUTADO' => 0.0,
                'NO_EJECUTADO' => 0.0,
                'Personal_Encargado' => 'N/P',
                'Total_Solicitudes' => 0.0,
                'created_at' => '2020-11-11 17:05:23',
                'updated_at' => '2020-11-11 17:05:23',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Consecutivo_Orden' => 1.0,
                'Fecha_Solicitud' => '2020-11-01',
                'Descripcion_Solicitud' => 'N/P',
                'CDIS_Presupuesto' => 50000.0,
                'Fecha_Ejecucion' => '2020-11-01',
                'EJECUTADO' => 0.0,
                'NO_EJECUTADO' => 0.0,
                'Personal_Encargado' => 'N/P',
                'Total_Solicitudes' => 3.0,
                'created_at' => '2020-11-11 17:05:23',
                'updated_at' => '2020-12-03 01:20:53',
            ),
        ));
        
        
    }
}