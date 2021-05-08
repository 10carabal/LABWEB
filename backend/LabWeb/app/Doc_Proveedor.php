<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc_Proveedor extends Model
{
    protected $table = 'Tb_Documentacion_Proveedor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'MANUAL_USUARIO', 'MANUAL_SERVICIO', 'GUIA_USO', 'MANUAL_PARTES', 'MANUAL_DESPIECE', 'PLANOS',
        'CARTA_GARANTIA', 'REGISTRO_SANITARIO_PROVEEDOR', 'DECLARACION_IMPORTACION',
        'CHECKLIST_FABRICACION', 'HOJAS_VIDA_PERSONAL_TECNICO',
        'CRONOGRAMA_VISITAS', 'REPUESTOS_DISPONIBLES', 'CERT_CALIB_VALID_CALPERSONAL'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}