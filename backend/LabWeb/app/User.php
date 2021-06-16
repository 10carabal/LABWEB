<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'Tb_Usuario';
    protected $primaryKey = 'id';
    protected $fillable = [
        'CODIGO', 'CLAVE', 'PERFIL','REMEMBER_TOKEN','CREATED_AT', 'UPDATED_AT'
    ];


    /* protected $fillable = [
        'name', 'email', 'password',
    ];

     */
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'CLAVE', 'remember_token',
    ];
}