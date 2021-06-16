<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformeMantenimiento extends Model
{
    protected $table = 'Tb_Informe_Mantenimiento';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Consecutivo_Orden', 'Tipo_Mantenimiento', 'Imagen_Antes_Mantenimiento',
        'Imagen_Despues_Mantenimiento', 'Fecha_Mantenimiento', 'Hora_Inicio',
        'Hora_Fin', 'Tipo_Equipo', 'Actividades_Realizadas', 'Observacion_Mantenimiento',
        'Estado_Equipo', 'Test_Funcionalidad', 'Limpieza',
        'Reemplazo_Accesorios',
        'Herramientas_Utilizadas', 'Equipo_Proteccion_Personal', 'Nombre_Responsable_Mento',
        'Cargo_Responsable_Mento',
        'Nombre_Responsable_Recibir', 'Cargo_Responsable_Recibir','CREATED_AT', 'UPDATED_AT'
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