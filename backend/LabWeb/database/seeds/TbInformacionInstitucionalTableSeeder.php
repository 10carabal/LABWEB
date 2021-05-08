<?php

use Illuminate\Database\Seeder;

class TbInformacionInstitucionalTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Informacion_Institucional')->delete();
        
        \DB::table('Tb_Informacion_Institucional')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Pais' => 'Colombia',
                'Ciudad' => 'Cali',
                'Direccion' => 'Calle 5 # 62-00 Barrio Pampalinda',
                'Nit_Universidad' => '890303787-1',
                'RUT' => '890303787-1',
                'Telefono' => '5183000 EXT',
                'Website' => 'www.usc.edu.co',
                'Email_Laboratorio' => 'usc.edu.co',
                'Fecha_Ejecucion_Hoja_Vida' => '2020-11-01',
                'Lider_Proceso' => 'N/P',
                'Cargo' => 'N/P',
                'created_at' => '2020-11-11 17:01:52',
                'updated_at' => '2020-11-28 14:23:21',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Pais' => 'Colombia',
                'Ciudad' => 'Cali',
                'Direccion' => 'Calle 5 # 62-00 Barrio Pampalinda',
                'Nit_Universidad' => '890303787-1',
                'RUT' => '890303787-1',
                'Telefono' => '5183000 EXT',
                'Website' => 'www.usc.edu.co',
                'Email_Laboratorio' => 'oterod11@hotmail.com',
                'Fecha_Ejecucion_Hoja_Vida' => '2020-11-01',
                'Lider_Proceso' => 'otero',
                'Cargo' => 'AAAAARRROOOOOZ',
                'created_at' => '2020-11-11 17:01:52',
                'updated_at' => '2020-11-16 23:23:41',
            ),
        ));
        
        
    }
}