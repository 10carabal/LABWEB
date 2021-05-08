<?php

use Illuminate\Database\Seeder;

class TbRMA002TableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_RMA002')->delete();
        
        \DB::table('Tb_RMA002')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'PARTES_EQUIPO' => 'todas',
                'ACCESORIOS_EQUIPO' => 'DE lujo',
                'TECNOVIGILANCIA' => 'Si',
                'ANTES_USO' => '22',
                'DESPUES_USO' => '22',
                'created_at' => '2020-12-01 19:33:48',
                'updated_at' => '2020-12-01 19:59:36',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'PARTES_EQUIPO' => 'Samsung',
                'ACCESORIOS_EQUIPO' => 'Celular inteligente',
                'TECNOVIGILANCIA' => 'Si',
                'ANTES_USO' => 'Novedad 1',
                'DESPUES_USO' => 'Funcional',
                'created_at' => '2020-11-11 17:06:16',
                'updated_at' => '2020-12-02 23:06:24',
            ),
        ));
        
        
    }
}