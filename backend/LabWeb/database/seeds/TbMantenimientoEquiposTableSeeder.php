<?php

use Illuminate\Database\Seeder;

class TbMantenimientoEquiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Mantenimiento_Equipos')->delete();
        
        \DB::table('Tb_Mantenimiento_Equipos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Mantenimiento_Propio' => 'Si',
                'Mantenimiento_Contratado' => 'Si',
                'Por_Orden_Compra' => 'Si',
                'Requiere_Calibracion' => 'Si',
                'Requiere_Cal_Operacional' => 'Si',
                'Requiere_Validacion' => 'Si',
                'created_at' => '2020-11-11 17:04:37',
                'updated_at' => '2020-12-02 20:27:21',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Mantenimiento_Propio' => 'Si',
                'Mantenimiento_Contratado' => 'No',
                'Por_Orden_Compra' => 'No',
                'Requiere_Calibracion' => 'No',
                'Requiere_Cal_Operacional' => 'No',
                'Requiere_Validacion' => 'No',
                'created_at' => '2020-11-11 17:04:37',
                'updated_at' => '2020-12-01 21:06:03',
            ),
        ));
        
        
    }
}