<?php

use Illuminate\Database\Seeder;

class TbDocumAnexosHVTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tb_Docum_Anexos_HV')->delete();
        
        \DB::table('Tb_Docum_Anexos_HV')->insert(array (
            0 => 
            array (
                'id' => 1,
                'NUM_HOJA_VIDA' => 1.0,
                'COPIA_REGISTRO_SANITARIO' => 'Anexo',
                'COPIA_REGISTRO_IMPORTACION' => 'No aplica',
                'COPIA_PMISO_COMERCIALIZACION' => 'No aplica',
                'COPIA_FACTURA' => 'Anexo',
                'COPIA_INGRESO_ALMACEN' => 'No aplica',
                'CP_RBO_SATISFACCION_PRESTADOR' => 'No aplica',
                'CP_RBO_SATISFACCION_OPERADOR' => 'No aplica',
                'CAPACION_TEC_ASISTENCIAL' => 'Anexo',
                'HOJA_VIDA_PERSONAL_TECNICO' => 'No aplica',
                'GUIA_RAPIDA_OPERACION' => 'No aplica',
                'CERT_CALIB_VALID_CALPERSONAL' => 'No aplica',
                'RNES_FABRICANTE_CALIBRACION' => 'No aplica',
                'RNES_FABRICANTE_ACEOS_CBLES' => 'No aplica',
                'PROTOCOLO_PROVEEDOR' => 'No aplica',
                'CRONOGRAMA_MANTENIMIENTO_T_G' => 'Anexo',
                'OBSERVACIONES' => NULL,
                'created_at' => '2020-11-11 17:00:41',
                'updated_at' => '2020-12-02 19:51:05',
            ),
            1 => 
            array (
                'id' => 2,
                'NUM_HOJA_VIDA' => 2.0,
                'COPIA_REGISTRO_SANITARIO' => 'No aplica',
                'COPIA_REGISTRO_IMPORTACION' => 'No aplica',
                'COPIA_PMISO_COMERCIALIZACION' => 'No aplica',
                'COPIA_FACTURA' => 'No aplica',
                'COPIA_INGRESO_ALMACEN' => 'No aplica',
                'CP_RBO_SATISFACCION_PRESTADOR' => 'No aplica',
                'CP_RBO_SATISFACCION_OPERADOR' => 'No aplica',
                'CAPACION_TEC_ASISTENCIAL' => 'No aplica',
                'HOJA_VIDA_PERSONAL_TECNICO' => 'No aplica',
                'GUIA_RAPIDA_OPERACION' => 'No aplica',
                'CERT_CALIB_VALID_CALPERSONAL' => 'No aplica',
                'RNES_FABRICANTE_CALIBRACION' => 'No aplica',
                'RNES_FABRICANTE_ACEOS_CBLES' => 'No aplica',
                'PROTOCOLO_PROVEEDOR' => 'No aplica',
                'CRONOGRAMA_MANTENIMIENTO_T_G' => 'No aplica',
                'OBSERVACIONES' => NULL,
                'created_at' => '2020-11-11 17:00:41',
                'updated_at' => '2020-11-11 17:00:41',
            ),
        ));
        
        
    }
}