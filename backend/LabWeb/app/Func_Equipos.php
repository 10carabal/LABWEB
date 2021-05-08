<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Func_Equipos extends Model
{


    protected $table = 'Tb_Insp_Funcionalidad_Equipos';
    protected $primaryKey = 'NUM_HOJA_VIDA';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Consecutivo_Orden', 'Laboratorio', 'Fecha_Ejecucion',
        'Nombre_Responsable', 'Cargo_Responsable', 'Funcionamiento_Equipo',
        'Estado_Entorno', 'Estado_Accesorio_Consumibles', 'Estado_lineas_Alimentacion',
        'Estado_Almacenamiento',
        'Documentacion_Presente'
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