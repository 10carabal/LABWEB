<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adq_Equipos extends Model
{
    protected $table = 'Tb_adquisicion_equipos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'FECHA_COMPRA', 'FECHA_FABRICACION', 'FECHA_INSTALACION', 'FECHA_INICIO_OPERACION',
        'COSTO_EQUIPO', 'FORMA_ADQUISICION', 'FECHA_ACTA_RECIBOS', 'GARANTIA_AÑOS',
        'ESTADO_GARANTIA', 'FIN_GARANTIA', 'ESTADO_ACTUAL',
        'AÑOS_USO', 'FACTURA', 'ORDEN_DE_COMPRA', 'VIDA_UTIL', 'RAZON_VIDA_UTIL', 'FECHA_INGRESO_INVENTARIO',
        'EJECUTOR_HOJA_VIDA',
        'LIDER_PROCESO'
    ];

    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}