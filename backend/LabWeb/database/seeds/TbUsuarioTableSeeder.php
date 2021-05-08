<?php

use Illuminate\Database\Seeder;

class TbUsuarioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Usuario')->delete();
        
        \DB::table('Tb_Usuario')->insert(array (
            0 => 
            array (
                'CODIGO' => 11.0,
                'CLAVE' => 1.0,
                'PERFIL' => 1.0,
                'remember_token' => '1',
                'created_at' => '2020-10-21 16:51:57',
                'updated_at' => '2020-10-21 16:51:57',
            ),
            1 => 
            array (
                'CODIGO' => 12.0,
                'CLAVE' => 2.0,
                'PERFIL' => 2.0,
                'remember_token' => '2',
                'created_at' => '2020-10-21 16:51:57',
                'updated_at' => '2020-10-21 16:51:57',
            ),
        ));
        
        
    }
}