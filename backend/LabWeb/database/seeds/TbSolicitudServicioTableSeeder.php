<?php

use Illuminate\Database\Seeder;

class TbSolicitudServicioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Solicitud_Servicio')->delete();
        
        \DB::table('Tb_Solicitud_Servicio')->insert(array (
            0 => 
            array (
                'NUM_HOJA_VIDA' => 1.0,
                'Consecutivo_Orden' => 1.0,
                'Fecha_Solicitud_Servicio' => '2020-10-10',
                'Hora_Solicitud_Servicio' => '00:00:11',
                'Servicio' => 'Mantenimiento',
                'Ubicacion' => 'N/P',
                'Descripcion_Problema' => 'N/P',
                'Nombre_Responsable' => 'N/P',
                'Cargo_Responsable' => 'Yoooooo',
                'created_at' => '2020-10-28 16:01:16',
                'updated_at' => '2020-11-23 16:17:16',
            ),
            1 => 
            array (
                'NUM_HOJA_VIDA' => 2.0,
                'Consecutivo_Orden' => 2.0,
                'Fecha_Solicitud_Servicio' => '2020-10-10',
                'Hora_Solicitud_Servicio' => '00:00:11',
                'Servicio' => 'Reparación',
                'Ubicacion' => 'N/P',
                'Descripcion_Problema' => 'N/P',
                'Nombre_Responsable' => 'Daniel Otero',
                'Cargo_Responsable' => '21',
                'created_at' => '2020-10-28 16:01:16',
                'updated_at' => '2020-12-02 23:08:01',
            ),
        ));
        
        
    }
}