<?php

use Illuminate\Database\Seeder;

class TbDocumentacionProveedorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Documentacion_Proveedor')->delete();
        
        \DB::table('Tb_Documentacion_Proveedor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'MANUAL_USUARIO' => 'No',
                'MANUAL_SERVICIO' => 'N/P',
                'GUIA_USO' => 'N/P',
                'MANUAL_PARTES' => 'N/P',
                'MANUAL_DESPIECE' => 'N/P',
                'PLANOS' => 'N/P',
                'CARTA_GARANTIA' => 'N/P',
                'REGISTRO_SANITARIO_PROVEEDOR' => 'N/P',
                'DECLARACION_IMPORTACION' => 'N/P',
                'CHECKLIST_FABRICACION' => 'N/P',
                'HOJAS_VIDA_PERSONAL_TECNICO' => 'N/P',
                'CRONOGRAMA_VISITAS' => 'N/P',
                'REPUESTOS_DISPONIBLES' => 'N/P',
                'CERT_CALIB_VALID_CALPERSONAL' => 'N/P',
                'created_at' => '2020-11-11 17:00:25',
                'updated_at' => '2020-12-02 19:53:34',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'MANUAL_USUARIO' => 'Si',
                'MANUAL_SERVICIO' => 'Si',
                'GUIA_USO' => 'N/P',
                'MANUAL_PARTES' => 'N/P',
                'MANUAL_DESPIECE' => 'N/P',
                'PLANOS' => 'N/P',
                'CARTA_GARANTIA' => 'N/P',
                'REGISTRO_SANITARIO_PROVEEDOR' => 'N/P',
                'DECLARACION_IMPORTACION' => 'N/P',
                'CHECKLIST_FABRICACION' => 'N/P',
                'HOJAS_VIDA_PERSONAL_TECNICO' => 'N/P',
                'CRONOGRAMA_VISITAS' => 'N/P',
                'REPUESTOS_DISPONIBLES' => 'N/P',
                'CERT_CALIB_VALID_CALPERSONAL' => 'Si',
                'created_at' => '2020-11-11 17:00:25',
                'updated_at' => '2020-12-02 19:53:19',
            ),
        ));
        
        
    }
}