<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_Servicio extends Model

{


    protected $table = 'Tb_Solicitud_Servicio';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Consecutivo_Orden', 'NUM_HOJA_VIDA', 'Fecha_Solicitud_Servicio', 'Hora_Solicitud_Servicio',
        'Servicio', 'Ubicacion', 'Descripcion_Problema',
        'Nombre_Responsable', 'Cargo_Responsable','CREATED_AT', 'UPDATED_AT'
    ];

    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}