<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RMA002 extends Model
{
    protected $table = 'Tb_RMA002';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'PARTES_EQUIPO', 'ACCESORIOS_EQUIPO', 'TECNOVIGILANCIA', 'ANTES_USO',
        'DESPUES_USO'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}