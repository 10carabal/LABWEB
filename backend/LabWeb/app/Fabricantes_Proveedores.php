<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricantes_Proveedores extends Model
{
    protected $table = 'Tb_Fabricantes_Proveedores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA', 'FABRICANTE', 'PAIS_ORIGEN', 'WEB_FABRICANTE', 'REPRESENTANTE', 'PROVEEDOR', 'CIUDAD_PROVEEDOR',
        'DIRECCION_PROVEEDOR', 'TELEFONO_PROVEEDOR', 'CORREO_PROVEEDOR',
        'WEB_PROVEEDOR','CREATED_AT', 'UPDATED_AT'
    ];
    public function hojadevida()
    {
        return $this->belongsTo('App\Equipos', 'NUM_HOJA_VIDA');
    }
}