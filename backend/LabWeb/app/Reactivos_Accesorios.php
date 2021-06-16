<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reactivos_Accesorios extends Model

{


    protected $table = 'Tb_Reactivos_Accesorios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'LISTADO_REACTIVOS', 'ACCESORIO_1',
        'MARCA_LICENCIA_ACCESORIO_1', 'MODELO_VERSION_ACCESORIO_1', 'SERIE_ACCESORIO_1',
        'ACCESORIO_2',
        'MARCA_LICENCIA_ACCESORIO_2', 'MODELO_VERSION_ACCESORIO_2', 'SERIE_ACCESORIO_2',
        'ACCESORIO_3',
        'MARCA_LICENCIA_ACCESORIO_3', 'MODELO_VERSION_ACCESORIO_3', 'SERIE_ACCESORIO_3','CREATED_AT', 'UPDATED_AT'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}