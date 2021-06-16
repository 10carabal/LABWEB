<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc_AnexosHv extends Model
{
    protected $table = 'Tb_Docum_Anexos_HV';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'COPIA_REGISTRO_SANITARIO', 'COPIA_REGISTRO_IMPORTACION', 'COPIA_PMISO_COMERCIALIZACION',
        'COPIA_FACTURA', 'COPIA_INGRESO_ALMACEN', 'CP_RBO_SATISFACCION_PRESTADOR',
        'CP_RBO_SATISFACCION_OPERADOR', 'CAPACION_TEC_ASISTENCIAL', 'HOJA_VIDA_PERSONAL_TECNICO',
        'GUIA_RAPIDA_OPERACION','CERT_CALIB_VALID_CALPERSONAL', 'RNES_FABRICANTE_CALIBRACION', 
        'RNES_FABRICANTE_ACEOS_CBLES', 'PROTOCOLO_PROVEEDOR', 'CRONOGRAMA_MANTENIMIENTO_T_G', 'OBSERVACIONES', 'CREATED_AT', 'UPDATED_AT'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}