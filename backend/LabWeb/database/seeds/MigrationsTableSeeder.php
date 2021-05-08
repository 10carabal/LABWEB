<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('migrations')->delete();

        \DB::table('migrations')->insert(array(
            0 =>
            array(
                'id' => 1,
                'migration' => '2020_12_03_154403_create_Tb_Clasificacion_Equipo_table',
                'batch' => 0,
            ),
            1 =>
            array(
                'id' => 2,
                'migration' => '2020_12_03_154403_create_Tb_Plan_Validacion_table',
                'batch' => 0,
            ),
            2 =>
            array(
                'id' => 3,
                'migration' => '2020_12_03_154403_create_Tb_Cron_Plan_Mento_Equipos_table',
                'batch' => 0,
            ),
            3 =>
            array(
                'id' => 4,
                'migration' => '2020_12_03_154403_create_Tb_Docum_Anexos_HV_table',
                'batch' => 0,
            ),
            4 =>
            array(
                'id' => 5,
                'migration' => '2020_12_03_154403_create_Tb_Documentacion_Proveedor_table',
                'batch' => 0,
            ),
            5 =>
            array(
                'id' => 6,
                'migration' => '2020_12_03_154403_create_Tb_Fabricantes_Proveedores_table',
                'batch' => 0,
            ),
            6 =>
            array(
                'id' => 7,
                'migration' => '2020_12_03_154403_create_Tb_Hist_Solicitudes_Equipo_table',
                'batch' => 0,
            ),
            7 =>
            array(
                'id' => 8,
                'migration' => '2020_12_03_154403_create_Tb_Informacion_Institucional_table',
                'batch' => 0,
            ),
            8 =>
            array(
                'id' => 9,
                'migration' => '2020_12_03_154403_create_Tb_Informacion_Tecnica_Equipo_table',
                'batch' => 0,
            ),
            9 =>
            array(
                'id' => 10,
                'migration' => '2020_12_03_154403_create_Tb_Informe_Mantenimiento_table',
                'batch' => 0,
            ),
            10 =>
            array(
                'id' => 11,
                'migration' => '2020_12_03_154403_create_Tb_Informe_Servicio_Tecnico_table',
                'batch' => 0,
            ),
            11 =>
            array(
                'id' => 12,
                'migration' => '2020_12_03_154403_create_Tb_Insp_Funcionalidad_Equipos_table',
                'batch' => 0,
            ),
            12 =>
            array(
                'id' => 13,
                'migration' => '2020_12_03_154403_create_Tb_Mantenimiento_Equipos_table',
                'batch' => 0,
            ),
            13 =>
            array(
                'id' => 14,
                'migration' => '2020_12_03_154403_create_Tb_Matriz_Segto_Solicitudes_table',
                'batch' => 0,
            ),
            14 =>
            array(
                'id' => 15,
                'migration' => '2020_12_03_154403_create_Tb_Observaciones_Adicionales_table',
                'batch' => 0,
            ),
            15 =>
            array(
                'id' => 16,
                'migration' => '2020_12_03_154403_create_Tb_Perfil_Usuario_table',
                'batch' => 0,
            ),
            16 =>
            array(
                'id' => 17,
                'migration' => '2020_12_03_154403_create_Tb_RMA002_table',
                'batch' => 0,
            ),
            17 =>
            array(
                'id' => 18,
                'migration' => '2020_12_03_154403_create_Tb_Reactivos_Accesorios_table',
                'batch' => 0,
            ),
            18 =>
            array(
                'id' => 19,
                'migration' => '2020_12_03_154403_create_Tb_Solicitud_Servicio_table',
                'batch' => 0,
            ),
            19 =>
            array(
                'id' => 20,
                'migration' => '2020_12_03_154403_create_Tb_Usuario_table',
                'batch' => 0,
            ),
            20 =>
            array(
                'id' => 21,
                'migration' => '2020_12_03_154403_create_Tb_adquisicion_equipos_table',
                'batch' => 0,
            ),
            21 =>
            array(
                'id' => 22,
                'migration' => '2020_12_03_154403_create_Tb_equipos_table',
                'batch' => 0,
            ),
            22 =>
            array(
                'id' => 23,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Clasificacion_Equipo_table',
                'batch' => 0,
            ),
            23 =>
            array(
                'id' => 24,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Plan_Validacion_table',
                'batch' => 0,
            ),
            24 =>
            array(
                'id' => 25,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Cron_Plan_Mento_Equipos_table',
                'batch' => 0,
            ),
            25 =>
            array(
                'id' => 26,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Docum_Anexos_HV_table',
                'batch' => 0,
            ),
            26 =>
            array(
                'id' => 27,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Documentacion_Proveedor_table',
                'batch' => 0,
            ),
            27 =>
            array(
                'id' => 28,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Fabricantes_Proveedores_table',
                'batch' => 0,
            ),
            28 =>
            array(
                'id' => 29,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Hist_Solicitudes_Equipo_table',
                'batch' => 0,
            ),
            29 =>
            array(
                'id' => 30,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Informacion_Institucional_table',
                'batch' => 0,
            ),
            30 =>
            array(
                'id' => 31,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Informacion_Tecnica_Equipo_table',
                'batch' => 0,
            ),
            31 =>
            array(
                'id' => 32,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Informe_Mantenimiento_table',
                'batch' => 0,
            ),
            32 =>
            array(
                'id' => 33,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Informe_Servicio_Tecnico_table',
                'batch' => 0,
            ),
            33 =>
            array(
                'id' => 34,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Insp_Funcionalidad_Equipos_table',
                'batch' => 0,
            ),
            34 =>
            array(
                'id' => 35,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Mantenimiento_Equipos_table',
                'batch' => 0,
            ),
            35 =>
            array(
                'id' => 36,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Matriz_Segto_Solicitudes_table',
                'batch' => 0,
            ),
            36 =>
            array(
                'id' => 37,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Observaciones_Adicionales_table',
                'batch' => 0,
            ),
            37 =>
            array(
                'id' => 38,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Perfil_Usuario_table',
                'batch' => 0,
            ),
            38 =>
            array(
                'id' => 39,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_RMA002_table',
                'batch' => 0,
            ),
            39 =>
            array(
                'id' => 40,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Reactivos_Accesorios_table',
                'batch' => 0,
            ),
            40 =>
            array(
                'id' => 41,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_Solicitud_Servicio_table',
                'batch' => 0,
            ),
            41 =>
            array(
                'id' => 42,
                'migration' => '2020_12_03_154404_add_foreign_keys_to_Tb_adquisicion_equipos_table',
                'batch' => 0,
            ),
        ));
    }
}
