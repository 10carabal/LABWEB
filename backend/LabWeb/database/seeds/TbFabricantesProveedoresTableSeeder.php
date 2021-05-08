<?php

use Illuminate\Database\Seeder;

class TbFabricantesProveedoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Fabricantes_Proveedores')->delete();
        
        \DB::table('Tb_Fabricantes_Proveedores')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'FABRICANTE' => 'N/P',
                'PAIS_ORIGEN' => 'Colombia',
                'WEB_FABRICANTE' => 'N/P',
                'REPRESENTANTE' => 'N/P',
                'PROVEEDOR' => 'N/P',
                'CIUDAD_PROVEEDOR' => 'N/P',
                'DIRECCION_PROVEEDOR' => 'N/P',
                'TELEFONO_PROVEEDOR' => NULL,
                'CORREO_PROVEEDOR' => 'N/P',
                'WEB_PROVEEDOR' => 'D10.com',
                'created_at' => '2020-11-11 17:00:57',
                'updated_at' => '2020-12-02 19:37:55',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'FABRICANTE' => 'dsgdg',
                'PAIS_ORIGEN' => 'Colombia',
                'WEB_FABRICANTE' => 'N/P',
                'REPRESENTANTE' => 'N/P',
                'PROVEEDOR' => 'N/P',
                'CIUDAD_PROVEEDOR' => 'N/P',
                'DIRECCION_PROVEEDOR' => 'N/P',
                'TELEFONO_PROVEEDOR' => NULL,
                'CORREO_PROVEEDOR' => 'N/P',
                'WEB_PROVEEDOR' => 'N/P',
                'created_at' => '2020-11-11 17:00:57',
                'updated_at' => '2020-12-02 19:38:46',
            ),
        ));
        
        
    }
}