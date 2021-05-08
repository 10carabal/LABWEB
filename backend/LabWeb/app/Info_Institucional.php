<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info_Institucional extends Model
{
    protected $table = 'Tb_Informacion_Institucional';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Pais', 'Ciudad', 'Direccion', 'Nit_Universidad', 'RUT', 'Telefono',
        'Website', 'Email_Laboratorio', 'Fecha_Ejecucion_Hoja_Vida',
        'Lider_Proceso', 'Cargo'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}