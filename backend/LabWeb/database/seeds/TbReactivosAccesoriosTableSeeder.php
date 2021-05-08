<?php

use Illuminate\Database\Seeder;

class TbReactivosAccesoriosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Reactivos_Accesorios')->delete();
        
        \DB::table('Tb_Reactivos_Accesorios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'LISTADO_REACTIVOS' => 'Sólidos',
                'ACCESORIO_1' => 'Lampara',
                'MARCA_LICENCIA_ACCESORIO_1' => 'Bayern',
                'MODELO_VERSION_ACCESORIO_1' => 'Q&Q',
                'SERIE_ACCESORIO_1' => '134234',
                'ACCESORIO_2' => 'N/P',
                'MARCA_LICENCIA_ACCESORIO_2' => 'N/P',
                'MODELO_VERSION_ACCESORIO_2' => 'N/P',
                'SERIE_ACCESORIO_2' => 'N/P',
                'ACCESORIO_3' => 'N/P',
                'MARCA_LICENCIA_ACCESORIO_3' => 'N/P',
                'MODELO_VERSION_ACCESORIO_3' => 'N/P',
                'SERIE_ACCESORIO_3' => 'N/P',
                'created_at' => '2020-11-11 17:06:04',
                'updated_at' => '2020-11-11 17:06:04',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'LISTADO_REACTIVOS' => 'Sólidos',
                'ACCESORIO_1' => 'Blanco',
                'MARCA_LICENCIA_ACCESORIO_1' => 'Blanco',
                'MODELO_VERSION_ACCESORIO_1' => 'Blanco',
                'SERIE_ACCESORIO_1' => '',
                'ACCESORIO_2' => 'N/P',
                'MARCA_LICENCIA_ACCESORIO_2' => 'N/P',
                'MODELO_VERSION_ACCESORIO_2' => 'N/P',
                'SERIE_ACCESORIO_2' => 'N/P',
                'ACCESORIO_3' => 'N/P',
                'MARCA_LICENCIA_ACCESORIO_3' => 'N/P',
                'MODELO_VERSION_ACCESORIO_3' => 'N/P',
                'SERIE_ACCESORIO_3' => 'Negro',
                'created_at' => '2020-11-11 17:06:04',
                'updated_at' => '2020-12-02 20:42:08',
            ),
        ));
        
        
    }
}