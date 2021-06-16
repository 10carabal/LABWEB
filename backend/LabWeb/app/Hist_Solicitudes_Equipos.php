<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hist_Solicitudes_Equipos extends Model
{


    protected $table = 'Tb_Hist_Solicitudes_Equipo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Consecutivo_Orden', 'Tipo_Servicio', 'Fecha', 'Costo',
        'Repuestos', 'HH', 'HP', 'Observaciones', 'Nombre_Responsable',
        'Cargo_Responsable', 'Nombre_Responsable_Reporte', 'Satisfaccion_Usuario', 'CREATED_AT', 'UPDATED_AT'
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