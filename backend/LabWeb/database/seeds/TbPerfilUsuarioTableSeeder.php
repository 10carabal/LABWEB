<?php

use Illuminate\Database\Seeder;

class TbPerfilUsuarioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Perfil_Usuario')->delete();
        
        \DB::table('Tb_Perfil_Usuario')->insert(array (
            0 => 
            array (
                'NUM_PERFIL' => 1.0,
                'DESCRIPCION_PERFIL' => 'Administrador',
            ),
            1 => 
            array (
                'NUM_PERFIL' => 2.0,
                'DESCRIPCION_PERFIL' => 'Empleado',
            ),
        ));
        
        
    }
}