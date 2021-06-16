<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanMantenimiento extends Model

{


    protected $table = 'Tb_Cron_Plan_Mento_Equipos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'FREC_MENTO_PREVENTIVO', 'FECHA_EJECUCION', 'ESTADO_EJECUCION', 'RESPONSABLE_MANTENIMIENTO',
        'OBSERVACIONES_EQUIPO', 'COSTO_MANTENIMIENTO', 'Consecutivo_Orden', 'CREATED_AT', 'UPDATED_AT'
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