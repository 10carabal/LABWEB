<?php

use Illuminate\Database\Seeder;

class TbEquiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_equipos')->delete();
        
        \DB::table('Tb_equipos')->insert(array (
            0 => 
            array (
                'NUM_HOJA_VIDA' => 1.0,
                'Nombre' => 'Baño de maría acero inoxidable',
                'Imagen_Equipo' => 'https://img2.freepng.es/20180422/vow/kisspng-laboratory-water-bath-bain-marie-oil-bath-viscomet-thailand-places-5adc72eee252a8.857793521524396782927.jpg',
                'Marca' => 'Fisher Scientific ',
                'Modelo' => 'FSEPGD10',
                'Serial' => '300204909',
                'Activo_Fijo' => '14745',
                'Area' => 'Laboratorios',
                'Sub_Area' => 'Microbiología',
                'Registro_Sanitario' => 'Si',
                'Permiso_Comercializacion' => 'No',
                'created_at' => '2020-10-28 15:02:42',
                'updated_at' => '2020-11-24 20:09:03',
            ),
            1 => 
            array (
                'NUM_HOJA_VIDA' => 2.0,
                'Nombre' => 'Balanza de presición',
                'Imagen_Equipo' => 'https://materialesdelaboratoriohoy.us/wp-content/uploads/2019/07/preci111.jpg',
                'Marca' => 'Vibra',
                'Modelo' => 'AB1202',
                'Serial' => '190013738',
                'Activo_Fijo' => '14775',
                'Area' => 'Laboratorios',
                'Sub_Area' => 'Microbiología',
                'Registro_Sanitario' => 'No',
                'Permiso_Comercializacion' => 'Si',
                'created_at' => '2020-10-28 15:02:42',
                'updated_at' => '2020-10-28 20:10:07',
            ),
            2 => 
            array (
                'NUM_HOJA_VIDA' => 3.0,
                'Nombre' => 'TEST',
                'Imagen_Equipo' => 'C:\\fakepath\\S1c1u5c.2018.png',
                'Marca' => 'TEST',
                'Modelo' => 'N/P',
                'Serial' => 'N/P',
                'Activo_Fijo' => 'N/P',
                'Area' => 'N/P',
                'Sub_Area' => 'N/P',
                'Registro_Sanitario' => 'No',
                'Permiso_Comercializacion' => 'No',
                'created_at' => '2020-12-02 23:23:58',
                'updated_at' => '2020-12-02 23:23:58',
            ),
        ));
        
        
    }
}