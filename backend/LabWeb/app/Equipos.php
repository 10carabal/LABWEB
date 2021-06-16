<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $table = 'Tb_equipos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_HOJA_VIDA','Nombre', 'Imagen_Equipo', 'Marca', 'Modelo', 'Serial',
        'Activo_Fijo', 'Area', 'Sub_Area', 'Registro_Sanitario', 'Permiso_Comercializacion', 'created_at',
        'updated_at'
    ];
}