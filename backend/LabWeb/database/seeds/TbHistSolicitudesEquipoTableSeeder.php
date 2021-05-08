<?php

use Illuminate\Database\Seeder;

class TbHistSolicitudesEquipoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Hist_Solicitudes_Equipo')->delete();
        
        \DB::table('Tb_Hist_Solicitudes_Equipo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Consecutivo_Orden' => 1.0,
                'Tipo_Servicio' => 'reparación',
                'Fecha' => '2020-12-01',
                'Costo' => 'N/P',
                'Repuestos' => 'N/P',
                'HH' => 0,
                'HP' => 0,
                'Observaciones' => 'N/P',
                'Nombre_Responsable' => 'N/P',
                'Cargo_Responsable' => 'N/P',
                'Nombre_Responsable_Reporte' => 'N/P',
                'Satisfaccion_Usuario' => 'N/P',
                'created_at' => '2020-11-11 17:01:19',
                'updated_at' => '2020-12-02 20:03:54',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Consecutivo_Orden' => 1.0,
                'Tipo_Servicio' => 'Actualización',
                'Fecha' => '2020-12-01',
                'Costo' => 'N/P',
                'Repuestos' => 'N/P',
                'HH' => 0,
                'HP' => 0,
                'Observaciones' => 'N/P',
                'Nombre_Responsable' => 'N/P',
                'Cargo_Responsable' => 'N/P',
                'Nombre_Responsable_Reporte' => 'N/P',
                'Satisfaccion_Usuario' => 'N/P',
                'created_at' => '2020-11-11 17:01:19',
                'updated_at' => '2020-12-01 21:55:01',
            ),
        ));
        
        
    }
}