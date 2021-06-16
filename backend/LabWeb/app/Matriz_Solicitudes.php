<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriz_Solicitudes extends Model

{
    protected $table = 'Tb_Matriz_Segto_Solicitudes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Consecutivo_Orden',
        'Fecha_Solicitud', 'Descripcion_Solicitud', 'CDIS_Presupuesto',
        'Fecha_Ejecucion', 'EJECUTADO',
        'NO_EJECUTADO', 'Personal_Encargado','Total_Solicitudes','CREATED_AT', 'UPDATED_AT'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
    public function consecutivo()
    {
        return $this->belongsTo('App\Solicitud_Servicio', 'Consecutivo_Orden');
    }
}