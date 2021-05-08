<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformeServicio extends Model
{


    protected $table = 'Tb_Informe_Servicio_Tecnico';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Consecutivo_Orden', 'Codigo_Prestador', 'Servicio',
        'Ubicacion', 'Fecha_Informe', 'Problema_Detectado',
        'Actividades_Realizadas', 'Repuestos_Instalados', 'Accesorios_Instalados',
        'Insumos_Instalados',
        'Mediciones', 'Observaciones', 'Nombre_Responsable',
        'Cargo_Responsable',
        'Nombre_Responsable_Recibir', 'Cargo_Responsable_Recibir'
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