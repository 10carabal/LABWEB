<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanValidacion extends Model

{


    protected $table = 'Tb_Plan_Validacion';
    protected $primaryKey = 'NUM_HOJA_VIDA';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'FCIA_VACION_CALIB', 'FECHA_EJECUCION', 'ESTADO_EJECUCION',
        'OBSERVACIONES_EQUIPO', 'Consecutivo_Orden'
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
