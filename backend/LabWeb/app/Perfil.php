<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model

{


    protected $table = 'Tb_Perfil_Usuario';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NUM_PERFIL', 'DESCRIPCION_PERFIL','CREATED_AT', 'UPDATED_AT'
    ];
}