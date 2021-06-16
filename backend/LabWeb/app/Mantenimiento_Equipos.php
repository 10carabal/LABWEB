<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento_Equipos extends Model

{


    protected $table = 'Tb_Mantenimiento_Equipos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'Mantenimiento_Propio', 'Mantenimiento_Contratado', 'Por_Orden_Compra', 'Requiere_Calibracion',
        'Requiere_Cal_Operacional', 'Requiere_Validacion','CREATED_AT', 'UPDATED_AT'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}