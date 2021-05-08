<?php

use Illuminate\Database\Seeder;

class TbClasificacionEquipoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Clasificacion_Equipo')->delete();
        
        \DB::table('Tb_Clasificacion_Equipo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'CLASIFICACION_DE_EQUIPO' => 'Médico',
                'CLASIFICACION_USO' => 'Médico',
                'CLASIFICACION_BIOMEDICA' => 'Diagnóstico',
                'TECNOLOGIA_PREDOMINANTE' => 'Mecánico',
                'CLASIFICACION_RIESGO' => 'Bajo Riesgo I',
                'CLASE_RIESGO_ELECTRICO' => 'N/P',
                'TIPO_RIESGO_ELECTRICO' => 'N/P',
                'CLASES_SOFTWARE' => 'Programación',
                'COMPLEJIDAD_TECNOLOGICA_EQUIPO' => 'N/P',
                'FUENTES_ALIMENTACION' => 'Electricidad',
                'CICLO_MANTENIMIENTO' => '12 Meses',
                'CICLO_CALIB_VALID_CALPERSONAL' => '12 Meses',
                'created_at' => '2020-11-11 16:58:01',
                'updated_at' => '2020-11-11 16:58:01',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'CLASIFICACION_DE_EQUIPO' => 'Médico',
                'CLASIFICACION_USO' => 'Médico',
                'CLASIFICACION_BIOMEDICA' => 'Diagnóstico',
                'TECNOLOGIA_PREDOMINANTE' => 'Mecánico',
                'CLASIFICACION_RIESGO' => 'Bajo Riesgo I',
                'CLASE_RIESGO_ELECTRICO' => 'N/P',
                'TIPO_RIESGO_ELECTRICO' => 'N/P',
                'CLASES_SOFTWARE' => 'Programación',
                'COMPLEJIDAD_TECNOLOGICA_EQUIPO' => 'N/P',
                'FUENTES_ALIMENTACION' => 'Electricidad',
                'CICLO_MANTENIMIENTO' => '12 Meses',
                'CICLO_CALIB_VALID_CALPERSONAL' => '12 Meses',
                'created_at' => '2020-11-11 16:58:01',
                'updated_at' => '2020-11-11 16:58:01',
            ),
        ));
        
        
    }
}