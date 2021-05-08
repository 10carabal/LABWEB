<?php

use Illuminate\Database\Seeder;

class TbInformacionTecnicaEquipoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Informacion_Tecnica_Equipo')->delete();
        
        \DB::table('Tb_Informacion_Tecnica_Equipo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Codigo_ECRI' => 'N/P',
                'Nomenclatura_Internacional' => 'N/P',
                'Nomenclatura' => 'N/P',
                'Tipo_Equipo' => 'Móvil',
                'Firmware' => 'No',
                'Software' => 'No',
                'Rango_Voltaje' => 500.0,
                'Corriente' => 45.0,
                'Potencia' => 4564.0,
                'Frecuencia_HZ' => 656.0,
                'Dimensiones_CM' => 123.0,
                'Presion' => 4354.0,
                'Temperatura' => 32.0,
                'Peso_KGS' => 50.0,
                'Humedad' => 10.0,
                'RPM' => 0.0,
                'Descripcion_Equipo' => 'N/P',
                'Otras_Recomendaciones' => 'N/P',
                'created_at' => '2020-11-11 17:02:27',
                'updated_at' => '2020-11-11 17:02:27',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Codigo_ECRI' => 'N/P',
                'Nomenclatura_Internacional' => 'N/P',
                'Nomenclatura' => 'Mesa que más aplauda',
                'Tipo_Equipo' => 'Móvil',
                'Firmware' => 'Si',
                'Software' => 'Si',
                'Rango_Voltaje' => 123.0,
                'Corriente' => 54.0,
                'Potencia' => 4545.0,
                'Frecuencia_HZ' => 453.0,
                'Dimensiones_CM' => 33.0,
                'Presion' => 45.0,
                'Temperatura' => 9.0,
                'Peso_KGS' => 5.0,
                'Humedad' => 2.0,
                'RPM' => 0.0,
                'Descripcion_Equipo' => 'N/P',
                'Otras_Recomendaciones' => 'Conservar a 20 grados',
                'created_at' => '2020-11-11 17:02:27',
                'updated_at' => '2020-12-02 20:19:27',
            ),
        ));
        
        
    }
}