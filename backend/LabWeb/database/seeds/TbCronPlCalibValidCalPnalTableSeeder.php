<?php

use Illuminate\Database\Seeder;

class TbCronPlCalibValidCalPnalTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('Tb_Plan_Validacion')->delete();

        \DB::table('Tb_Plan_Validacion')->insert(array(
            0 =>
            array(
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'FCIA_VACION_CALIB' => '12 Meses',
                'FECHA_EJECUCION' => '2020-11-01',
                'ESTADO_EJECUCION' => 'CALIBRACIÓNPROGRAMADA',
                'OBSERVACIONES_EQUIPO' => 'N/P',
                'Consecutivo_Orden' => 1.0,
                'created_at' => '2020-11-11 17:00:06',
                'updated_at' => '2020-11-11 17:00:06',
            ),
            1 =>
            array(
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'FCIA_VACION_CALIB' => '12 Meses',
                'FECHA_EJECUCION' => '2020-11-01',
                'ESTADO_EJECUCION' => 'VALIDACIÓNPROGRAMADA',
                'OBSERVACIONES_EQUIPO' => 'N/P',
                'Consecutivo_Orden' => 1.0,
                'created_at' => '2020-11-11 17:00:06',
                'updated_at' => '2020-12-03 06:15:05',
            ),
        ));
    }
}
