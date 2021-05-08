<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info_Tecnica_Equipo extends Model
{


    protected $table = 'Tb_Informacion_Tecnica_Equipo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Codigo_ECRI', 'Nomenclatura_Internacional', 'Nomenclatura',
        'Tipo_Equipo', 'Firmware', 'Software',
        'Rango_Voltaje', 'Corriente', 'Potencia', 'Frecuencia_(HZ)',
        'Dimensiones_(CM)', 'Presion', 'Temperatura', 'Peso_KGS', 'Humedad', 'RPM',
        'Descripcion_Equipo', 'Otras_Recomendaciones'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}