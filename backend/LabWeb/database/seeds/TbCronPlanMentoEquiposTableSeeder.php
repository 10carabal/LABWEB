<?php

use Illuminate\Database\Seeder;

class TbCronPlanMentoEquiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Cron_Plan_Mento_Equipos')->delete();
        
        \DB::table('Tb_Cron_Plan_Mento_Equipos')->insert(array (
            0 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'FREC_MENTO_PREVENTIVO' => '12 Meses',
                'FECHA_EJECUCION' => '2020-11-01',
                'ESTADO_EJECUCION' => 'MTTO.CORRECTIVO',
                'RESPONSABLE_MANTENIMIENTO' => 'N/P',
                'OBSERVACIONES_EQUIPO' => 'N/P',
                'COSTO_MANTENIMIENTO' => NULL,
                'Consecutivo_Orden' => 1.0,
                'created_at' => '2020-11-11 16:59:32',
                'updated_at' => '2020-12-03 06:14:42',
            ),
            1 => 
            array (
                'id' => 5,
                'NUM_HOJA_VIDA' => 1.0,
                'FREC_MENTO_PREVENTIVO' => '12 Meses',
                'FECHA_EJECUCION' => '2020-12-03',
                'ESTADO_EJECUCION' => 'N/P',
                'RESPONSABLE_MANTENIMIENTO' => 'yu',
                'OBSERVACIONES_EQUIPO' => 'gg',
                'COSTO_MANTENIMIENTO' => 1.0,
                'Consecutivo_Orden' => 1.0,
                'created_at' => '2020-12-03 06:00:13',
                'updated_at' => '2020-12-03 06:10:12',
            ),
        ));
        
        
    }
}