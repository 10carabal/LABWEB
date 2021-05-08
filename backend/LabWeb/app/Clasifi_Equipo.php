<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasifi_Equipo extends Model
{


    protected $table = 'Tb_Clasificacion_equipo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'CLASIFICACIÓN_DE_EQUIPO', 'CLASIFICACION_USO', 'CLASIFICACION_BIOMEDICA',
        'TECNOLOGIA_PREDOMINANTE', 'CLASIFICACION_RIESGO', 'CLASE_RIESGO_ELECTRICO',
        'TIPO_RIESGO_ELECTRICO', 'CLASES_SOFTWARE', 'COMPLEJIDAD_TECNOLOGICA_EQUIPO', 'FUENTES_ALIMENTACION',
        'CICLO_MANTENIMIENTO', 'CICLO_CALIB_VALID_CALPERSONAL'
    ];

    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}