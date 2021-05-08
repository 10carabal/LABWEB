<?php

use Illuminate\Database\Seeder;

class TbObservacionesAdicionalesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Observaciones_Adicionales')->delete();
        
        \DB::table('Tb_Observaciones_Adicionales')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Fecha_Observacion' => '2020-11-01',
                'Observacion' => 'Está es una nueva observación',
                'Responsable_Observacion' => 'Denis Pinilla',
                'created_at' => '2020-11-11 17:05:47',
                'updated_at' => '2020-11-25 19:32:45',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Fecha_Observacion' => '2020-12-24',
                'Observacion' => 'cvcxvcbxbvcb',
                'Responsable_Observacion' => 'N/P',
                'created_at' => '2020-11-11 17:05:47',
                'updated_at' => '2020-12-02 20:34:43',
            ),
        ));
        
        
    }
}