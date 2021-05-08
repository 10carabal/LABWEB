<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_Servicio extends Model

{


    protected $table = 'Tb_Solicitud_Servicio';
    protected $primaryKey = 'NUM_HOJA_VIDA';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Consecutivo_Orden', 'Fecha_Solicitud_Servicio', 'Hora_Solicitud_Servicio',
        'Servicio', 'Ubicacion', 'Descripcion_Problema',
        'Nombre_Responsable', 'Cargo_Responsable'
    ];
}