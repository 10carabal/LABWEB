<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observaciones_Adicionales extends Model

{
    protected $table = 'Tb_Observaciones_Adicionales';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Fecha_Observacion', 'Observacion', 'Responsable_Observacion','CREATED_AT', 'UPDATED_AT'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}