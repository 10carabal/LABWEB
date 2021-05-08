<?php

use Illuminate\Database\Seeder;

class TbInformeMantenimientoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Informe_Mantenimiento')->delete();
        
        \DB::table('Tb_Informe_Mantenimiento')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'Consecutivo_Orden' => 1.0,
                'Tipo_Mantenimiento' => 'Preventivo',
                'Imagen_Antes_Mantenimiento' => 'https://img2.freepng.es/20180422/vow/kisspng-laboratory-water-bath-bain-marie-oil-bath-viscomet-thailand-places-5adc72eee252a8.857793521524396782927.jpg',
                'Imagen_Despues_Mantenimiento' => 'https://img2.freepng.es/20180422/vow/kisspng-laboratory-water-bath-bain-marie-oil-bath-viscomet-thailand-places-5adc72eee252a8.857793521524396782927.jpg',
                'Fecha_Mantenimiento' => '2020-12-02',
                'Hora_Inicio' => NULL,
                'Hora_Fin' => NULL,
                'Tipo_Equipo' => 'Médico',
                'Actividades_Realizadas' => 'N/P',
                'Observacion_Mantenimiento' => 'N/P',
                'Estado_Equipo' => 'N/P',
                'Test_Funcionalidad' => 'N/P',
                'Limpieza' => 'N/P',
                'Reemplazo_Accesorios' => 'N/P',
                'Herramientas_Utilizadas' => 'N/P',
                'Equipo_Proteccion_Personal' => 'N/P',
                'Nombre_Responsable_Mento' => 'N/P',
                'Cargo_Responsable_Mento' => 'N/P',
                'Nombre_Responsable_Recibir' => 'N/P',
                'Cargo_Responsable_Recibir' => 'N/P',
                'created_at' => '2020-11-11 17:02:56',
                'updated_at' => '2020-12-02 22:13:15',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'Consecutivo_Orden' => 1.0,
                'Tipo_Mantenimiento' => 'Reparación',
                'Imagen_Antes_Mantenimiento' => NULL,
                'Imagen_Despues_Mantenimiento' => NULL,
                'Fecha_Mantenimiento' => '2020-11-01',
                'Hora_Inicio' => '17:55:00',
                'Hora_Fin' => '19:55:00',
                'Tipo_Equipo' => 'Médico',
                'Actividades_Realizadas' => 'N/P',
                'Observacion_Mantenimiento' => 'N/P',
                'Estado_Equipo' => 'N/P',
                'Test_Funcionalidad' => 'N/P',
                'Limpieza' => 'SI',
                'Reemplazo_Accesorios' => 'SI',
                'Herramientas_Utilizadas' => 'N/P',
                'Equipo_Proteccion_Personal' => 'N/P',
                'Nombre_Responsable_Mento' => 'N/P',
                'Cargo_Responsable_Mento' => 'N/P',
                'Nombre_Responsable_Recibir' => 'N/P',
                'Cargo_Responsable_Recibir' => 'N/P',
                'created_at' => '2020-11-11 17:02:56',
                'updated_at' => '2020-12-02 22:55:49',
            ),
        ));
        
        
    }
}